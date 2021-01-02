<?php
// phpcs:disable PSR1.Files.SideEffects
// ----------------------------------------------------
// ----------------------------------------------------
// Granola configuration
// ----------------------------------------------------
// ----------------------------------------------------
// We don't want to have to dig in to the core files all
// the time to make changes so lets do what we can here
// to customize granola before we go digging and changing
// ----------------------------------------------------
define('GRANOLA_GOOGLE_API_KEY', '');
define('GRANOLA_CONTENT_WIDTH', 1200);
define('GRANOLA_JQUERY_REQUIRED', false);
define('GRANOLA_AJAX_REQUIRED', false);
define('GRANOLA_JQUERY_IN_FOOTER', false);
define('GRANOLA_REMOVE_JQUERY_MIGRATE', true);
define('GRANOLA_COMMENTS', false);

// ----------------------------------------------------
// Editor Color Palette
// ----------------------------------------------------
define('GRANOLA_EDITOR_COLORS', [
    [
        'name' => __('Black', 'granola'),
        'slug' => 'black',
        'color' => '#222',
    ],
    [
        'name' => __('Grey', 'granola'),
        'slug' => 'grey',
        'color' => '#ccc',
    ],
    [
        'name' => __('White', 'granola'),
        'slug' => 'white',
        'color' => '#fff',
    ],
    [
        'name' => __('Red', 'granola'),
        'slug' => 'red',
        'color' => '#ff4136',
    ],
    [
        'name' => __('Blue', 'granola'),
        'slug' => 'blue',
        'color' => '#0074d9',
    ],
]);

// ----------------------------------------------------
// Editor Font Sizes
// ----------------------------------------------------
// Register font sizes for the gutenberg font size picker.
// Leave empty to remove the picker entirely
// define('GRANOLA_EDITOR_FONT_SIZES', [
//     [
//         'name' => __('Small', 'granola'),
//         'size' => 14,
//         'slug' => 'small'
//     ],
// ]);
define('GRANOLA_EDITOR_FONT_SIZES', []);

// ----------------------------------------------------
// Images
// ----------------------------------------------------
// Define an array of extra image sizes we need for the project
// ['name', width, height, hard crop (true/false)],
// ----------------------------------------------------
define('GRANOLA_IMAGES', [
    // ['wgd_500', 500, 0, false],
    // ['wgd_1300', 1300, 0, false],
    // This is a fairly common large size we need in projects
    ['super', 1500, 1500, false],
    // Some websites need super high res graphics
    ['super_duper', 2000, 2000, false],
]);

// ----------------------------------------------------
// Menus
// ----------------------------------------------------
// Define an array of extra image sizes we need for the project
// ----------------------------------------------------
define('GRANOLA_MENUS', [
    'header' => 'Header',
    'footer' => 'Footer',
]);

// ----------------------------------------------------
// Sidebars
// ----------------------------------------------------
// Define an array of sidebars to be used in the project.
// By default we have them all off
// ----------------------------------------------------
// define('GRANOLA_SIDEBARS', [
//     [
//         'name'          => esc_html__( 'Sidebar', 'granola' ),
//         'id'            => 'sidebar-1',
//         'description'   => esc_html__( 'Add widgets here.', 'granola' ),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h4 class="widget-title">',
//         'after_title'   => '</h4>',
//     ]
// ]);

// ----------------------------------------------------
// Plugins
// ----------------------------------------------------
define('GRANOLA_ACF_OPTIONS_PAGES', [
    'Cookie Notice',
]);

// ----------------------------------------------------
// Assets to preload
// ----------------------------------------------------
define('GRANOLA_PRELOAD_ASSETS', [
    // [
    //     'href' => \Granola\assetURL('fonts/WebFont-Regular.woff2'),
    //     'importance' => 'low',
    //     'type' => 'font/woff2',
    //     'as' => 'font',
    //     'crossorigin' => 'anonymous',
    // ],
]);

// ----------------------------------------------------
// MIME Types
// ----------------------------------------------------
define('GRANOLA_MIME_TYPES', [
    // 'svg' => 'image/svg+xml',
    // 'msg  => 'application/vnd.ms-outlook',
    // 'flv  => 'video/x-flv',
    // 'xls  => 'application/application/excel',
    // 'xlsx => 'application/application/vnd.ms-excel',
    // 'tiff => 'image/tiff',
    // 'tif  => 'image/tiff',
    // 'psd  => 'image/photoshop',
    // 'xlsx => 'application/application/vnd.ms-excel',
    // 'swf  => 'application/x-shockwave-flash',
]);
