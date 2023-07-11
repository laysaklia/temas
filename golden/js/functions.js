jQuery(function($){
   /* 
    * Toggles search on and off
    */
   $('.search-toggle').on('click',function(event){
      var that = $(this),
      wrapper = $('.search-box-wrapper');
      
      that.toggleClass('active');
      wrapper.toggleClass('hide');
      
      if(that.is('.active)') || $('.search-toggle .screen-reader-text')[0] === event.target) {
          wrapper.find('.search-field').focus();
      }
   });
});