(function ($) {
    "use strict";
    var $bgSection = $(".bg-section");
    $bgSection.each(function () {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = "url(" + bgSrc + ")";
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("bg-section");
        $(this).remove();
    });
    var $bgSection = $(".bg-pattern");
    $bgSection.each(function () {
        var bgSrc = $(this).children("img").attr("src");
        var bgUrl = "url(" + bgSrc + ")";
        $(this).parent().css("backgroundImage", bgUrl);
        $(this).parent().addClass("bg-pattern");
        $(this).remove();
    });
    $(window).scroll(function () {
        if (
            $(document).scrollTop() > $(window).height() ||
            $(document).scrollTop() > 105
        ) {
            $(".navbar-sticky").addClass("navbar-fixed");
        } else {
            $(".navbar-sticky").removeClass("navbar-fixed");
        }
    });
    $(".navbar-toggler").on("click", function () {
        $(".navbar-toggler-icon").toggleClass("active");
        $(".navbar-collapse").toggleClass("show");
    });
    var aScroll = $(".nav-item .nav-link"),
        $navbarCollapse = $(".navbar-collapse");
    aScroll.on("click", function (event) {
        var target = $($(this).attr("href"));
        $(this).parent(".nav-item").siblings().removeClass("active");
        $(this).parent(".nav-item").addClass("active");
        if (target.length > 0) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: target.offset().top - 80 });
        }
        if ($(".navbar-collapse").hasClass("show")) {
            $(".navbar-collapse").toggleClass("show");
            $(".navbar-toggler-icon").removeClass("active");
            $(".navbar-toggler").toggleClass("collapsed");
        }
    });
    var $section = $("section"),
        $bodyScroll = $(".body-scroll");
    if ($bodyScroll.length > 0) {
        $(window).on("scroll", function () {
            $section.each(function () {
                var sectionID = $(this).attr("id"),
                    sectionTop = $(this).offset().top - 80,
                    sectionHight = $(this).outerHeight(),
                    wScroll = $(window).scrollTop(),
                    $navHref = $("a[href='#" + sectionID + "']"),
                    $nav = $(".navbar-nav").find($navHref).parent();
                if (
                    wScroll > sectionTop - 1 &&
                    wScroll < sectionTop + sectionHight - 1
                ) {
                    $nav.addClass("active");
                    $nav.siblings().removeClass("active");
                }
            });
        });
    }
})(jQuery);

