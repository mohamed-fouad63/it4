"use strict";
$(document).ready(function () {
  togglemenu();
  if ($("body").hasClass("layout-6") || $("body").hasClass("layout-7")) {
    togglemenulayout();
  }
  menuhrres();
  var b = $(window)[0].innerWidth;
  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();
  $(".to-do-list input[type=checkbox]").on("click");
  $(".mobile-menu").on("click", function () {
    var c = $(this);
    c.toggleClass("on");
  });
  $("#mobile-collapse").on("click", function () {
    if (b > 991) {
      $(".pcoded-navbar:not(.theme-horizontal)").toggleClass(
        "navbar-collapsed"
      );
    }
  });
  if (b <= 991) {
    $(".main-search").addClass("open");
    $(".main-search .form-control").css({
      width: "100px",
    });
  }
  if ($(".noti-body")[0]) {
    var a = new PerfectScrollbar(".notification  .noti-body", {
      wheelSpeed: 0.5,
      swipeEasing: 0,
      suppressScrollX: !0,
      wheelPropagation: 1,
      minScrollbarLength: 40,
    });
  }
  if (!$(".pcoded-navbar").hasClass("theme-horizontal")) {
    var b = $(window)[0].innerWidth;
    if ($(".navbar-content")[0]) {
      if (b < 992 || $(".pcoded-navbar").hasClass("menupos-static")) {
        var a = new PerfectScrollbar(".navbar-content", {
          wheelSpeed: 0.5,
          swipeEasing: 0,
          suppressScrollX: !0,
          wheelPropagation: 1,
          minScrollbarLength: 40,
        });
      } else {
        var a = new PerfectScrollbar(".navbar-content", {
          wheelSpeed: 0.5,
          swipeEasing: 0,
          suppressScrollX: !0,
          wheelPropagation: 1,
          minScrollbarLength: 40,
        });
      }
    }
  }
  setTimeout(function () {
    $(".loader-bg").fadeOut("slow");
  }, 400);
});

function menuhrres() {
  var a = $(window)[0].innerWidth;
  if (a < 992) {
    setTimeout(function () {
      $(".sidenav-horizontal-wrapper")
        .addClass("sidenav-horizontal-wrapper-dis")
        .removeClass("sidenav-horizontal-wrapper");
      $(".theme-horizontal")
        .addClass("theme-horizontal-dis")
        .removeClass("theme-horizontal");
    }, 400);
  } else {
    setTimeout(function () {
      $(".sidenav-horizontal-wrapper-dis")
        .addClass("sidenav-horizontal-wrapper")
        .removeClass("sidenav-horizontal-wrapper-dis");
      $(".theme-horizontal-dis")
        .addClass("theme-horizontal")
        .removeClass("theme-horizontal-dis");
    }, 400);
  }
  setTimeout(function () {
    if ($(".pcoded-navbar").hasClass("theme-horizontal-dis")) {
      $(".sidenav-horizontal-wrapper-dis").css({
        height: "100%",
        position: "relative",
      });
      if ($(".sidenav-horizontal-wrapper-dis")[0]) {
        var b = new PerfectScrollbar(".sidenav-horizontal-wrapper-dis", {
          wheelSpeed: 0.5,
          swipeEasing: 0,
          suppressScrollX: !0,
          wheelPropagation: 1,
          minScrollbarLength: 40,
        });
      }
    }
  }, 1000);
}
var ost = 0;
$(window).scroll();

function togglemenu() {
  var a = $(window)[0].innerWidth;
  if ($(".pcoded-navbar").hasClass("theme-horizontal") == false) {
    if (a <= 1200 && a >= 992) {
      $(".pcoded-navbar:not(.theme-horizontal)").addClass("navbar-collapsed");
    }
    if (a < 992) {
      $(".pcoded-navbar:not(.theme-horizontal)").removeClass(
        "navbar-collapsed"
      );
    }
  }
}

