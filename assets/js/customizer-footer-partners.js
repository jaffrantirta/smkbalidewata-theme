(function($) {
    'use strict';

    var partnerIndex = 0;

    // Update hidden input with all partners data
    function updatePartnersInput(container) {
        var partners = [];
        container.find('.partner-item').each(function() {
            var item = $(this);
            var imageId = item.find('.partner-image-id').val();
            var url = item.find('.partner-url').val();
            var title = item.find('.partner-title').val();

            if (imageId) {
                partners.push({
                    image: imageId,
                    url: url,
                    title: title
                });
            }
        });

        var json = JSON.stringify(partners);
        container.find('.footer-partners-input').val(json).trigger('change');
    }

    // Add Partner Button
    $(document).on('click', '.add-partner', function(e) {
        e.preventDefault();

        var button = $(this);
        var container = button.closest('.footer-partners-container');
        var list = container.find('.partners-list');
        var template = $('#partner-item-template').html();

        partnerIndex = list.find('.partner-item').length;
        var newItem = template.replace(/\{\{INDEX\}\}/g, partnerIndex);

        list.append(newItem);
    });

    // Select Partner Image
    $(document).on('click', '.select-partner-image', function(e) {
        e.preventDefault();

        var button = $(this);
        var partnerItem = button.closest('.partner-item');
        var container = button.closest('.footer-partners-container');

        var frame = wp.media({
            title: 'Select Partner Logo',
            button: {
                text: 'Select Logo'
            },
            multiple: false
        });

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();

            // Update hidden input
            partnerItem.find('.partner-image-id').val(attachment.id);

            // Update preview
            partnerItem.find('.partner-image-preview').html(
                '<img src="' + attachment.url + '" alt="">'
            );

            // Update button text
            button.text('Change Image');

            // Update main input
            updatePartnersInput(container);
        });

        frame.open();
    });

    // Remove Partner
    $(document).on('click', '.remove-partner', function(e) {
        e.preventDefault();

        var button = $(this);
        var partnerItem = button.closest('.partner-item');
        var container = button.closest('.footer-partners-container');

        partnerItem.fadeOut(300, function() {
            $(this).remove();
            updatePartnersInput(container);
        });
    });

    // Update on field change
    $(document).on('input', '.partner-title, .partner-url', function() {
        var container = $(this).closest('.footer-partners-container');
        updatePartnersInput(container);
    });

})(jQuery);
