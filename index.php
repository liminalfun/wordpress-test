<?php

get_header();

if (have_posts()) {
    $myPosts = [];

    while (have_posts()) {
        the_post();
        $myPosts[] = $post;
    }

    echo \Granola\render(
        'assets/components/main',
        \Granola\render('assets/components/article', [
            'header' => \Granola\render('assets/components/pageheader', [
                'content' => is_search() ? __('Search', 'granola') : get_queried_object(),
            ]),

            'content' => \Granola\render('assets/components/cards', [
                'cards' => $myPosts
            ]),
        ])
    );

    echo \Granola\render('template-parts/wordpress/posts-pagination');
} else {
    echo \Granola\render(
        'assets/components/main',
        \Granola\render('template-parts/content-none')
    );
}

get_footer();
