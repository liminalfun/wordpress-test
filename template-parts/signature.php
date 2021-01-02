<?php

echo wp_kses_post(
    sprintf(
        /* translators: 1: link to Wholegrain Digital website. */
        __('Website by %s', 'granola'),
        \Granola\render('assets/components/link', [
            'content' => __('Wholegrain Digital', 'granola'),
            'url'     => 'https://www.wholegraindigital.com/',
            'target' => '_blank',
        ])
    )
);
