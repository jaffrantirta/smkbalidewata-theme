// Import Swiper core
import { Swiper } from "swiper";

// Import Swiper modules
import { Navigation, Pagination, Autoplay, EffectFade } from "swiper/modules";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/autoplay";
import "swiper/css/effect-fade";

// Import PhotoSwipe
import PhotoSwipeLightbox from "photoswipe/lightbox";
import PhotoSwipe from "photoswipe";
import "photoswipe/style.css";

// Main app class
class ThemeApp {
  constructor() {
    this.initSwipers();
    this.initPhotoSwipe();
  }

  initSwipers() {
    const gallerySwiper = document.querySelector(".gallerySwiper");

    if (gallerySwiper) {
      const swiperInstance = new Swiper(".gallerySwiper", {
        // Install modules
        modules: [Navigation, Pagination, Autoplay, EffectFade],

        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".gallerySwiper .swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".gallerySwiper .swiper-button-next",
          prevEl: ".gallerySwiper .swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 1.2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    }

    const tourSwiper = document.querySelector(".tourSwiper");
    if (tourSwiper) {
      const swiperInstance = new Swiper(".tourSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        navigation: {
          nextEl: ".tourSwiper .swiper-button-next",
          prevEl: ".tourSwiper .swiper-button-prev",
        },

        pagination: {
          el: ".tourSwiper .swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 25,
          },
        },
      });
    }

    const carSwiper = document.querySelector(".carSwiper");
    if (carSwiper) {
      const swiperInstance = new Swiper(".carSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        pagination: {
          el: ".carSwiper .swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 25,
          },
        },
      });
    }

    const boatSwiper = document.querySelector(".boatSwiper");
    if (boatSwiper) {
      const swiperInstance = new Swiper(".boatSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        navigation: {
          nextEl: ".boatSwiper .swiper-button-next",
          prevEl: ".boatSwiper .swiper-button-prev",
        },

        pagination: {
          el: ".boatSwiper .swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
        },
      });
    }
    const serviceSwiper = document.querySelector(".serviceSwiper");
    if (serviceSwiper) {
      const swiperInstance = new Swiper(".serviceSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        pagination: {
          el: ".serviceSwiper .swiper-pagination",
          clickable: true,
        },

        navigation: {
          nextEl: ".serviceSwiper .swiper-button-next",
          prevEl: ".serviceSwiper .swiper-button-prev",
        },

        breakpoints: {
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    }


    const accommodationSwiper = document.querySelector(".accommodationSwiper");
    if (accommodationSwiper) {
      const swiperInstance = new Swiper(".accommodationSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        pagination: {
          el: ".accommodationSwiper .swiper-pagination",
          clickable: true,
        },

        navigation: {
          nextEl: ".accommodationSwiper .swiper-button-next",
          prevEl: ".accommodationSwiper .swiper-button-prev",
        },

        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
        },
      });
    }

    const destinationSwiper = document.querySelector(".destinationSwiper");
    if (destinationSwiper) {
      const swiperInstance = new Swiper(".destinationSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        navigation: {
          nextEl: ".destinationSwiper .swiper-button-next",
          prevEl: ".destinationSwiper .swiper-button-prev",
        },

        pagination: {
          el: ".destinationSwiper .swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
        },
      });
    }

    const carRentKomodoSwiper = document.querySelector(".carRentKomodoSwiper");
    if (carRentKomodoSwiper) {
      const swiperInstance = new Swiper(".carRentKomodoSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.3,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },

        navigation: {
          nextEl: ".carRentKomodoSwiper .swiper-button-next",
          prevEl: ".carRentKomodoSwiper .swiper-button-prev",
        },

        pagination: {
          el: ".carRentKomodoSwiper .swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 25,
          },
        },
      });
    }

    const whyChooseSwiper = document.querySelector(".whyChooseSwiper");
    if (whyChooseSwiper) {
      const swiperInstance = new Swiper(".whyChooseSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.2,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },

        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 25,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
        },
      });
    }

    const luxurytourSwiper = document.querySelector(".luxurytourSwiper");
    if (luxurytourSwiper) {
      const swiperInstance = new Swiper(".luxurytourSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1.2,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },

        breakpoints: {
          768: {
            slidesPerView: 3,
            spaceBetween: 25,
          },
        },
      });
    }

    const testimonialSwiper = document.querySelector(".testimonialSwiper");
    if (testimonialSwiper) {
      const swiperInstance = new Swiper(".testimonialSwiper", {
        modules: [Navigation, Pagination, Autoplay],

        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: false,
        loop: true,

        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },

        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: 25,
          },
        },
      });
    }
  }

  initPhotoSwipe() {
    // Initialize PhotoSwipe for gallery images
    const lightbox = new PhotoSwipeLightbox({
      gallery: ".gallerySwiper",
      children: ".swiper-slide",

      // PhotoSwipe options
      pswpModule: PhotoSwipe,

      // UI options
      zoom: true,
      close: true,
      counter: true,
      arrowPrev: true,
      arrowNext: true,

      // Spacing around image
      spacing: 0.1,

      // Background opacity
      bgOpacity: 0.9,

      // Enable/disable zoom animation
      showAnimationDuration: 333,
      hideAnimationDuration: 333,
    });

    // Handle image source extraction
    lightbox.addFilter("itemData", (itemData, index) => {
      const slideElement = itemData.element;
      const imgElement = slideElement.querySelector("img");

      if (imgElement) {
        // Get image source and dimensions
        const src = imgElement.src;
        const alt = imgElement.alt || "";

        // Try to get actual image dimensions, fallback to reasonable defaults
        const img = new Image();
        img.src = src;

        return {
          src: src,
          width: img.naturalWidth || 1200,
          height: img.naturalHeight || 800,
          alt: alt,
        };
      }

      return itemData;
    });

    // Custom click handler for better control
    lightbox.addFilter("clickedIndex", (clickedIndex, e) => {
      // Find the clicked slide index
      const clickedSlide = e.target.closest(".swiper-slide");
      if (clickedSlide) {
        const slides =
          clickedSlide.parentElement.querySelectorAll(".swiper-slide");
        return Array.from(slides).indexOf(clickedSlide);
      }
      return clickedIndex;
    });

    // Initialize the lightbox
    lightbox.init();

    // Add click event listeners to images for better UX
    document.addEventListener("click", (e) => {
      const clickedImg = e.target.closest(".gallerySwiper img");
      if (clickedImg) {
        e.preventDefault();

        // Find the slide index
        const slide = clickedImg.closest(".swiper-slide");
        const gallery = slide.closest(".gallerySwiper");
        const slides = gallery.querySelectorAll(".swiper-slide");
        const index = Array.from(slides).indexOf(slide);

        // Open PhotoSwipe at the clicked image
        lightbox.loadAndOpen(index);
      }
    });
  }
}

// Initialize app
new ThemeApp();
