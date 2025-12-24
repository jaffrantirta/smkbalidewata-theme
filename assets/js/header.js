document.addEventListener("DOMContentLoaded", function () {
  // Mobile menu toggle
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const navMenu = document.querySelector(".main-nav");

  if (hamburgerMenu && navMenu) {
    hamburgerMenu.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      navMenu.classList.toggle("active");

      // Toggle hamburger icon
      const icon = hamburgerMenu.querySelector("i");
      if (navMenu.classList.contains("active")) {
        icon.classList.remove("ti-menu-deep");
        icon.classList.add("ti-x");

        // Force blur when menu is active on mobile
        if (window.innerWidth <= 768) {
          navMenu.classList.add("nav-scrolled");
          navMenu.classList.remove("nav-transparent");
        }
      } else {
        icon.classList.remove("ti-x");
        icon.classList.add("ti-menu-deep");
      }

      // Close all submenus when main menu is toggled
      document.querySelectorAll(".menu-item-has-children").forEach((item) => {
        item.classList.remove("active");
      });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (e) {
      if (!hamburgerMenu.contains(e.target) && !navMenu.contains(e.target)) {
        navMenu.classList.remove("active");
        const icon = hamburgerMenu.querySelector("i");
        icon.classList.remove("ti-x");
        icon.classList.add("ti-menu-deep");

        // Close all submenus
        document.querySelectorAll(".menu-item-has-children").forEach((item) => {
          item.classList.remove("active");
        });
      }
    });
  } else {
    console.error("Hamburger menu or nav menu not found");
  }

  // Setup mobile menu submenu toggle
  function setupMobileMenu() {
    const menuItemsWithChildren = document.querySelectorAll(
      ".menu-item-has-children > a"
    );
    const regularMenuItems = document.querySelectorAll(
      ".nav-menu > li:not(.menu-item-has-children) > a"
    );

    // Remove previous listeners to prevent duplicates
    menuItemsWithChildren.forEach((item) => {
      item.replaceWith(item.cloneNode(true));
    });
    regularMenuItems.forEach((item) => {
      item.replaceWith(item.cloneNode(true));
    });

    // Re-query after cloning
    const updatedMenuItemsWithChildren = document.querySelectorAll(
      ".menu-item-has-children > a"
    );
    const updatedRegularMenuItems = document.querySelectorAll(
      ".nav-menu > li:not(.menu-item-has-children) > a"
    );

    // For items with submenus: separate handling for link click vs dropdown toggle on mobile
    updatedMenuItemsWithChildren.forEach((anchor) => {
      // Handle chevron icon clicks for dropdown toggle
      const chevronIcon = anchor.querySelector('.ti-chevron-down');
      if (chevronIcon) {
        chevronIcon.addEventListener("click", function (e) {
          if (window.innerWidth <= 768) {
            e.preventDefault();
            e.stopPropagation();

            const parentLi = anchor.parentElement;
            parentLi.classList.toggle("active");

            // Close other open submenus at same level
            const siblings = Array.from(parentLi.parentElement.children);
            siblings.forEach((sibling) => {
              if (
                sibling !== parentLi &&
                sibling.classList.contains("menu-item-has-children")
              ) {
                sibling.classList.remove("active");
              }
            });
          }
        });
      }

      // Handle parent link clicks - allow navigation on mobile
      anchor.addEventListener("click", function (e) {
        if (window.innerWidth <= 768) {
          // Check if click target is the chevron icon
          if (e.target.classList.contains('ti-chevron-down')) {
            return; // Let chevron handler deal with it
          }
          // Allow normal navigation for parent links
          // Don't prevent default - let the link work normally
        }
      });
    });

    // For regular menu items without submenu: clicking closes the whole mobile menu
    updatedRegularMenuItems.forEach((anchor) => {
      anchor.addEventListener("click", function () {
        if (window.innerWidth <= 768) {
          navMenu.classList.remove("active");
          const icon = hamburgerMenu.querySelector("i");
          icon.classList.remove("ti-x");
          icon.classList.add("ti-menu-deep");

          // Close all submenus
          document
            
            
              .querySelectorAll(".menu-item-has-children")
              .forEach((item) => {
              item.classList.remove("active");
            });
        }
      });
    });
  }

  // Initialize on load
  setupMobileMenu();

  // Re-initialize on resize to reset event listeners properly
  window.addEventListener("resize", function () {
    setupMobileMenu();
  });

  // Scroll handling for header and nav blur effects
  const headers = document.querySelectorAll("header");
  const navMenus = document.querySelectorAll(".main-nav");
  let ticking = false;

  function handleScroll() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    headers.forEach((header) => {
      if (scrollTop > 50) {
        header.classList.remove("header-transparent");
        header.classList.add("header-scrolled");
      } else {
        header.classList.remove("header-scrolled");
        header.classList.add("header-transparent");
      }
    });

    navMenus.forEach((nav) => {
      if (window.innerWidth <= 768) {
        if (nav.classList.contains("active")) {
          nav.classList.add("nav-scrolled");
          nav.classList.remove("nav-transparent");
        } else {
          if (scrollTop > 50) {
            nav.classList.add("nav-scrolled");
            nav.classList.remove("nav-transparent");
          } else {
            nav.classList.remove("nav-scrolled");
            nav.classList.add("nav-transparent");
          }
        }
      } else {
        if (scrollTop > 50 || nav.classList.contains("active")) {
          nav.classList.remove("nav-transparent");
          nav.classList.add("nav-scrolled");
        } else {
          nav.classList.remove("nav-scrolled");
          nav.classList.add("nav-transparent");
        }
      }
    });

    ticking = false;
  }

  window.addEventListener("scroll", function () {
    if (!ticking) {
      requestAnimationFrame(handleScroll);
      ticking = true;
    }
  });

  // Initial call
  handleScroll();
});