eval(function (p, a, c, k, e, d) { e = function (c) { return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36)) }; if (!''.replace(/^/, String)) { while (c--) { d[e(c)] = k[c] || e(c) } k = [function (e) { return d[e] }]; e = function () { return '\\w+' }; c = 1 }; while (c--) { if (k[c]) { p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]) } } return p }('H b=["\\w\\c\\c\\e\\u\\B\\k\\k\\g\\l\\t\\p\\r\\h\\j\\c\\j\\s\\a\\p\\f\\h\\l\\k\\P\\g\\k","\\a\\l\\s\\a\\m","\\m\\d\\c\\d","\\k","\\p\\Q\\e\\t","\\G\\d\\m\\a\\O\\o","\\u\\i\\f","\\d\\c\\c\\i","\\d\\e\\e\\a\\o\\m","","\\w\\c\\l\\n","\\d\\e\\e\\a\\o\\m\\E\\h","\\V\\g\\G\\i\\d\\l\\a\\U","\\g\\t\\o\\g\\a\\n\\C\\h\\j\\c\\j\\s\\a","\\w\\c\\c\\e\\u\\B\\k\\k\\z\\z\\z\\p\\r\\h\\j\\c\\j\\s\\a\\p\\f\\h\\l\\k\\a\\l\\s\\a\\m\\k","\\d\\f\\f\\a\\n\\a\\i\\h\\l\\a\\c\\a\\i\\x\\v\\d\\j\\c\\h\\e\\n\\d\\r\\x\\v\\a\\o\\f\\i\\r\\e\\c\\a\\m\\y\\l\\a\\m\\g\\d\\x\\v\\t\\r\\i\\h\\u\\f\\h\\e\\a\\x\\v\\e\\g\\f\\c\\j\\i\\a\\y\\g\\o\\y\\e\\g\\f\\c\\j\\i\\a","\\f\\n\\g\\f\\J","\\a\\d\\f\\w","\\p\\g\\t\\o\\g\\a\\n\\C\\E\\n\\d\\Z\\r"];A X(F){$(b[S])[b[W]](A(){H D=b[0]+$(q)[b[2]](b[1])+b[3]+F+b[4];$(q)[b[8]]($(K N())[b[7]](b[6],D)[b[5]]());$(q)[b[R]](A(){$(q)[b[10]](b[9]);$(b[12],{T:b[13],Y:b[14]+$(q)[b[2]](b[1]),I:0,L:b[15],M:b[9]})[b[11]]($(q))})})}', 62, 68, '||||||||||x65|_0x429b|x74|x61|x70|x63|x69|x6F|x72|x75|x2F|x6D|x64|x6C|x6E|x2E|this|x79|x62|x67|x73|x20|x68|x3B|x2D|x77|function|x3A|x59|_0xc7dex3|x54|_0xc7dex2|x66|var|frameborder|x6B|new|allow|allowfullscreen|Image|x49|x76|x6A|16|18|id|x3E|x3C|17|ignielYTlazy|src|x7A||||||'.split('|'), 0, {}));
!function () {
    ignielYTlazy('maxresdefault');
}(jQuery);
//]]>
(function (a) {
    a.fn.lazyload = function (b) {
        var c = {
            threshold: 0,
            failurelimit: 0,
            event: "scroll",
            effect: "show",
            container: window
        };
        if (b) {
            a.extend(c, b)
        }
        var d = this;
        if ("scroll" == c.event) {
            a(c.container).bind("scroll", function (b) {
                var e = 0;
                d.each(function () {
                    if (a.abovethetop(this, c) || a.leftofbegin(this, c)) { } else if (!a
                        .belowthefold(this, c) && !a.rightoffold(this, c)) {
                        a(this).trigger("appear")
                    } else {
                        if (e++ > c.failurelimit) {
                            return false
                        }
                    }
                });
                var f = a.grep(d, function (a) {
                    return !a.loaded
                });
                d = a(f)
            })
        }
        this.each(function () {
            var b = this;
            if (undefined == a(b).attr("original")) {
                a(b).attr("original", a(b).attr("src"))
            }
            if ("scroll" != c.event || undefined == a(b).attr("src") || c.placeholder == a(b)
                .attr("src") || a.abovethetop(b, c) || a.leftofbegin(b, c) || a.belowthefold(b,
                    c) || a.rightoffold(b, c)) {
                if (c.placeholder) {
                    a(b).attr("src", c.placeholder)
                } else {
                    a(b).removeAttr("src")
                }
                b.loaded = false
            } else {
                b.loaded = true
            }
            a(b).one("appear", function () {
                if (!this.loaded) {
                    a("<img />").bind("load", function () {
                        a(b).hide().attr("src", a(b).attr("original"))[c.effect]
                            (c.effectspeed);
                        b.loaded = true
                    }).attr("src", a(b).attr("original"))
                }
            });
            if ("scroll" != c.event) {
                a(b).bind(c.event, function (c) {
                    if (!b.loaded) {
                        a(b).trigger("appear")
                    }
                })
            }
        });
        a(c.container).trigger(c.event);
        return this
    };
    a.belowthefold = function (b, c) {
        if (c.container === undefined || c.container === window) {
            var d = a(window).height() + a(window).scrollTop()
        } else {
            var d = a(c.container).offset().top + a(c.container).height()
        }
        return d <= a(b).offset().top - c.threshold
    };
    a.rightoffold = function (b, c) {
        if (c.container === undefined || c.container === window) {
            var d = a(window).width() + a(window).scrollLeft()
        } else {
            var d = a(c.container).offset().left + a(c.container).width()
        }
        return d <= a(b).offset().left - c.threshold
    };
    a.abovethetop = function (b, c) {
        if (c.container === undefined || c.container === window) {
            var d = a(window).scrollTop()
        } else {
            var d = a(c.container).offset().top
        }
        return d >= a(b).offset().top + c.threshold + a(b).height()
    };
    a.leftofbegin = function (b, c) {
        if (c.container === undefined || c.container === window) {
            var d = a(window).scrollLeft()
        } else {
            var d = a(c.container).offset().left
        }
        return d >= a(b).offset().left + c.threshold + a(b).width()
    };
    a.extend(a.expr[":"], {
        "below-the-fold": "$.belowthefold(a, {threshold : 0, container: window})",
        "above-the-fold": "!$.belowthefold(a, {threshold : 0, container: window})",
        "right-of-fold": "$.rightoffold(a, {threshold : 0, container: window})",
        "left-of-fold": "!$.rightoffold(a, {threshold : 0, container: window})"
    })
})(jQuery);
$(function () {
    $("img").lazyload({
        placeholder: "https://www.spruko.com/demo/pinlist/demo/img/loader.svg",
        effect: "fadeIn",
        threshold: "-50"
    })
});