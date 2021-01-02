<?php if (!empty($args['logos'])) { ?>
    <div class="<?= esc_attr(implode(' ', $args['classes'])); ?>">

        <div class="logos__inner">

            <div class="logos__header">
                <?php if (!empty($args['heading'])) { ?>
                    <h2 class="logos__heading">
                        <?= wp_kses_post($args['heading']); ?>
                    </h2>
                <?php } ?>

                <?php if (!empty($args['content'])) {
                    echo wp_kses_post($args['content']);
                } ?>
            </div>

            <div class="logos__logos">
                <div class="logos__logos-row">
                    <?php foreach ($args['logos'] as $logo) { ?>
                        <div class="logos__logos-col">
                            <div class="logos__logo">
                                <?= $logo; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
