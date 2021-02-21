var glfResizeTimeout;

function glf_ToggleMenuOrderingButtons(shouldShow) {
    if (shouldShow) {
        jQuery('#bs4navbar .navbar-nav').hide();
        jQuery('#glf-navigation-order-buttons').show();
    } else {
        jQuery('#bs4navbar .navbar-nav').show();
        jQuery('#glf-navigation-order-buttons').hide();
    }
}

function glf_ToggleFloatingOrderingButtons(shouldShow) {
    if (shouldShow) {
        jQuery('#glf-footer-navigation-order-buttons').removeClass('d-none');
    } else {
        jQuery('#glf-footer-navigation-order-buttons').addClass('d-none');
    }
}

function glf_ResizeCheck() {
    if (jQuery(window).width() > 768) {
        if (window.scrollY > 20) {
            glf_ToggleMenuOrderingButtons(true);
        } else {
            glf_ToggleMenuOrderingButtons(false);
        }
    } else {
        glf_ToggleMenuOrderingButtons(false);
    }

    if (window.scrollY > glf_GetJumbotronButtonsPosition()) {
        glf_ToggleFloatingOrderingButtons(true);
    } else {
        glf_ToggleFloatingOrderingButtons(false);
    }
}

jQuery(window).on('scroll', function () {
    if (jQuery(window).width() > 768) {
        if (window.scrollY > 20) {
            glf_ToggleMenuOrderingButtons(true);
        } else {
            glf_ToggleMenuOrderingButtons(false);
        }
    }

    if (window.scrollY > glf_GetJumbotronButtonsPosition()) {
        glf_ToggleFloatingOrderingButtons(true);
    } else {
        glf_ToggleFloatingOrderingButtons(false);
    }
});
jQuery(window).on('resize', function () {
    clearTimeout(glfResizeTimeout);

    glfResizeTimeout = setTimeout('glf_ResizeCheck()', 250);
});

jQuery(document).ready(function () {
    glf_ResizeCheck();
});

function glf_GetJumbotronButtonsPosition() {
    if (jQuery('.jumbotron-cta-buttons').length) {
        return jQuery('.jumbotron-cta-buttons').offset().top + jQuery('.jumbotron-cta-buttons').height();
    } else {
        return 250;
    }
}