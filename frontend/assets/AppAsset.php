<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        '/iqac/css/bootstrap.min.css',
//        '/iqac/css/flatpickr.min.css',
//        '/iqac/css/style.css',
//        '/iqac/css/slick-theme.css',
//        '/iqac/css/slick.css',

        'unieducation/wp-content/plugins/header-footer-elementor/inc/widgets-css/frontendb5cf.css?ver=1.6.45',
        'unieducation/wp-content/plugins/contact-form-7/includes/css/stylese2db.css?ver=5.9.8',
        'unieducation/wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementorb5cf.css?ver=1.6.45',
        'unieducation/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min0fd8.css?ver=5.31.0',
        'unieducation/wp-content/plugins/elementor/assets/css/frontend.minb403.css?ver=3.25.3',
        'unieducation/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5',
        'unieducation/wp-content/plugins/elementor/assets/css/conditionals/e-swiper.minb403.css?ver=3.25.3',
        'unieducation/wp-content/uploads/elementor/css/post-940ba.css?ver=1730534240',
        'unieducation/wp-content/uploads/elementor/css/post-2540ba.css?ver=1730534240',
        'unieducation/wp-content/uploads/elementor/css/post-28fd9e.css?ver=1730545413',
        'unieducation/wp-content/uploads/elementor/css/post-35240ba.css?ver=1730534240',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap',
        'unieducation/wp-content/themes/gixus/assets/css/bootstrap.min.css',
        'unieducation/wp-content/themes/gixus/assets/css/font-awesome.min.css',
        'unieducation/wp-content/themes/gixus/assets/css/magnific-popup.css',
        'unieducation/wp-content/themes/gixus/assets/css/swiper-bundle.min.css',
        'unieducation/wp-content/themes/gixus/assets/css/animate.min.css',
        'unieducation/wp-content/themes/gixus/assets/css/validnavs.css',
        'unieducation/wp-content/themes/gixus/assets/css/helper.css',
        'unieducation/wp-content/themes/gixus/assets/css/unit-test.css',
        'unieducation/wp-content/themes/gixus/assets/css/style.css',
        'unieducation/wp-content/plugins/elementor/assets/css/widget-icon-list.min44b4.css?ver=3.24.3',
        'unieducation/wp-content/plugins/elementor/assets/css/widget-social-icons.min2401.css?ver=3.24.0',
        'unieducation/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands52d5.css?ver=5.15.3',
        'unieducation/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome52d5.css?ver=5.15.3',
        'unieducation/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid52d5.css?ver=5.15.3',
        'https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.6.2',
        'unieducation/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css?ver=5.15.3',
        'unieducation/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css?ver=5.15.3',
        'https://wpriverthemes.com/gixus/wp-content/uploads/2024/10/cropped-logo-270x270.png',
        'unieducation/wp-content/uploads/2024/10/cropped-logo-180x180.png',
        'unieducation/wp-content/uploads/2024/10/cropped-logo-192x192.png',
        'unieducation/wp-content/uploads/2024/10/cropped-logo-32x32.png',

    ];
    public $js = [
//        '/iqac/js/popper.min.js',
//        '/iqac/js/bootstrap.min.js',
//        '/iqac/js/slick.min.js',
//        '/iqac/js/slick-animation.min.js',
//        '/iqac/js/jquery.fancybox.js',
//        '/iqac/js/wow.js',
//        '/iqac/js/appear.js',
//        '/iqac/js/mixitup.js',
//        '/iqac/js/flatpickr.js',
//        '/iqac/js/swiper.min.js',
//        '/iqac/js/gsap.min.js',
//        '/iqac/js/ScrollTrigger.min.js',
//        '/iqac/js/SplitText.min.js',
//        '/iqac/js/nice-select.min.js',
//        '/iqac/js/knob.js',
//        '/iqac/js/parallax.js',
//        '/iqac/js/vanilla-tilt.js',
//        '/iqac/js/splitting.js',
//        '/iqac/js/splitType.js',
//        '/iqac/js/script-gsap.js',
//        '/iqac/js/script.js',

        'unieducation/wp-includes/js/jquery/jquery.minf43b.js?ver=3.7.1',
        'unieducation/wp-includes/js/jquery/jquery-migrate.min5589.js?ver=3.4.1',
        'unieducation/wp-includes/js/dist/hooks.min2757.js?ver=2810c76e705dd1a53b18',
        'unieducation/wp-includes/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6',
        'unieducation/wp-content/plugins/contact-form-7/includes/swv/js/indexe2db.js?ver=5.9.8',
        'unieducation/wp-content/plugins/contact-form-7/includes/js/indexe2db.js?ver=5.9.8',
        'unieducation/wp-content/themes/gixus/assets/js/bootstrap.bundle.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/jquery.appear.js',
        'unieducation/wp-content/themes/gixus/assets/js/jquery.easing.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/swiper-bundle.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/progress-bar.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/isotope.pkgd.min.js',
        'unieducation/wp-includes/js/imagesloaded.minbb93.js?ver=5.0.0',
        'unieducation/wp-content/themes/gixus/assets/js/magnific-popup.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/count-to.js',
        'unieducation/wp-content/themes/gixus/assets/js/jquery.nice-select.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/circle-progress.js',
        'unieducation/wp-content/themes/gixus/assets/js/wow.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/YTPlayer.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/validnavs.js',
        'unieducation/wp-content/themes/gixus/assets/js/jquery.lettering.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/jquery.circleType.js',
        'unieducation/wp-content/themes/gixus/assets/js/gsap.js',
        'unieducation/wp-content/themes/gixus/assets/js/ScrollTrigger.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/SplitText.min.js',
        'unieducation/wp-content/themes/gixus/assets/js/main.js',
        'unieducation/wp-content/plugins/elementor/assets/js/webpack.runtime.minb403.js?ver=3.25.3',
        'unieducation/wp-content/plugins/elementor/assets/js/frontend-modules.minb403.js?ver=3.25.3',
        'unieducation/wp-includes/js/jquery/ui/core.minb37e.js?ver=1.13.3',
        'unieducation/wp-content/plugins/elementor/assets/js/frontend.minb403.js?ver=3.25.3',


    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
