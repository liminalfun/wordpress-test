<?php

// This file will be autoloaded by granola in /granola/plugins/acf.
// You dont need to worry about the timing with hooks as this is run on
// acf/init. The documentation for creating a block with acf can be found at the
// following link:
//
// https://www.advancedcustomfields.com/resources/acf_register_block_type/
//
//
// It is important that this file remain free from html and is merely a
// mechanism for
// - Registering a block
// - Retrieving and processing fields in to the required format
// - calling \Granola\render with a partial that will output the markup

acf_register_block_type([
    // Name in code, alphabetical only
    'name' => 'living-styleguide',

    // Name for Interface
    'title' =>  'Living Styleguide',

    // Short description
    // 'description' => 'Description',

    // common | formatting | layout | widgets | embed
    'category' => 'granola-blocks',

    // Optional keywords to help users search for the block
    // 'keywords' => array('quote', 'mention', 'cite'),

    // https://developer.wordpress.org/resource/dashicons/
    // 'icon' => 'layout',

    // An array of post types that this block will be available for
    // 'post_types' => ['post', 'page'],

    // edit: Display edit form
    // preview: Display preview and edit form in sidebar
    // auto: Switch from preview to edit form on click
    'mode' => 'edit',

    // The default block alignment.
    // 'left', 'center', 'right', 'wide', 'full'
    'align' => 'full',

    // What options do we want this block to support.
    'supports' => [
        // Align can be an array of options, or a boolean
        // 'align' => ['left', 'right', 'full'],
        'align' => ['full'],
    ],

    // Handle rendering the block
    'render_callback' => function ($block) {

        $args = \Granola\WordPress\Gutenberg::classes(get_fields(), $block);

        echo \Granola\render('assets/components/living-styleguide', $args);
    }
]);
