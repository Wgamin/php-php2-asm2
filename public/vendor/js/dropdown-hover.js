!function(t,e){if("object"==typeof exports&&"object"==typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var o=e();for(var d in o)("object"==typeof exports?exports:t)[d]=o[d]}}(self,(function(){return function(t){if(t&&t.fn){var e="[data-bs-toggle=dropdown][data-trigger=hover]";t((function(){t("body").on("mouseenter","".concat(e,", ").concat(e," ~ .dropdown-menu"),(function(){var o,d,n=t(this).hasClass("dropdown-menu")?t(this):t(this).next(".dropdown-menu");"static"!==window.getComputedStyle(n[0],null).getPropertyValue("position")&&(t(this).is(e)&&t(this).data("hovered",!0),(d=(o=t(this).hasClass("dropdown-toggle")?t(this):t(this).prev(".dropdown-toggle")).data("dd-timeout"))&&(clearTimeout(d),d=null,o.data("dd-timeout",d)),"true"!==o.attr("aria-expanded")&&o.dropdown("toggle"))})).on("mouseleave","".concat(e,", ").concat(e," ~ .dropdown-menu"),(function(){var o,d,n=t(this).hasClass("dropdown-menu")?t(this):t(this).next(".dropdown-menu");"static"!==window.getComputedStyle(n[0],null).getPropertyValue("position")&&(t(this).is(e)&&t(this).data("hovered",!1),(d=(o=t(this).hasClass("dropdown-toggle")?t(this):t(this).prev(".dropdown-toggle")).data("dd-timeout"))&&clearTimeout(d),d=setTimeout((function(){var t=o.data("dd-timeout");t&&(clearTimeout(t),t=null,o.data("dd-timeout",t)),"true"===o.attr("aria-expanded")&&o.dropdown("toggle")}),150),o.data("dd-timeout",d))})).on("hide.bs.dropdown",(function(o){t(this).find(e).data("hovered")&&o.preventDefault()}))}))}}(window.jQuery),{}}));