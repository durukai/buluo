var symax = {
    'tabconf': 'showtab',
    'plist': new Array(),
    'c': {
        'set': function(name, value, days) {
            var exp = new Date();
            exp.setTime(exp.getTime() + days * 24 * 60 * 60 * 1000);
            var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
            document.cookie = name + "=" + escape(value) + ";path=/;expires=" + exp.toUTCString();
        },
        'get': function(name) {
            var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
            if (arr != null) {
                return unescape(arr[2]);
                return null;
            }
        },
        'del': function(name) {
            var exp = new Date();
            exp.setTime(exp.getTime() - 1);
            var cval = this.get(name);
            if (cval != null) {
                document.cookie = name + "=" + escape(cval) + ";path=/;expires=" + exp.toUTCString();
            }
        }
    },
    'play_box': function(tag) {
        var box = $('h2:[rel="play_tag"]');
        var count = box.length;
		$(".nav_1").addClass('on');
        $(".box_1").show();
        if (!tag) {
            $('h2:[rel="play_tag"]').click(function() {
                var tag = $(this).attr('data');
                symax.c.set('playtype', tag, 365);
                box.each(function() {
                    $("#nav_" + $(this).attr('data')).removeClass('on');
                    $("#box_" + $(this).attr('data')).hide();
                });
                $("#nav_" + tag).addClass('on');
                $("#box_" + tag).show();
            });
        } else {
            box.each(function() {
                $("#nav_" + $(this).attr('data')).removeClass('on');
                $("#box_" + $(this).attr('data')).hide();
            });
            $("#nav_" + tag).addClass('on');
            $("#box_" + tag).show();
        }
    },
    'playlist': function() {
        $(':[rel="symax_player"]').each(function() {
            player = $(this).attr('data');
            symax.plist[player] = new Array();
            $("#list_" + $(this).attr('data') + ">li").each(function() {
                symax.plist[player].push($(this).html());
            });
        });
    },
    'drawlist': function(player, order, limit) {
        $(':[rel="symax_player"]').each(function() {
            player = $(this).attr('data');
            limit = $(this).attr('limit');
            order = symax.c.get('playorder') ? symax.c.get('playorder') : $(this).attr('order');
            symax.showlist(player, order, limit);
            symax.playerclick();
        });
    },
    'playerclick': function() {
        $(':[rel="symax_player"]>li>a').each(function() {
            $(this).click(function() {
                var data = $(this).attr('id').split('_');
                symax.c.set('playtype', data[0], 365);
            });
        });
    },
    'playpage': function(count, play, order, limit) {
        if (order == 'asc') {
            pages = Math.ceil((play / limit));
        } else if (order == 'desc') {
            var pages = Math.ceil(count / symax.limit);
            for (var i = 1; i <= pages; i++) {
                var s = (i - 1) * limit + 1;
                var t = (i * limit > count) ? count : (i * limit);
                s = count - s + 1;
                t = count - t + 1;
                if (play <= s && play >= t) {
                    pages = i;
                }
            }
        }
        return pages;
    },
    'showlist': function(player, order, limit, pages, ji) {
        var item = symax.plist[player];
        var list = '',
            pagestr = '',
            pageturn = '',
            autopages = '',
            pageorder = '';
        var limit = Number(limit);
        var count = item.length;
        var pagenum = Math.ceil(count / limit);
        pages = pages > 1 ? pages : 1;
        pagestar = (pages) * limit;
        if (order == 'desc') pagestar = count - pagestar;
        orders = (order == 'desc') ? 'asc' : 'desc';
        if (order == 'desc') {
            playji = ji > 0 ? ji : count;
        } else {
            playji = ji > 0 ? ji : 1;
        }
        for (page = 1; page <= pagenum; page++) {
            var pagefrom = (page - 1) * limit + 1;
            var pageto = (page * limit > count) ? count : (page * limit);
            if (order == 'desc') {
                pagefrom = count - pagefrom + 1;
                pageto = count - pageto + 1;
            }
            var css = "";
            if (pages == page) var css = " class='on_ctrl' ";
            if (count > 1) pagestr = pagestr + '<a onclick=symax.showlist("' + player + '","' + order + '",' + limit + ',' + page + '); href="javascript:void(0);" ' + css + ' title="第' + pagefrom + '集 至 第' + pageto + '集" target="_self">' + pagefrom + '-' + pageto + '集</a>';
        }
        if (order == 'desc') {
            var start = limit + pagestar - 1;
            var end = pagestar;
            for (i = start; i >= end; i--) {
                if (item[i]) list = list + '<li>' + item[i] + '</li>';
            }
        } else if (order == 'asc') {
            var start = limit * (pages - 1);
            var end = (pages <= 0) ? pagestar - 2 : pagestar - 1;
            for (i = start; i <= end; i++) {
                if (item[i]) list = list + '<li>' + item[i] + '</li>';
            }
        }
        if (pages > 1) {
            pageturn = pageturn + '<a onclick=symax.showlist("' + player + '","' + order + '",' + limit + ',' + (pages - 1) + ',' + playji + '); href="javascript:void(0);" title="前' + limit + '集" target="_self" class="fenjilist_r">前' + limit + '集</a>';
        }
        if (pagenum > 1 && pages < pagenum) {
            pageturn = pageturn + '<a onclick=symax.showlist("' + player + '","' + order + '",' + limit + ',' + (pages + 1) + ',' + playji + '); href="javascript:void(0);" title="后' + limit + '集" target="_self" class="fenjilist_r">后' + limit + '集</a>';
        }
        if (count > 1) {
            if (symax.playset && symax.order && count && limit) autopages = symax.playpage(count, symax.playset, orders, limit);
            pageorder = '<a onclick=symax.showlist("' + player + '","' + orders + '",' + limit + ',"' + autopages + '",' + playji + '); href="javascript:void(0);" target="_self" class="videolist_ctrl"  >反向排序</a>';
        }
        $('#tab_' + player).html(pagestr + pageorder);
        $('#turn_' + player).html(pageturn);
        $('#list_' + player).html(list);
        $('#' + player + '_' + playji).addClass('selected');
    },
    'play': function(c) {
        if ($("#list_" + c[0]).length <= 0) {
            symax.tips('vodsources', c[0]);
            return;
        }
        var j = parseInt(parseInt(c[1]) - 1);
        var ji_name = $('#' + c[0] + '_' + c[1]).text();
        var play_data = symax.playdata_url(c[0]);
        var ji_url = play_data[j];
        if (!ji_url) {
            symax.tips('onsources');
            return;
        } else {
            var url = ji_url;
            if ($('#' + c[0] + '_' + j).length > 0) {
                var lastweb = symax.sear[0] + '?' + c[0] + '-' + j;
            } else {
                var lastweb = '';
            }
            if ($('#' + c[0] + '_' + parseInt(j + 2)).length > 0) {
                var nextweb = (symax.c.get("next") == "no") ? "" : symax.sear[0] + '?' + c[0] + "-" + parseInt(j + 2);
                var cache = (symax.c.get("cache") == "no") ? "" : play_data[parseInt(j + 1)];
            } else {
                var nextweb = '',
                    cache = '';
            }
        };
        var p_arg = {
            p: c[0],
            url: url || "",
            cache: cache || "",
            last: lastweb || "",
            next: nextweb || ""
        };
        var p_lastweb = (!lastweb) ? '' : "<a href=" + lastweb + ">[上一集]</a>";
        var p_nextweb = (!nextweb) ? '' : "<a href=" + nextweb + ">[下一集]</a>";
        var playtip = "正在播放[" + title + "]：" + ji_name + "(" + symax.conf.playname[c[0]] + ")" + '　' + p_lastweb + '　' + p_nextweb;
        $("#p_" + c[0] + "_tip").html(playtip);
        symax.seen.add(SiteId, c);
        symax.c.set('p_arg', p_arg, 1);
        symax.plus(p_arg);
    },
    'parameter': function() {
        symax.browser = navigator.appName;
        symax.pathurl = document.location.href;
        if (symax.pathurl.indexOf("?") > 0) {
            symax.sear = symax.pathurl.split("?");
            if (symax.sear[1].indexOf("-") > 0) {
                symax.cond = symax.sear[1].split("-");
                symax.playset = symax.cond[1].replace(/[\D]/g, '');
                symax.playtype = symax.cond[0] == '' ? symax.c.get('playtype') : symax.cond[0];
            } else {
                var patrn = /^\d*$/;
                if (patrn.test(symax.sear[1].replace('#', ''))) {
                    symax.playset = symax.sear[1].replace(/[\D]/g, '');
                    symax.playtype = symax.c.get('playtype');
                }
            }
        } else {
            symax.sear = symax.pathurl;
            symax.playset = 1;
            symax.playtype = symax.c.get('playtype');
        }
        return symax;
    },
    'player': function(symax) {
        if ($("#list_" + symax.playtype).length <= 0) {
            symax.tips('vodsources', symax.playtype);
            return;
        }
        var count = symax.plist[symax.playtype].length;
        var limit = Number($("#list_" + symax.playtype).attr('limit'));
        var order = symax.c.get('playorder');
        var play = symax.playset;
        var pages = symax.playpage(count, play, order, limit);
        symax.play_box(symax.playtype);
        symax.showlist(symax.playtype, order, limit, pages, play);
        if (symax.c.get("autoplay") == "no") {
            symax.tips('autoplay');
            return;
        }
        symax.play([symax.playtype, symax.playset]);
    },
};
$(document).ready(function() {
    if ($(':[rel="play_tag"]').length > 0) {
        playinit = symax.parameter();
        symax.play_box();
        symax.playlist();
        symax.drawlist();
        if ($("#list_" + playinit.playtype).length > 0) symax.play_box(playinit.playtype);
        if ($("#play_box").length > 0) symax.player(playinit);
        if ($(':[rel="cpa_ads"]').length > 0) symax.relink();
    }
});