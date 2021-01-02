<?php if (!empty($args['cards'])) { ?>
    <section class="<?= implode(' ', $args['classes']); ?>">
        <div class="cards__inner">
            <?php if (!empty($args['heading'])) { ?>
                <h2 class="cards__heading"><?= wp_kses_post($args['heading']) ?></h2>
            <?php } ?>

            <?php if (!empty($args['content'])) { ?>
                <div class="cards__content">
                    <?= $args['content'] ?>
                </div>
            <?php } ?>

            <div class="cards__row">
                <?php foreach ($args['cards'] as $key => $card) { ?>
                    <div class="cards__col">
                        <?= \Granola\render('assets/components/card', $card); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
