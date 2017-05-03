var _hmt = _hmt || [];
var domain = document.domain;
// domainList = {'domain':[baidu key, google key, CNZZ key]}
var domainList = {
    'baofeng.com' : ['034253c5988f5d0fef5c2eaeff95573c', '', '30089255'],
    'www.baofeng.com' : ['034253c5988f5d0fef5c2eaeff95573c', '', '30089255'],
    'hd.baofeng.com' : ['b880ef7cb07184ae053b714230b722f8', 'UA-40886599-1', '30082196'],
    'a.hd.baofeng.com' : ['f580e214c6d528ab3e57898d3d077abc', 'UA-40908912-1', '30082189'],
    'b.hd.baofeng.com' : ['ba7c531a1fa33d7b79b5ef1dcc4baed6', 'UA-40910400-1', '30082190'],
    'c.hd.baofeng.com' : ['53f455dcab0d5346055ed8c96579c681', 'UA-40903730-1', '30082191'],
    'd.hd.baofeng.com' : ['0667646481f2938e8a32d3212e5d6731', 'UA-40894861-1', '30082192'],
    'e.hd.baofeng.com' : ['bf180a168b2fd327482a5a6293dc89a6', 'UA-40909706-1', '30082193'],
    'f.hd.baofeng.com' : ['0431a3e7dc033e69809d23fa088fdcf3', 'UA-40888784-1', '30082194'],
    'g.hd.baofeng.com' : ['f800005184b799d30109db429abf6e26', 'UA-40888586-1', '30082195'],
    'share.hd.baofeng.com' : ['1cfbd0c3c7c0dae4123aa107abc52766', 'UA-46326861-1', '30088222']
};
if (domainList[domain]) {
    if (domainList[domain][1]) {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] ||
            function() {
                (i[r].q = i[r].q || []).push(arguments);
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m);
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', domainList[domain][1], 'baofeng.com');
        ga('send', 'pageview');
    }
    (function() {
        var hm = document.createElement('script');
        var cnzz = document.createElement('script');
        var s = document.getElementsByTagName('script')[0];
        hm.src = '//hm.baidu.com/hm.js?' + domainList[domain][0];
        cnzz.src = 'http://w.cnzz.com/c.php?id=' + domainList[domain][2];
        s.parentNode.insertBefore(cnzz, s);
        s.parentNode.insertBefore(hm, s);
    })();
}
