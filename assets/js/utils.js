      $(window).scroll(function(){
          var sticky = $('.header'),
              scroll = $(window).scrollTop();

          if (scroll >= 2) sticky.addClass('fixed');
          else sticky.removeClass('fixed');
        });

        $(".popular-packages").slick({
          autoplaySpeed: 3000,
          autoplay:false,
          arrows: true,
          dots: false, 
          slidesToShow: 4,
          slidesToScroll: 1,
            infinite: true,
            responsive: [
             {
                breakpoint: 1368 ,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]         
      });