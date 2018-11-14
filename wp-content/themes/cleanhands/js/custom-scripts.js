/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($){
  $(document).ready(function() {

    // Adding click statement to card and post
    $('.image-callout, .fl-post-grid-post').wrap(function() {
      return '<a href="'+ $(this).find('a').prop('href') + '"></a>';
    });

  }); // close document ready
})(jQuery);
