$(function() {
var lazyloadImg = function() {
			this.datas = {
				lazy_info: {
					type: "lazyload-type",
					url: "lazyload-url"
				},
				lazy_data: {}
			}
		};
	lazyloadImg.prototype = {
		init: function() {
			this.bindEvent();
			this.checkImg($(document).scrollTop() + $(window).height())
		},
		checkImg: function(top) {
			var $this = null;
			$("img[data-lazyload-type]").each(function() {
				$this = $(this);
				if ("hand" !== $this.data("lazyload-type") && $this.offset().top <= top) {
					$this.attr("src", $this.data("lazyload-src"));
					$this.removeAttr("data-lazyload-type");
					$this.removeAttr("data-lazyload-src")
				}
			})
		},
		bindEvent: function() {
			var self = this;
			$(window).on("scroll", function() {
				self.checkImg($(document).scrollTop() + $(window).height())
			})
		}
	};
	(new lazyloadImg).init();
	$(function() {
		var focusPanel = function(opts) {
			var defs = {
				csses: {
					focus_main: ".focus-sya",
					focus_panel: ".focus-panel",
					panel_item: "li.item",
					focus_tab: ".focus-tab",
					focus_tab_item: ".item",
					focus_control: ".focus-control",
					focus_nav: ".focus-nav",
					tab_item: "li.item",
					tab_item_state: "select",
					pre_btn: ".pre-btn",
					focus_link: ".focus-link",
					next_btn: ".next-btn"
				},
				datas: {
					anim_layer_interval: 6e3,
					tab_auto_hide_time: 15e3
				}
			};
			this.opts = $.extend({}, defs, opts);
			this.datas = {};
			this.datas._panelImgByBig = [];
			this.doms = {}
		};
//////////////////////////////////////////////////////////////////////////////////
focusPanel.prototype = {
		constructor: focusPanel,
		init: function() {
			var self = this,
				opts = this.opts,
				csses = opts.csses;
			this.datas.animIndex = 0;
			this.doms.focus_main = $(csses.focus_main);
			this.doms.tab_item = this.doms.focus_main.find(csses.focus_nav).find(csses.tab_item).each(function(index) {
				$(this).data("index", index)
			});
			this.doms.focus_panel = this.doms.focus_main.find(csses.focus_panel);
			this.doms.panel_item = this.doms.focus_panel.find(csses.panel_item).hide();
			this.doms.focus_control = this.doms.focus_main.find(csses.focus_control);
			this.doms.focus_nav = this.doms.focus_control.find(csses.focus_nav);
			this.doms.focus_tab = this.doms.focus_control.find(csses.focus_tab);
			this.datas.focus_tab_item_width = this.calcuElemFullWidth(this.doms.focus_nav.find(csses.focus_tab_item).first());
			this.datas.focus_tab_item_view_len = Math.round(this.calcuElemFullWidth(this.doms.focus_nav) / this.datas.focus_tab_item_width);
			this.datas.panel_item_len = this.doms.panel_item.length;
			this.datas.focusControlTimer = null;
			this.datas.animLayerTimer = null;
			this.appendPanelImgStage();
			this.beforeLoadImg();
			self.animLayer();
			this.bindEvent();
			self.timeoutFocusControl();
			self.startAnimLayer()
		},
		calcuElemFullWidth: function(elem) {
			for (var _width = 0, _full_per = ["marginRight", "marginLeft"], len = _full_per.length; len--;) _width += parseInt(elem.css(_full_per[len]));
			return _width + elem.outerWidth()
		},
		calcuAnimIndex: function(str) {
			var datas = this.datas;
			if ("prev" === str) if (datas.animIndex - 1 < 0) {
				this.datas.animIndex = datas.panel_item_len - 1;
				this.datas.layerIndexType = "last"
			} else {
				this.datas.animIndex--;
				this.datas.layerIndexType = ""
			} else if ("next" === str) if (datas.animIndex + 2 > datas.panel_item_len) {
				this.datas.animIndex = 0;
				this.datas.layerIndexType = "first"
			} else {
				this.datas.animIndex++;
				this.datas.layerIndexType = ""
			}
		},
		animFocusControl: function(str) {
			var _opy = 0;
			if ("show" === str) {
				this.doms.focus_control.css({
					opacity: 0
				}).show();
				_opy = 1
			} else "hide" === str && (_opy = 0);
			this.doms.focus_control.stop().animate({
				opacity: _opy
			}, 400)
		},
		timeoutFocusControl: function() {
			var self = this;
			this.datas.focusControlTimer && clearTimeout(this.datas.focusControlTimer);
			this.datas.focusControlTimer = setTimeout(function() {
				self.animFocusControl("hide")
			}, this.opts.datas.tab_auto_hide_time)
		},
		animLayer: function() {
			this.checkPanelImgState();
			this.doms.panel_item.hide().eq(this.datas.animIndex).show().css({
				opacity: 0
			}).animate({
				opacity: 1
			}, 400, function() {});
			this.calcuFocusTab()
		},
		animFocusTab: function(width) {
			var self = this,
				_index_type = this.datas.layerIndexType;
			if (self.doms.clone) {
				self.doms.clone.remove();
				self.doms.clone = null
			}
			if ("last" === _index_type) {
				this.doms.clone = this.doms.tab_item.first().clone().removeClass(this.opts.csses.tab_item_state);
				this.doms.clone.insertAfter(this.doms.tab_item.last());
				this.doms.focus_tab.css("left", width - this.datas.focus_tab_item_width)
			} else if ("first" === _index_type) {
				this.doms.clone = this.doms.tab_item.last().clone().removeClass(this.opts.csses.tab_item_state);
				this.doms.clone.insertBefore(this.doms.tab_item.first());
				this.doms.focus_tab.css("left", 0);
				width = -this.datas.focus_tab_item_width
			}
			this.doms.focus_tab.stop().animate({
				left: width
			}, 400, function() {
				"first" === _index_type && $(this).css({
					left: 0
				});
				self.doms.clone && self.doms.clone.remove();
				self.doms.clone = null
			})
		},
		beforeLoadImg: function() {
			var self = this;
			this.doms.panel_item.each(function() {
				var $this = $(this),
					_img_src = $this.css("backgroundImage"),
					_start = _img_src.indexOf("http:"),
					_end = _img_src.indexOf(".jpg");
				self.datas._panelImgByBig.push({
					name: _img_src,
					state: !1
				});
				self.initLoadImg(_img_src.slice(_start, _end + 4))
			})
		},
		initLoadImg: function(img_src) {
			var self = this,
				__img = new Image;
			__img.onload = __img.onreadystatechange = function() {
				self.changeImgState(img_src)
			};
			__img.src = img_src
		},
		changeImgState: function(img_src) {
			for (var _imgs = this.datas._panelImgByBig, i = 0, len = _imgs.length; len > i; i++) new RegExp(img_src, "i").test(_imgs[i].name) && (this.datas._panelImgByBig[i].state = !0);
			this.checkPanelImgState()
		},
		checkPanelImgState: function() {
			this.datas._panelImgByBig[this.datas.animIndex].state ? this.doms.panelImgState.hide() : this.doms.panelImgState.show()
		},
		appendPanelImgStage: function() {
			var html = '<div class="loading-sya"><b class="ico ico-loading-sya"></b>加载中...</div>';
			this.doms.panelImgState = $(html).hide();
			this.doms.focus_panel.parent().append(this.doms.panelImgState)
		},
		calcuFocusTab: function() {
			var datas = this.datas;
			datas.panel_item_len > datas.focus_tab_item_view_len && datas.animIndex > datas.focus_tab_item_view_len - 2 ? datas.animIndex + 1 > datas.focus_tab_item_view_len - 1 && datas.animIndex + 1 < datas.panel_item_len ? this.animFocusTab(-(datas.animIndex - (datas.focus_tab_item_view_len - 2)) * datas.focus_tab_item_width) : this.animFocusTab(-(datas.animIndex - (datas.focus_tab_item_view_len - 1)) * datas.focus_tab_item_width) : this.animFocusTab(0)
		},
		startAnimLayer: function() {
			var self = this;
			this.stopAnimLayer();
			this.datas.animLayerTimer = setTimeout(function() {
				self.nextStateUpdate();
				self.startAnimLayer()
			}, this.opts.datas.anim_layer_interval)
		},
		stopAnimLayer: function() {
			this.datas.animLayerTimer && clearTimeout(this.datas.animLayerTimer)
		},
		nextStateUpdate: function() {
			this.calcuAnimIndex("next");
			this.animLayer();
			this.animTabItem()
		},
		prevStateUpdate: function() {
			this.calcuAnimIndex("prev");
			this.animLayer();
			this.animTabItem()
		},
		animTabItem: function() {
			var opts = this.opts,
				csses = opts.csses;
			this.doms.tab_item.removeClass(csses.tab_item_state).eq(this.datas.animIndex).addClass(csses.tab_item_state)
		},
		bindEvent: function() {
			var self = this,
				opts = this.opts,
				csses = opts.csses;
			$(csses.focus_control).delegate(csses.tab_item, "click", function(event) {
				event.preventDefault();
				self.datas.animIndex = $(this).data("index");
				if (!$(this).hasClass(csses.tab_item_state)) {
					$(this).addClass(csses.tab_item_state).siblings().removeClass(csses.tab_item_state);
					self.animLayer();
					self.startAnimLayer();
					self.animTabItem()
				}
			}).delegate(csses.pre_btn, "click", function(event) {
				event.preventDefault();
				self.prevStateUpdate();
				self.startAnimLayer()
			}).delegate(csses.next_btn, "click", function(event) {
				event.preventDefault();
				self.nextStateUpdate();
				self.startAnimLayer()
			});
			this.doms.focus_main.on("mouseover", function(event) {
				event.preventDefault();
				self.datas.focusControlTimer && clearTimeout(self.datas.focusControlTimer);
				parseFloat(self.doms.focus_control.css("opacity")) > 0 || self.animFocusControl("show")
			}).on("mouseleave", function(event) {
				event.preventDefault();
				self.timeoutFocusControl()
			})
		}
	};
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
(new focusPanel).init();
		!
		function() {
			var safetyRopaganda = $(".safety-ropaganda"),
				variate = 0;
			$(window).on("scroll", function() {
				var win = $(this),
					winHt = win.height() + win.scrollTop();
				if (0 == win.scrollTop() || 743 > winHt && 1 == variate) {
					variate = 0;
					safetyRopaganda.css({
						position: "absolute",
						top: "506px",
						bottom: "auto"
					})
				} else if (winHt >= 743 && 0 == variate) {
					variate = 1;
					safetyRopaganda.css({
						position: "fixed",
						top: "auto",
						bottom: "10px",
						_position: "absolute",
						_top: "506px",
						_bottom: "auto"
					})
				}
			})
		}
	})
});
