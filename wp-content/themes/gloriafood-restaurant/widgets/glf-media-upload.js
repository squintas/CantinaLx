function glfWidgetHookAboutUsMediaButtons() {
    jQuery('input.upload_image_button').each(function () {
        var $elem = jQuery(this);

        if ($elem.data('glf-on-click')) {
            return true;
        }

        $elem.data('glf-on-click', true);

        $elem.click(function (e) {

            var image_source = jQuery(this).data('image-id-field');

            e.preventDefault();
            var image_frame;
            if (image_frame) {
                image_frame.open();
            }
            // Define image_frame as wp.media object
            image_frame = wp.media({
                title: 'Select Media',
                multiple: false,
                library: {
                    type: 'image',
                }
            });

            image_frame.on('close', function () {
                var selection = image_frame.state().get('selection');

                if (selection.first()) {
                    var image = selection.first().toJSON();

                    var gallery_ids = new Array();
                    var my_index = 0;
                    selection.each(function (attachment) {
                        gallery_ids[my_index] = attachment['id'];
                        my_index++;
                    });

                    var ids = gallery_ids.join(",");
                    if (jQuery('#' + image_source).val() != ids) {
                        jQuery('#' + image_source).val(ids);
                        jQuery('#' + image_source).trigger('change');
                        jQuery('#' + image_source + '-img').attr('src', image.sizes.thumbnail.url);
                    }
                }
            });

            image_frame.on('open', function () {
                var selection = image_frame.state().get('selection');
                ids = jQuery('#' + image_source).val().split(',');
                ids.forEach(function (id) {
                    attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add(attachment ? [attachment] : []);
                });

            });

            image_frame.open();
        });
    });
}

jQuery(document).ready(function ($) {
    glfWidgetHookAboutUsMediaButtons();

    jQuery('select.glf_about_us_columns_selector').on('change', function () {
        if (jQuery(this).val() == 2) {
            jQuery('#' + jQuery(this).data('toggle-column')).show();
        } else {
            jQuery('#' + jQuery(this).data('toggle-column')).hide();
        }
    });

    jQuery('select.glf_about_us_columns_selector').each(function () {
        if (jQuery(this).val() == 1) {
            jQuery('#' + jQuery(this).data('toggle-column')).hide();
        }
    });

    jQuery(document).on('widget-added', function () {
        glfWidgetHookAboutUsMediaButtons();

        jQuery('select.glf_about_us_columns_selector').on('change', function () {
            if (jQuery(this).val() == 2) {
                jQuery('#' + jQuery(this).data('toggle-column')).show();
            } else {
                jQuery('#' + jQuery(this).data('toggle-column')).hide();
            }
        });

        jQuery('select.glf_about_us_columns_selector').each(function () {
            if (jQuery(this).val() == 1) {
                jQuery('#' + jQuery(this).data('toggle-column')).hide();
            }
        });
    });
});

jQuery(document).ajaxSuccess(function (e, xhr, settings) {
    var widget_id_base = 'glf-about-us';

    if (settings && settings.data) {
        if (settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
            glfWidgetHookAboutUsMediaButtons();

            jQuery('select.glf_about_us_columns_selector').each(function () {
                if (jQuery(this).val() == 1) {
                    jQuery('#' + jQuery(this).data('toggle-column')).hide();
                }
            });

            jQuery('select.glf_about_us_columns_selector').on('change', function () {
                if (jQuery(this).val() == 2) {
                    jQuery('#' + jQuery(this).data('toggle-column')).show();
                } else {
                    jQuery('#' + jQuery(this).data('toggle-column')).hide();
                }
            });
        }
    }
});
