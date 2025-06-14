jQuery('.skin-sliderlg').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 7000,
    pauseOnHover: false,
    cssEase: 'ease',
    arrows: false,
    ltr: false, // set rtl option to false

    responsive: [
        {
            breakpoint: 1400,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 1250,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 599,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,

            }
        }
    ],

});


// fragrances slider
jQuery('.fragrances').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },

        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            }
        },

        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});






// jQuery('.organic-product-slider').slick({
//     slidesToShow: 2,
//     arrows: false,
//     responsive: [
//       {
//         breakpoint: 1200,
//         settings: {
//           slidesToShow: 2,
//         }
//       },
//       {
//         breakpoint: 768,
//         settings: {
//           slidesToShow: 1,
//         }
//       },
//       {
//         breakpoint: 320,
//         settings: {
//           slidesToShow: 1,
//         }
//       }
//     ]
//   });



// home decor slider
$('.home-decor-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    arrows: false,
    dots: false,
    speed: 300,
    centerPadding: '20px',
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

//   $(document).ready(function() {
//     $('.raeesh12').slick({
//       slidesToShow: 6,
//       slidesToScroll: 1,
//       nav:true,
//       prevArrow: '<button class="slide-arrow prev-arrow"></button>',
//       nextArrow: '<button class="slide-arrow next-arrow"></button>'

//     });
//   });


$(function () {
    $("#subcategory-slider").slick({
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<svg class="slide-arrow prev-arrow" width="16" height="29" viewBox="0 0 16 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.2773 27.8846L0.930664 14.5001L14.2773 1.11548" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        nextArrow: '<svg class="slide-arrow next-arrow" width="16" height="29" viewBox="0 0 16 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.72267 27.8846L15.0693 14.5001L1.72267 1.11548" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg',
        infinite: false, // Disable looping
        responsive: [
            {
                breakpoint: 1401,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 1399,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});
$('.rise-up-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    arrows: false,
    dots: false,
    speed: 300,
    centerPadding: '0px',
    infinite: true,
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3
        }
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1
        }
    }
    ]
});
window.onload = function () {
    $('.frontend-top-slider').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        centerMode: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        gap: 0,
    });
};

document.querySelectorAll('.toggle-display-trigger-by-id').forEach(function(el) {
    el.addEventListener('click', function(e) {
        e.preventDefault();
        var target = document.getElementById(el.getAttribute('data-target'));
        if (target) {
            target.style.display = target.style.display === 'none' ? 'block' : 'none';
        }
    });
});
