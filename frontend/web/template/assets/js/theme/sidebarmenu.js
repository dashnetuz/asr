// sidebarmenu.js (Yii2 Advanced loyihasi uchun tozalangan va optimallashtirilgan versiya)

document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  var layoutType = document.documentElement.getAttribute("data-layout");

  if (layoutType === "vertical") {
    var isSidebar = document.getElementsByClassName("side-mini-panel");

    if (isSidebar.length > 0) {
      // Find matching sidebar link
// Find matching sidebar link
      function findMatchingElement(url) {
        var anchors = document.querySelectorAll("#sidebarnav a");
        for (var i = 0; i < anchors.length; i++) {
          if (anchors[i].href === url) {
            return anchors[i];
          }
        }
        return null;
      }

      var currentUrl = window.location.href;
      var elements = findMatchingElement(currentUrl);

// Agar topilsa, localStorage'ga saqlaymiz
      if (elements) {
        localStorage.setItem("lastSidebarUrl", currentUrl);
      } else {
        // Aks holda, oldingi eslab qolingan URL'ni ishlatamiz
        var savedUrl = localStorage.getItem("lastSidebarUrl");
        if (savedUrl) {
          elements = findMatchingElement(savedUrl);
        }
      }

      if (elements) {
        elements.classList.add("active");

        var closestNav = elements.closest("nav[class^=sidebar-nav]");
        var menuid = (closestNav && closestNav.id) || "menu-right-mini-1";
        var menu = menuid.split("-").pop();

        var menuRight = document.getElementById("menu-right-mini-" + menu);
        if (menuRight) {
          menuRight.classList.add("d-block");
        }

        var miniMenu = document.getElementById("mini-" + menu);
        if (miniMenu) {
          miniMenu.classList.add("selected");
        }
      }

      // Handle click on sidebar links
      document.querySelectorAll("#sidebarnav a").forEach(function (link) {
        link.addEventListener("click", function (e) {
          const isActive = this.classList.contains("active");
          const parentUl = this.closest("ul");

          if (!isActive) {
            parentUl.querySelectorAll("ul").forEach(function (submenu) {
              submenu.classList.remove("in");
            });
            parentUl.querySelectorAll("a").forEach(function (navLink) {
              navLink.classList.remove("active");
            });

            const submenu = this.nextElementSibling;
            if (submenu) {
              submenu.classList.add("in");
            }
            this.classList.add("active");
          } else {
            this.classList.remove("active");
            parentUl.classList.remove("active");
            const submenu = this.nextElementSibling;
            if (submenu) {
              submenu.classList.remove("in");
            }
          }
        });
      });

      // Disable default action on has-arrow links
      document.querySelectorAll("#sidebarnav > li > a.has-arrow").forEach(function (link) {
        link.addEventListener("click", function (e) {
          e.preventDefault();
        });
      });

      // Expand parent menus if active
      document.querySelectorAll("ul#sidebarnav ul li a.active").forEach(function (link) {
        const parentUl = link.closest("ul");
        if (parentUl) {
          parentUl.classList.add("in");
          if (parentUl.parentElement) {
            parentUl.parentElement.classList.add("selected");
          }
        }
      });

      // Mini navigation click handler
      document.querySelectorAll(".mini-nav .mini-nav-item").forEach(function (item) {
        item.addEventListener("click", function () {
          var id = this.id;
          document.querySelectorAll(".mini-nav .mini-nav-item").forEach(function (navItem) {
            navItem.classList.remove("selected");
          });
          this.classList.add("selected");

          document.querySelectorAll(".sidebarmenu nav").forEach(function (nav) {
            nav.classList.remove("d-block");
          });

          var targetMenu = document.getElementById("menu-right-" + id);
          if (targetMenu) {
            targetMenu.classList.add("d-block");
          }

          document.body.setAttribute("data-sidebartype", "full");
        });
      });
    }
  }

  if (layoutType === "horizontal") {
    function findMatchingElementHorizontal() {
      var currentUrl = window.location.href;
      var anchors = document.querySelectorAll("#sidebarnavh ul#sidebarnav a");
      for (var i = 0; i < anchors.length; i++) {
        if (anchors[i].href === currentUrl) {
          return anchors[i];
        }
      }
      return null;
    }

    var elements = findMatchingElementHorizontal();
    if (elements) {
      elements.classList.add("active");
    }

    document.querySelectorAll("#sidebarnavh ul#sidebarnav a.active").forEach(function (link) {
      const parentLi = link.closest("li");
      if (parentLi) {
        parentLi.classList.add("selected");
      }
      const parentUl = link.closest("ul");
      if (parentUl) {
        parentUl.parentElement.classList.add("selected");
      }
    });
  }
});
