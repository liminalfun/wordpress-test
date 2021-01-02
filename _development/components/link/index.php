<?php if (!empty($args['url']) && !empty($args['content'])) { ?>
    <a href="<?= esc_url($args['url']); ?>" <?= $args['attributes']; ?>><?=
        wp_kses_post($args['content']);
    ?></a>
<?php } ?>
