(function($) {
    'use strict';

    $(document).ready(function() {
        // Add Images Button
        $(document).on('click', '.add-images', function(e) {
            e.preventDefault();

            var button = $(this);
            var container = button.closest('.multiple-images-container');
            var preview = container.find('.images-preview');
            var input = container.find('.multiple-images-input');

            var frame = wp.media({
                title: 'Select Gallery Images',
                button: {
                    text: 'Add to Gallery'
                },
                multiple: true
            });

            frame.on('select', function() {
                var attachments = frame.state().get('selection').toJSON();
                var currentIds = input.val() ? input.val().split(',') : [];

                attachments.forEach(function(attachment) {
                    // Check if image already exists
                    if (currentIds.indexOf(attachment.id.toString()) === -1) {
                        currentIds.push(attachment.id);

                        // Add preview
                        var imageHtml = '<div class="image-preview-wrapper" data-image-id="' + attachment.id + '">' +
                            '<img src="' + attachment.url + '" alt="" />' +
                            '<button type="button" class="remove-image" data-image-id="' + attachment.id + '">×</button>' +
                            '</div>';
                        preview.append(imageHtml);
                    }
                });

                // Update input value
                input.val(currentIds.join(',')).trigger('change');
            });

            frame.open();
        });

        // Remove Image Button
        $(document).on('click', '.remove-image', function(e) {
            e.preventDefault();

            var button = $(this);
            var imageId = button.data('image-id').toString();
            var wrapper = button.closest('.image-preview-wrapper');
            var container = button.closest('.multiple-images-container');
            var input = container.find('.multiple-images-input');

            // Remove from IDs
            var currentIds = input.val() ? input.val().split(',') : [];
            var newIds = currentIds.filter(function(id) {
                return id !== imageId;
            });

            // Update input
            input.val(newIds.join(',')).trigger('change');

            // Remove preview
            wrapper.fadeOut(300, function() {
                $(this).remove();
            });
        });
    });

})(jQuery);
