(function($) {

/**
 * jQuery debugging helper.
 *
 * Invented for Dreditor.
 *
 * @usage
 *   $.debug(var [, name]);
 *   $variable.debug( [name] );
 */
jQuery.extend({
  debug: function () {
    // Setup debug storage in global window. We want to look into it.
    window.debug = window.debug || [];

    args = jQuery.makeArray(arguments);
    // Determine data source; this is an object for $variable.debug().
    // Also determine the identifier to store data with.
    if (typeof this == 'object') {
      var name = (args.length ? args[0] : window.debug.length);
      var data = this;
    }
    else {
      var name = (args.length > 1 ? args.pop() : window.debug.length);
      var data = args[0];
    }
    // Store data.
    window.debug[name] = data;
    // Dump data into Firebug console.
    if (typeof console != 'undefined') {
      console.log(name, data);
    }
    return this;
  }
});
// @todo Is this the right way?
jQuery.fn.debug = jQuery.debug;

})(jQuery);
;
(function ($) {

  Drupal.behaviors.codefilter = {
    attach:function (context) {
      // Provide expanding text boxes when code blocks are too long.
      $("div.codeblock.nowrap-expand", context).each(function () {
          var contents_width = $(this).contents().width();
          var width = $(this).width();
          if (contents_width > width) {
            $(this).hover(function () {
              // Add a small right margin to width.
              $(this).animate({ width:(contents_width + 10) + "px"}, 250, function () {
                $(this).css('overflow-x', 'visible');
              });
            },
            function () {
              $(this).css('overflow-x', 'hidden').animate({ width:width + "px" }, 250);
            });
          }
        }
      );
    }
  }

})(jQuery);
;
