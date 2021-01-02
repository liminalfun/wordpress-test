<?php if ($args['show']) { ?>
    <div class="<?= implode(' ', $args['classes']); ?>">
        <div class="wp-block-page-header__inner">
            <?php if (!empty($args['content']['heading'])) { ?>
                <h1 class="wp-block-page-header__heading">
                    <?= $args['content']['heading'] ?>
                </h1>
            <?php } ?>

            <?php if (!empty($args['content']['meta'])) { ?>
                <div class="wp-block-page-header__meta"><?= $args['content']['meta'] ?></div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
