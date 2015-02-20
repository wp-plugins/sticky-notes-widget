jQuery(document).ready(function($) {
  $(".snw-color-picker").wpColorPicker();  
  $(document).ajaxSuccess(function(e, xhr, settings) {
    $(".snw-color-picker").wpColorPicker();
  });
});