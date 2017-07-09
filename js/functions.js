$('document').ready(function(){

  /*--------------------------------------------------------------------*/
  $("body").niceScroll();



	$(".slider-header #owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 1000,
      paginationSpeed : 1500,
      pagination:false,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
     });


	  $(".list-carousel").owlCarousel({
 
    autoPlay: 6000, //Set AutoPlay to 3 seconds
 	  navigation : true,
 	  slideSpeed : 1000,
 	  pagination:false,
 	  paginationSpeed : 1500,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });



    $('.fancybox').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',

      helpers:  {
          title : {
              type : 'inside'
          },
          overlay : {
              showEarly : false
          }
      },

      beforeShow : function(){
        var caption = $(this.element).data("caption");
        var top_title = $(this.element).data("title");
        var img = $(this.element).find('img');
        var res = "<div class='top-title'>"+top_title+"</div>";

        res += "<div class='bottom-caption'>Поделиться: <div class='ya-share2' data-services='vkontakte,twitter,facebook,gplus'></div></div>"; 

        this.title = res;
      }
    });




    /*-----------------------------mobile menu---------------------*/
    $('.mobile-btn').on('click', function(e){
      e.preventDefault();

      var $this = $(this),
          header_menu = $this.closest('.header-menu');
          menu = header_menu.find('.menu'),
          speed = 600;

          header_menu.toggleClass('active');

          if(header_menu.hasClass('active')){
            menu.slideDown(speed);
          }else{
            menu.slideUp(speed);
          }

    });


    /*--------------------------------------------------------------------*/
    
    function addTitleToForm(){
      var title_product  =  $('.single  .article .title-section').text(); 
      
      console.log(title_product);
      
      $('.wpcf7-form .hidden .text-title .wpcf7-text').val(title_product);
    }
    
    
    addTitleToForm();


    /*----------------------order product popup----------------*/
    $('.order').magnificPopup({
          type: 'inline',
          preloader: false,
          

          fixedContentPos: false,
          fixedBgPos: true,

          overflowY: 'auto',

          closeBtnInside: true,
          preloader: false,
          
          midClick: true,
          removalDelay: 300,
          mainClass: 'my-mfp-zoom-in',
      
      callbacks: {
        open: function() {
            addTitleToForm();
          }
        }
      }); 
    


    /*-----------------------------------news------------------------------*/


      /*------------------------wow amimation-----------*/  
      new WOW().init();


});

$(window).load(function() {

  $(".load_block").delay(400).fadeOut("slow");
  
});