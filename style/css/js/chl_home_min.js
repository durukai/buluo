(function(c) {
	var d = LETV.using("UI");
	var a = LETV.using("Common"); (function() {
		if ($.browser.iPad) {
			if (LETV.cookie("j-ipadtip") == "1") {
				return
			}
			var g = [];
			g.push('<div class="popforipad" id="popforipad">');
			g.push('<div class="handle">');
			g.push('<div class="ico_winclose"><img src="http://img1.c0.letv.com/ptv/images/home/iphoneClose.png" width="17" height="17" alt="关闭" title="知道了"/></div>');
			g.push("</div>");
			g.push('<div class="content">');
			g.push('<div class="icoyouku"><img src="http://i1.letvimg.com/img/201206/29/iphonelogo.png" width="55" height="55" alt="letv 乐视" /></div>');
			g.push('<div class="info"><strong>把飞飞CMS影视系统添加到主屏幕：</strong>请点击工具栏上的<img src="http://img1.c0.letv.com/ptv/images/home/iphoneAdd.png" width="16" height="17" alt="add" />或者<img src="http://img1.c0.letv.com/ptv/images/home/iphoneSC.png" width="16" height="17" alt="add" />，并选择"添加至主屏幕"，便于直接访问。</div>');
			g.push("</div>");
			g.push("</div>");
			var f = $(g.join("")).prependTo("body");
			f.find(".ico_winclose").click(function(i) {
				var j = new Date();
				j.setFullYear(j.getFullYear() + 1);
				LETV.cookie("j-ipadtip", "1", {
					expires: j,
					domain: ".letv.com",
					path: "/"
				});
				f.hide()
			});
			var h = new Date();
			h.setHours(h.getHours() + 24);
			LETV.cookie("j-ipadtip", "1", {
				expires: h,
				domain: ".www.ffcms.cn",
				path: "/"
			})
		}
	})(); (function(g, e, h) {
		function f(i, k) {
			var j = this;
			if (!g(i)[0]) {
				throw "Path Container Error"
			}
			if (! (j instanceof f)) {
				return new f(i, k)
			}
			g.extend(j.options = {},
			f.Options, k);
			j.container = g(i);
			j._init()
		}
		g.extend(f, {
			Options: {
				size: [110, 124],
				xy: [10, 226],
				zIndex: 100,
				menuSize: [65, 65],
				itemSize: [30, 30],
				modCls: "path",
				itemCls: "path-item",
				duration: 100,
				rate: 100
			}
		});
		g.extend(f.prototype, {
			_init: function() {
				var j = this,
				i = j.container,
				l = j.options,
				m = l.itemCls,
				p = l.zIndex,
				o = l.itemSize,
				k = l.menuSize,
				n = j.xy = {
					menu: l.button[0][0]
				};
				i.hide().addClass(l.modCls).css({
					position: "relative",
					zIndex: p,
					width: l.size[0],
					height: l.size[1],
					left: l.xy[0],
					top: l.xy[1]
				}).show();
				n.button = [(k[0] - o[0]) / 2 + n.menu[0], (k[1] - o[1]) / 2 + n.menu[1]];
				j.buttons = [];
				g.each(l.button,
				function(r, q) {
					var t = r === 0,
					s = g('<a hideFocus="true"></a>').appendTo(i).attr({
						"class": m + " " + q[1],
						title: q[2],
						href: q[3],
						target: q[4] || "_blank",
						hideFocus: "true"
					}).css({
						cursor: "pointer",
						position: "absolute",
						left: (t ? n.menu: n.button)[0],
						top: (t ? n.menu: n.button)[1],
						width: t ? k[0] : o[0],
						height: t ? k[1] : o[1],
						outline: "none",
						zIndex: p + (t ? 2 : 1)
					});
					if (r === 0) {
						j.menu = s
					} else {
						j.buttons.push(s)
					}
				});
				j._attach()
			},
			_attach: function() {
				var k = this,
				l = k.options,
				o, i, n, m, j;
				if (k._task) {
					return k
				}
				m = k.xy.menu;
				j = k.xy.button;
				i = l.duration;
				n = k.buttons.length * i;
				k._task = function(p) {
					g(k.buttons).each(function(r, q) {
						p = p === true;
						var s = l.button[r + 1][0];
						g(q).stop().animate({
							left: p ? m[0] + s[0] : j[0],
							top: p ? m[1] + s[1] : j[1]
						},
						i + (p ? l.rate * r: (n - l.rate * r)))
					})
				};
				k.menu.mouseenter(function(p) {
					clearTimeout(o);
					k._task(true)
				});
				k.container.mouseleave(function(p) {
					clearTimeout(o);
					o = setTimeout(k._task, 100)
				});
				return k
			},
			notify: function(k, i) {
				var j;
				if (k === "menu" && i && g(i)[0] && (j = {})) {
					g.each(["href", "target"],
					function(l, m) {
						j[m] = g(i).attr(m)
					});
					g(this.menu).attr(j)
				}
				return this
			}
		});
		e.using("UI").Path = f
	})(jQuery, LETV); (function b() {
		var e = d.Path($("<div></div>").appendTo("#j-focusPic").hide(), {
			button: [[[10, 43], "i-menu", "播放", "#"], [[20, -41], "i-ipad", "意见反馈", "http://ffcms.cn/gb-show-p-1.html"], [[60, -23], "i-iphone", "给我留言", "http://www.ffcms.cn/gb-show-p-1.html"], [[76, 14], "i-tv", "网络电视", "http://www.ffcms.cn/vod-show-id-38-mcid--p-1.html"], [[68, 51], "i-pc", "在线音乐", "http://www.ffcms.cn/vod-show-id-41-mcid--p-1.html"]]
		});
		var j = d.slider("#j-focusPic", {
			sliderFinder: ".j-slider",
			sliderItemFinder: ".j-item",
			sliderItemWidth: 1000,
			sliderItemCount: 10,
			stepSize: 1,
			clipSize: 1,
			mode: "round",
			onSlidBegin: function(o, n) {
				$("#j-focusPic .j-info").hide();
				$("#j-focusPic .j-infobg").css("opacity", 0)
			},
			onSlidEnd: function(p, n) {
				var o = [];
				o.push("<div class='infotxt w'>");
				o.push($("#j-focusPic .j-infocontainer>.infotxt").eq(n.index % 10).html());
				o.push("</div>");
				$("#j-focusPic .j-info").html(o.join("")).show();
				$("#j-focusPic .j-infobg").animate({
					opacity: 0.5
				})
			}
		});
		var h = d.slider("#j-focusBtns", {
			sliderFinder: ".j-slider",
			sliderItemFinder: ".j-item",
			sliderItemWidth: 70,
			sliderItemCount: 10,
			clipSize: 5,
			stepSize: 5,
			onSlidBegin: function(o, n) {
				$("#j-focusBtns .pre").addClass("on-1");
				$("#j-focusBtns .next").addClass("on-2")
			},
			onSlidEnd: function(o, n) {
				if (o.isPreEnable()) {
					$("#j-focusBtns .pre").removeClass("on-1")
				} else {
					$("#j-focusBtns .pre").addClass("on-1")
				}
				if (o.isNextEnable()) {
					$("#j-focusBtns .next").removeClass("on-2")
				} else {
					$("#j-focusBtns .next").addClass("on-2")
				}
			}
		});
		var g = $("#j-focusBtns .j-item");
		var i = $("#j-focusBtns .pre , #j-focusBtns .next");
		var l = 0;
		var k = g.eq(l);
		k.siblings().removeClass("on");
		k.addClass("on");
		var m = a.timer(function() {
			l += 1;
			l = l % 10;
			var n = g.eq(l);
			n.siblings().removeClass("on");
			n.addClass("on");
			j.gotoNextStep();
			e.notify("menu", n);
			if (l == 0) {
				h.gotoPreStep()
			}
			if (l == 5) {
				h.gotoNextStep()
			}
		},
		{
			interval: 5000,
			immediately: false
		});
		e.notify("menu", g.eq(l));
		m.start();
		$(".Aflash").mouseover(function(n) {
			m.stop()
		}).mouseout(function(n) {
			m.start()
		});
		g.each(function(o, n) {
			var p = $(n);
			p.mouseover(function(q) {
				if (o == l) {
					return
				}
				l = o;
				j.gotoIndex(l);
				p.siblings().removeClass("on");
				p.addClass("on");
				e.notify("menu", g.eq(l))
			})
		});
		var f = null;
		i.mouseover(function(o) {
			var n = $(this);
			if (n.hasClass("on-1") || n.hasClass("on-2")) {
				return
			}
			clearTimeout(f);
			var p = $(this).find("i");
			f = setTimeout(function() {
				p.fadeIn("fast")
			},
			200)
		}).mouseout(function(n) {
			clearTimeout(f);
			var o = $(this).find("i");
			f = setTimeout(function() {
				o.fadeOut("fast")
			},
			200)
		}).click(function(o) {
			var n = $(this);
			if (n.hasClass("on-1") || n.hasClass("on-2")) {
				return
			}
			if ($(this).hasClass("pre")) {
				h.gotoPreStep()
			} else {
				h.gotoNextStep()
			}
		})
	})();
	d.slider("#j-hitshow", {
		sliderFinder: ".j-slider",
		sliderItemFinder: ".w128",
		sliderItemWidth: 137,
		sliderItemCount: 14,
		stepSize: 7,
		clipSize: 7,
		onInit: function(f, e) {
			$("#j-hitshow .a1").click(function(g) {
				if (!$(this).hasClass("on-1")) {
					return
				}
				f.gotoPreStep()
			});
			$("#j-hitshow .a2").click(function(g) {
				if (!$(this).hasClass("on-2")) {
					return
				}
				f.gotoNextStep()
			})
		},
		onSlidBegin: function() {
			$("#j-hitshow .a1").removeClass("on-1");
			$("#j-hitshow .a2").removeClass("on-2")
		},
		onSlidEnd: function(f, e) {
			if (f.isPreEnable()) {
				$("#j-hitshow .a1").addClass("on-1")
			} else {
				$("#j-hitshow .a1").removeClass("on-1")
			}
			if (f.isNextEnable()) {
				$("#j-hitshow .a2").addClass("on-2")
			} else {
				$("#j-hitshow .a2").removeClass("on-2")
			}
		}
	});
	d.simpleTab("#j-rankent", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-ranktv", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-rankmovie", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-rankcomic", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-rankzongyi", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-rankmusic", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	});
	d.simpleTab("#j-rankauto", {
		tabs: "span>a",
		tabsFor: ">ol",
		switchClass: "active"
	})
})(LETV.using("App.Index")); (function(e) {
	var g = window,
	b = LETV.cookie,
	a = LETV.Utils,
	c = window.external,
	f = "http://favicon.ico",
	d = "http://www.letv.com/ptv/vplay/";
	e.Favorite = {
		init: function(h) {
			var i = this.options = {
				cont: ".stowBody",
				btsee: ".see",
				ctdemo: ".say",
				btshut: "span a",
				btforgettip: ".js-notip",
				btaddfav: ".add",
				btshowdemo: ".see",
				adback: ".j-adi-pic a",
				adback_btshut: ".j-adi-pic .btn_close",
				tpl_chrome: '<div class="stowBody" style="display:none;" data-statectn="n_topfav" data-itemhldr="a"><div class="stow"><span><a href="javascript:void(0)" title="关闭"></a></span><i class="i-1"><a href="javascript:void(0)" class="js-notip" title="不再提示">不再提示</a><a href="javascript:void(0)" class="add" title="添加收藏" style="display:none;"></a><a href="javascript:void(0)" class="see" title="我知道了" style="display:none;"></a></i><div class="say"><img src="http://i2.letvimg.com/img/201203/05/info.jpg"></div></div></div>',
				tpl_other: '<div class="stowBody" style="display:none;" data-statectn="n_topfav" data-itemhldr="a"><div class="stow"><span><a href="javascript:void(0)" title="关闭"></a></span><i class="i-2"><a href="javascript:void(0)" class="js-notip" title="不再提示">不再提示</a><a href="javascript:void(0)" class="add" title="添加收藏"></a><a href="javascript:void(0)" class="see" title="我知道了" style="display:none;"></a></i><div class="say"><img src="http://i2.letvimg.com/img/201203/05/info.jpg"></div></div></div>',
				tpl_ie9: '<div class="stowBody" style="display:none;" data-statectn="n_topfav" data-itemhldr="a"><div class="stow"><span><a href="javascript:void(0)" title="关闭"></a></span><i class="i-3"><a href="javascript:void(0)" class="js-notip" title="不再提示">不再提示</a><a href="javascript:void(0)" class="add" title="添加收藏" style="display:none;"></a><a href="javascript:void(0)" class="see" title="我知道了"></a></i><div class="say"><img src="http://i2.letvimg.com/img/201203/05/info.jpg"></div></div></div>',
				tpl_demo: ""
			};
			if (h && "Favorite" in h) {
				$.extend(this.options, h.Favorite, true)
			}
			if (!this.getHideState()) {
				this.showTopTip()
			}
		},
		add: function() {
			var j = document.title || decodeURIComponent("%E4%B9%90%E8%A7%86%E7%BD%91"),
			h = document.location.href || decodeURIComponent("http://www.ffcms.cn");
			try {
				g.external.AddFavorite(h, j)
			} catch(i) {
				try {
					g.sidebar.addPanel(j, h, "")
				} catch(i) {}
			}
			this.hideTopTip()
		},
		showTopTip: function() {
			var k = this.options,
			i = this;
			if ($.browser.iPad && !$.browser.atwin) {
				return
			} else {
				if ($.browser.msie && $.browser.version === "9.0") {
					try {
						i.addJumpList();
						window.external.msIsSiteMode() ? $(document.body).prepend($(k.tpl_other)) : $(document.body).prepend($(k.tpl_ie9))
					} catch(j) {}
				} else {
					if ("external" in g && "AddFavorite" in g.external || g.sidebar && "addPanel" in g.sidebar) {
						$(document.body).prepend($(k.tpl_other))
					} else {
						$(document.body).prepend($(k.tpl_chrome))
					}
				}
			}
			$(document.body).prepend($(k.tpl_demo));
			var h = this.Container = $(k.cont);
			if (this.Container.length === 0) {
				return
			}
			this.Tip = $(k.tip, h)[0];
			this.ctDemo = $(k.ctdemo, h);
			this.btShut = $(k.btshut, h);
			this.btForgetTip = $(k.btforgettip, h);
			this.btAddFav = $(k.btaddfav, h);
			this.btShowDemo = $(k.btshowdemo, h);
			this.btSee = $(k.btsee, h);
			this.btSee.click(function() {
				i.ctDemo.toggle()
			});
			this.btAddFav.click(function() {
				i.add()
			});
			this.btShut.click(function() {
				i.Container.hide();
				try {
					$(k.adback).css("top", "0px");
					$(k.adback_btshut).css("top", "10px")
				} catch(l) {}
			});
			this.btForgetTip.click(function() {
				i.hideTopTip()
			});
			try {
				$(k.adback).css("top", "44px");
				$(k.adback_btshut).css("top", "54px")
			} catch(j) {}
			h.show()
		},
		addJumpList: function() {
			var h = this;
			if (g.getHistoryRecoed) {
				g.getHistoryRecoed(function(i) {
					h.addJumpListItem(i)
				})
			} else {
				h.addJumpListItem()
			}
		},
		addJumpListItem: function(h) {
			c.msSiteModeClearJumpList();
			c.msSiteModeShowJumplist();
			c.msSiteModeCreateJumplist("\u7cbe\u5f69\u5185\u5bb9");
			c.msSiteModeAddJumpListItem("\u4F1A\u5458\u4E13\u533A", "http://yuanxian.letv.com/vip/", f);
			c.msSiteModeAddJumpListItem("\u70ED\u64AD\u699C", "http://top.letv.com/indexhp.html", f);
			c.msSiteModeAddJumpListItem("\u6700\u65B0\u66F4\u65B0", "http://so.letv.com/list", f);
			c.msSiteModeAddJumpListItem("\u7efc\u827a", "http://zongyi.letv.com/", f);
			c.msSiteModeAddJumpListItem("\u52a8\u6f2b", "http://comic.gmwly.com/", f);
			c.msSiteModeAddJumpListItem("\u7535\u5f71", "http://movie.gmwly.com/", f);
			c.msSiteModeAddJumpListItem("\u7535\u89c6\u5267", "http://tv.gmwly.com/", f);
			if (h) {
				h[0] && c.msSiteModeAddJumpListItem("\u6700\u8FD1\u89C2\u770B : " + a.clipstring(h[0].title, 30), d + h[0].vid + ".html", f);
				h[1] && c.msSiteModeAddJumpListItem("\u6700\u8FD1\u89C2\u770B : " + a.clipstring(h[1].title, 30), d + h[1].vid + ".html", f);
				h[2] && c.msSiteModeAddJumpListItem("\u6700\u8FD1\u89C2\u770B : " + a.clipstring(h[2].title, 30), d + h[2].vid + ".html", f)
			}
		},
		getHideState: function() {
			return b("ishideFavTip")
		},
		hideTopTip: function() {
			var h = new Date();
			h.setTime(h.getTime() + 365 * 24 * 3600 * 1000);
			b("ishideFavTip", "1", {
				expires: h
			});
			this.btShut.trigger("click")
		}
	};
	e.Mobile = {
		init: function(h) {
			var j = {
				cont: ".mobile",
				btShut: "span a",
				linkbtn: "i a",
				linkurl: "",
				jheader: "#j-header",
				jnavbar: "#j-navbar",
				aidcot: ".j-adpic",
				tpl: '<div class="mobile"><div class="m-down"><span><a title="" href="javascript:;"></a></span><i><a target="_blank" title="" href="#"></a></i></div></div>'
			};
			var i = this.options = $.extend(j, h, true);
			if (!this.getHideState()) {
				this.showTopTip()
			}
		},
		showTopTip: function() {
			var j = this.options,
			i = this;
			$(document.body).prepend($(j.tpl));
			var h = this.Container = $(j.cont);
			if (this.Container.length === 0) {
				return
			}
			this.btShut = $(j.btShut, h);
			this.linkbtn = $(j.linkbtn, h);
			this.linkbtn.attr("href", j.linkurl);
			$(j.aidcot).remove();
			$(j.jheader).removeClass("Header1");
			$(j.jnavbar).removeClass("navbar1");
			this.btShut.click(function() {
				h.hide()
			});
			h.show()
		},
		getHideState: function() {
			return b("ishideMobTip")
		},
		hideTopTip: function() {
			var h = new Date();
			h.setTime(h.getTime() + 365 * 24 * 3600 * 1000);
			b("ishideMobTip", "1", {
				expires: h
			});
			this.btShut.trigger("click")
		}
	};
	$(function() {
		if ($.browser.iPad) {
			e.Mobile.init({
				linkurl: "http://itunes.apple.com/cn/app/id412395632?mt=8&ls=1"
			})
		} else {
			if ($.browser.iPhone) {
				e.Mobile.init({
					linkurl: "http://itunes.apple.com/cn/app/id385285922?mt=8"
				})
			} else {
				if ($.browser.andorid) {
					e.Mobile.init({
						linkurl: "http://app.m.letv.com/android/index.php?/stat/download/add/pcode/010110000"
					})
				} else {
					$(function() {
						e.Favorite.init(g.__INFO__)
					})
				}
			}
		}
	})
})(LETV.using("Plugin")); (function(b) {
	var a = {
		obj: {
			id: ".j-bigImage",
			url: "exhibitimag_1.json",
			time: 600,
			type: 0,
			$item: [0, 192, 384, 576, 768],
			$bigImg: [180, 360, 540, 720, 900]
		},
		init: function(d) {
			$.extend(this.obj, d);
			this.getData()
		},
		getData: function() {
			var f = this,
			h = f.obj.id,
			g = f.obj.url,
			e = f.obj.type,
			d = "",
			i = f.obj.id;
			$.getScript(g,
			function() {
				var k = (e == 1 ? j_focusBigImageOne: j_focusBigImageTwo);
				for (var j = 0; j < k.length; j++) {
					d += '<div class="apps" style="float:left;position:absolute">';
					d += '<div data-item="' + j + '" class="j-imgs item' + (j + 1) + '" style="position: relative;z-index:' + (j + 1) + "; text-align:center; width:158px;left:" + f.obj.$item[j] + 'px;">';
					d += '<a target="_blank" href="' + k[j].click1 + '"><img class="item " src="' + k[j].imgurl1 + '" style="width:158px;height:144px;text-align:center;" /></a>';
					d += '<img class="j-abtn" src="' + k[j].imgurl3 + '" style="position: relative;cursor: pointer;z-index:2; width:138px; margin:0 auto;text-align:center;" />';
					d += "</div>";
					d += '<a target="_blank" href="' + k[j].click2 + '"><img  class="bigImg bigImg' + (j + 1) + '" style="position:absolute;top:20px;height:150px;width:10px;z-index:7;opacity:0;filter:alpha(opacity=0);left:' + f.obj.$bigImg[j] + 'px" src="' + k[j].imgurl2 + '" /></a>';
					d += "</div>"
				}
				$(h).html(d);
				f.bigBtnHover(i);
				f.idHover(i)
			})
		},
		bigBtnHover: function(i) {
			var e = this;
			var i = $(i);
			var h = e.obj.time;
			var g = i.find(".j-abtn");
			var d = i.find(".bigImg");
			var f = i.find(".j-imgs");
			g.each(function(k) {
				var j = $(this);
				j.hover(function() {
					f.stop();
					d.stop();
					f.removeClass("itemLeft");
					f.removeClass("itemRight");
					for (var o = 0; o < 5; o++) {
						if (o <= k && o != 0) {
							f.eq(o).addClass("itemLeft")
						}
						if (o > k) {
							f.eq(o).addClass("itemRight")
						}
					}
					var l = i.find(".itemLeft");
					var n = i.find(".itemRight");
					var m = j.parent().parent().find(".bigImg");
					m.show();
					l.animate({
						left: 0
					},
					h);
					n.animate({
						left: 740,
						opacity: 0
					},
					h);
					m.animate({
						width: 740,
						opacity: 1,
						left: 168
					},
					h)
				},
				function() {})
			})
		},
		idHover: function(p) {
			var q = this,
			f = q.obj.time,
			p = $(p),
			r = p.find(".bigImg"),
			m = p.find(".j-imgs"),
			i = p.find(".item1"),
			h = p.find(".item2"),
			g = p.find(".item3"),
			e = p.find(".item4"),
			d = p.find(".item5"),
			o = p.find(".bigImg1"),
			n = p.find(".bigImg2"),
			l = p.find(".bigImg3"),
			k = p.find(".bigImg4"),
			j = p.find(".bigImg5");
			p.hover(function() {},
			function() {
				m.stop();
				r.stop();
				r.hide();
				i.animate({
					opacity: 1,
					left: q.obj.$item[0]
				},
				f);
				h.animate({
					opacity: 1,
					left: q.obj.$item[1]
				},
				f);
				g.animate({
					opacity: 1,
					left: q.obj.$item[2]
				},
				f);
				e.animate({
					left: q.obj.$item[3],
					opacity: 1
				},
				f);
				d.animate({
					opacity: 1,
					left: q.obj.$item[4]
				},
				f);
				o.animate({
					width: 0,
					opacity: 0,
					left: q.obj.$bigImg[0]
				},
				f);
				n.animate({
					width: 0,
					opacity: 0,
					left: q.obj.$bigImg[1]
				},
				f);
				l.animate({
					width: 0,
					opacity: 0,
					left: q.obj.$bigImg[2]
				},
				f);
				k.animate({
					width: 0,
					opacity: 0,
					left: q.obj.$bigImg[3]
				},
				f);
				j.animate({
					width: 0,
					opacity: 0,
					left: q.obj.$bigImg[4]
				},
				f)
			})
		}
	};
	var c = function(d) {
		var e = $.extend({},
		a);
		return e.init(d)
	};
	b.FocusImage = c
})(LETV.using("Plugin"));