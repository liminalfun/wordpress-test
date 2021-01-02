<div class="<?= esc_attr(implode(' ', $args['classes'])); ?>">
    <div class="overlay__inner">
        <?php if (!empty($args['heading'])) { ?>
            <div class="overlay__heading">
                <?= wp_kses_post($args['heading']); ?>
            </div>
        <?php } ?>
        <?php if (!empty($args['content'])) { ?>
            <div class="overlay__content">
                <?= wp_kses_post($args['content']); ?>
            </div>
        <?php } ?>
    </div>
    <?php if (!empty($args['media'])) { ?>
        <div class="overlay__media img-fit">
            <?= $args['media']; ?>
        </div>
    <?php } ?>
</div>
