
(function ($) {
  Drupal.behaviors.libra = {
    attach: function (context, settings) {
      $("p", context).click(function(){
                     $(this).hide();
           });
    }
  };
})(jQuery);

;
