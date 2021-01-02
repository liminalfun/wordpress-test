<div class="<?= implode(' ', $args['classes']); ?>">

    <div class="g-card__inner">
        <?php if (!empty($args['heading'])) { ?>
            <div class="g-card__heading">
                <?= wp_kses_post($args['heading']); ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['meta'])) { ?>
            <div class="g-card__meta">
                <?= wp_kses_post($args['meta']); ?>
            </div>
        <?php } ?>

        <?php if (!empty($args['content'])) { ?>
            <div class="g-card__content">
                <?= wp_kses_post($args['content']); ?>
            </div>
        <?php } ?>
    </div>

    <?php if (!empty($args['media'])) { ?>
        <div class="g-card__media img-fit">
            <?= $args['media']; ?>
        </div>
    <?php } ?>
</div>
