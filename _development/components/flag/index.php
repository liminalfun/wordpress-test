<div class="<?= implode(' ', $args['classes']); ?>">
    <div class="flag__inner">
        <?php if (!empty($args['heading'])) { ?>
            <div class="flag__heading">
                <?= wp_kses_post($args['heading']); ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['content'])) {
            echo wp_kses_post($args['content']);
        } ?>
    </div>
    <?php if (!empty($args['media'])) { ?>
        <div class="flag__media img-fit">
            <?= $args['media']; ?>
        </div>
    <?php } ?>
</div>
