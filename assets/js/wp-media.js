jQuery(document).ready(function ($) {
    // Handle image upload
    $(document).on('click', '.term-image-upload', function (e) {
        e.preventDefault();

        var imageUploader = wp.media({
            title: taxonomy_image_upload.title,
            button: { text: taxonomy_image_upload.button },
            multiple: false
        });

        // Open the uploader dialog
        imageUploader.open();

        // When an image is selected, handle the selection
        imageUploader.on('select', function () {
            var image = imageUploader.state().get('selection').first();
            var imageUrl = image.toJSON().url;

            $('.term_thumbnail').val(imageUrl);

            // Display image preview
            $('.term-image-preview').html('<img src="' + imageUrl + '" style="max-width: 300px;max-height: 300px;">');
            $('.term-image-upload').hide();
            $('.term-image-remove').show();
        });
    });

    $('body').on('click', '.term-image-remove', function () {
        $(this).hide();
        $('.term-image-upload').show();
        $('.term-image-preview').html('')
        $('.term_thumbnail').val('');
    });
});