$.fn.pcodedmenu = function (a) {
  var b = this.attr("id");
  var c = {
    themelayout: "vertical",
    MenuTrigger: "click",
    SubMenuTrigger: "click",
  };
  var a = $.extend({}, c, a);
  var d = {
    PcodedMenuInit: function () {
      d.HandleMenuTrigger();
      d.HandleSubMenuTrigger();
      d.HandleOffset();
    },
    HandleSubMenuTrigger: function () {
      var g = $(window);
      var e = g.width();
      if (
        $(".pcoded-navbar").hasClass("theme-horizontal") == true ||
        $(".pcoded-navbar").hasClass("theme-horizontal-dis") == true
      ) {
        if (
          (e >= 992 && $("body").hasClass("layout-6")) ||
          (e >= 992 && $("body").hasClass("layout-7"))
        ) {
          var f = $(
            "body[class*='layout-6'] .theme-horizontal .pcoded-inner-navbar .pcoded-submenu > li.pcoded-hasmenu, body[class*='layout-7'] .theme-horizontal .pcoded-inner-navbar .pcoded-submenu > li.pcoded-hasmenu"
          );
          f.off("click").off("mouseenter mouseleave").hover();
        } else {
          if (
            $("body").hasClass("layout-6") ||
            $("body").hasClass("layout-7")
          ) {
            if ($(".pcoded-navbar").hasClass("theme-horizontal-dis")) {
              var f = $(
                ".pcoded-navbar.theme-horizontal-dis .pcoded-inner-navbar .pcoded-submenu > li.pcoded-hasmenu"
              );
              f.off("click").off("mouseenter mouseleave").hover();
            }
            if (!$(".pcoded-navbar").hasClass("theme-horizontal-dis")) {
              var f = $(
                ".pcoded-navbar:not(.theme-horizontal-dis) .pcoded-inner-navbar .pcoded-submenu > li > .pcoded-submenu > li"
              );
              f.off("mouseenter mouseleave").off("click").on("click");
              $(
                ".pcoded-inner-navbar .pcoded-submenu > li > .pcoded-submenu > li"
              ).on("click");
            }
          } else {
            if (e >= 992) {
              var f = $(
                ".pcoded-navbar.theme-horizontal .pcoded-inner-navbar .pcoded-submenu > li.pcoded-hasmenu"
              );
              f.off("click").off("mouseenter mouseleave").hover();
            } else {
              var f = $(
                ".pcoded-navbar.theme-horizontal-dis .pcoded-inner-navbar .pcoded-submenu > li > .pcoded-submenu > li"
              );
              f.off("mouseenter mouseleave").off("click").on("click");
            }
          }
        }
      }
      switch (a.SubMenuTrigger) {
        case "click":
          $(".pcoded-navbar .pcoded-hasmenu").removeClass("is-hover");
          $(
            ".pcoded-inner-navbar .pcoded-submenu > li > .pcoded-submenu > li"
          ).on("click");
          $(".pcoded-submenu > li").on("click");
          break;
      }
    },
    HandleMenuTrigger: function () {
      var g = $(window);
      var e = g.width();
      if (e >= 992) {
        if ($(".pcoded-navbar").hasClass("theme-horizontal") == true) {
          if (
            (e >= 768 && $("body").hasClass("layout-6")) ||
            (e >= 768 && $("body").hasClass("layout-7"))
          ) {
            var f = $(
              "body[class*='layout-6'] .theme-horizontal .pcoded-inner-navbar > li,body[class*='layout-7'] .theme-horizontal .pcoded-inner-navbar > li "
            );
            f.off("click").off("mouseenter mouseleave").hover();
          } else {
            if (
              $("body").hasClass("layout-6") ||
              $("body").hasClass("layout-7")
            ) {
              if ($(".pcoded-navbar").hasClass("theme-horizontal-dis")) {
                var f = $(
                  ".pcoded-navbar.theme-horizontal-dis .pcoded-inner-navbar > li"
                );
                f.off("click").off("mouseenter mouseleave").hover();
              }
              if (!$(".pcoded-navbar").hasClass("theme-horizontal-dis")) {
                var f = $(
                  ".pcoded-navbar:not(.theme-horizontal-dis) .pcoded-inner-navbar > li"
                );
                f.off("mouseenter mouseleave").off("click").on("click");
              }
            } else {
              var f = $(".theme-horizontal .pcoded-inner-navbar > li");
              f.off("click").off("mouseenter mouseleave").hover();
            }
          }
        }
      } else {
        var f = $(
          ".pcoded-navbar.theme-horizontal-dis .pcoded-inner-navbar > li"
        );
        f.off("mouseenter mouseleave").off("click").on("click");
      }
      switch (a.MenuTrigger) {
        case "click":
          $(".pcoded-navbar").removeClass("is-hover");
          $(".pcoded-inner-navbar > li:not(.pcoded-menu-caption) ").on(
            "click",
            function () {
              if ($(this).hasClass("pcoded-trigger")) {
                $(this).removeClass("pcoded-trigger");
                $(this).children(".pcoded-submenu").slideUp();
              } else {
                $("li.pcoded-trigger").children(".pcoded-submenu").slideUp();
                $(this)
                  .closest(".pcoded-inner-navbar")
                  .find("li.pcoded-trigger")
                  .removeClass("pcoded-trigger");
                $(this).addClass("pcoded-trigger");
                $(this).children(".pcoded-submenu").slideDown();
              }
            }
          );
          break;
      }
    },
    HandleOffset: function () {
      switch (a.themelayout) {
        case "horizontal":
          var e = a.SubMenuTrigger;
          if (e === "hover") {
            $("li.pcoded-hasmenu").on("mouseenter mouseleave");
          } else {
            $("li.pcoded-hasmenu").on("click");
          }
          break;
        default:
      }
    },
  };
  d.PcodedMenuInit();
};
$("#pcoded").pcodedmenu({
  MenuTrigger: "click",
  SubMenuTrigger: "click",
});
$("#mobile-collapse,#mobile-collapse1").click(function (b) {
  var a = $(window)[0].innerWidth;
  if (a < 992) {
    $(".pcoded-navbar").toggleClass("mob-open");
    b.stopPropagation();
  }
});
$(window).ready(function () {
  var a = $(window)[0].innerWidth;
  $(".pcoded-navbar").on("click tap", function (b) {
    b.stopPropagation();
  });
  $(".pcoded-main-container,.pcoded-header").on("click", function () {
    if (a < 992) {
      if ($(".pcoded-navbar").hasClass("mob-open") == true) {
        $(".pcoded-navbar").removeClass("mob-open");
        $("#mobile-collapse,#mobile-collapse1").removeClass("on");
      }
    }
  });
});
$(".pcoded-navbar .close").on("click");
$(".pcoded-navbar .pcoded-inner-navbar a").each(function () {
  var b = window.location.href.split(/[?#]/)[0];
  if (!$("body").hasClass("layout-14")) {
    if (this.href == b && $(this).attr("href") != "") {
      $(this).parent("li").addClass("active");
      if (!$(".pcoded-navbar").hasClass("theme-horizontal")) {
        $(this)
          .parent("li")
          .parent()
          .parent(".pcoded-hasmenu")
          .addClass("active")
          .addClass("pcoded-trigger");
        $(this)
          .parent("li")
          .parent()
          .parent(".pcoded-hasmenu")
          .parent()
          .parent(".pcoded-hasmenu")
          .addClass("active")
          .addClass("pcoded-trigger");
      }
      if ($("body").hasClass("layout-7") || $("body").hasClass("layout-6")) {
        $(this)
          .parent("li")
          .parent()
          .parent(".pcoded-hasmenu")
          .addClass("active")
          .addClass("pcoded-trigger");
        $(this)
          .parent("li")
          .parent()
          .parent(".pcoded-hasmenu")
          .parent()
          .parent(".pcoded-hasmenu")
          .addClass("active")
          .addClass("pcoded-trigger");
        $(".theme-horizontal .pcoded-inner-navbar")
          .find("li.pcoded-trigger")
          .removeClass("pcoded-trigger");
      }
      $(this).parent("li").parent().parent(".sidelink").addClass("active");
      $(this)
        .parent("li")
        .parent()
        .parent()
        .parent()
        .parent(".sidelink")
        .addClass("active");
      $(this)
        .parent("li")
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent(".sidelink")
        .addClass("active");
      if ($("body").hasClass("layout-1") || $("body").hasClass("layout-9")) {
        var a = $(".sidelink.active").attr("class");
        a = a.replace("sidelink", "");
        a = a.replace("active", "");
        $(".sidemenu  .nav-link[data-cont=" + a.trim() + "]")
          .parent()
          .addClass("active");
      }
    }
  }
});
$(window).scroll();
$("#more-details").on("click");
