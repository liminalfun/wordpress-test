<button <?php echo implode(' ', $args['attributes']); ?>>
    <?php if ($args['aria-label'] !== "") { ?>
        <span class="screen-reader-text"><?php echo esc_html($args['aria-label']); ?></span>
    <?php } ?>
    <span class="burger__line burger__line--1"></span>
    <span class="burger__line burger__line--2"></span>
    <span class="burger__line burger__line--3"></span>
</button>
