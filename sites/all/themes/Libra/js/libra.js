
(function ($) {
    Drupal.behaviors.Libra = {
        attach: function(context, settings) {
            $(window).ready(function() {
            $('#c', context).load('http://www.bryanbraun.com/2013/08/06/drupal-tutorials-exposed-filters-with-views #node-307');
        });
        }

    };
})(jQuery);