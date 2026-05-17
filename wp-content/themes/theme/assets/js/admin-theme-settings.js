(function ($) {
  $(function () {
    var frame;
    var $logoId = $('.js-theme-logo-id');
    var $preview = $('.js-theme-logo-preview');
    var $remove = $('.js-theme-logo-remove');

    $('.js-theme-logo-select').on('click', function (event) {
      event.preventDefault();

      if (frame) {
        frame.open();
        return;
      }

      frame = wp.media({
        title: themeSettingsMedia.frameTitle,
        button: {
          text: themeSettingsMedia.buttonText
        },
        multiple: false,
        library: {
          type: 'image'
        }
      });

      frame.on('select', function () {
        var attachment = frame.state().get('selection').first().toJSON();
        var previewUrl = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;

        $logoId.val(attachment.id);
        $preview.html(
          $('<img>', {
            src: previewUrl,
            alt: ''
          }).css({
            display: 'block',
            maxWidth: '240px',
            height: 'auto',
            padding: '12px',
            background: '#fff',
            border: '1px solid #c3c4c7'
          })
        );
        $remove.show();
      });

      frame.open();
    });

    $remove.on('click', function (event) {
      event.preventDefault();
      $logoId.val('');
      $preview.text(themeSettingsMedia.placeholder);
      $remove.hide();
    });
  });
})(jQuery);
