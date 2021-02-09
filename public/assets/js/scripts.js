(function (window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */


  $(".ek-tab .ek-tab-item").click(function () {
    $(".ek-tab .ek-tab-item").removeClass('active')
    $(this).addClass('active')

    var target = $(this).attr('target')
    $('.ek-contents .ek-content').removeClass('active')
    $('.ek-contents ' + target).addClass('active')
  })

})(window);
