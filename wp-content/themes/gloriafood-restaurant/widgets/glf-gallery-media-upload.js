function glfWidgetHookGalleryButtons() {
    jQuery('input.upload_gallery_button').each(function () {
        var $elem = jQuery(this);

        if ($elem.data('glf-on-click')) {
            return true;
        }

        $elem.data('glf-on-click', true);

        $elem.click(function (e) {

            var image_source = jQuery(this).data('image-id-field');

            e.preventDefault();
            var gallery_frame;
            if (gallery_frame) {
                gallery_frame.open();
            }
            // Define gallery_frame as wp.media object
            gallery_frame = wp.media({
                title: 'Select Media',
                multiple: 'add',
                library: {
                    type: 'image',
                }
            });

            gallery_frame.on('close', function () {
                var selection = gallery_frame.state().get('selection');
                var attachments = new Array();
                var attachmentsIds = new Array();
                selection.map(function (attachment) {
                    attachment = attachment.toJSON();

                    if (attachment.id && attachment.sizes) {
                        attachments.push(attachment.sizes.thumbnail.url);
                        attachmentsIds.push(attachment.id);
                    }
                })

                attachmentsIds = attachmentsIds.join(',');
                if (jQuery('#' + image_source).val() !== attachmentsIds) {
                    jQuery('#' + image_source).val(attachmentsIds);
                    jQuery('#' + image_source + '-preview').html('');
                    for (let attach of attachments) {
                        jQuery('#' + image_source + '-preview').append("<img src='" + attach + "' style='width:32%;margin-left:1%;' />");
                    }
                    jQuery('#' + image_source).trigger('change');
                }
            });

            gallery_frame.on('open', function () {
                var selection = gallery_frame.state().get('selection');
                ids = jQuery('#' + image_source).val().split(',');

                if (ids) {
                    ids.forEach(function (id) {
                        attachment = wp.media.attachment(id);
                        attachment.fetch();
                        selection.add(attachment ? [attachment] : []);
                    });
                }
            });

            gallery_frame.open();
        });
    });
}

jQuery(document).ready(function () {
    glfWidgetHookGalleryButtons();

    jQuery(document).on('widget-added', function () {
        glfWidgetHookGalleryButtons();
    });
});

jQuery(document).ajaxSuccess(function (e, xhr, settings) {
    var widget_id_base = 'glf-gallery';

    if (settings && settings.data) {
        if (settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
            glfWidgetHookGalleryButtons();
        }
    }
});
