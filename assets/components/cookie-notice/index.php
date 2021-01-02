<?php if (!empty($args['content'])) { ?>
    <div class="<?= implode(' ', $args['classes']); ?>">
        <div class="cookie-notice__banner">
            <div class="cookie-notice__message">
                <?= wp_kses_post($args['content']); ?>
            </div>

            <ul class="cookie-notice__actions">
                <li class="cookie-notice__action">
                    <button type="button" class="button cookie-notice__accept js-cookie-notice-accept">
                        <?= esc_html__('Accept', 'Accept site cookies', 'granola'); ?>
                    </button>
                </li>

                <li class="cookie-notice__action">
                    <button type="button" class="button cookie-notice__reject js-cookie-notice-reject">
                        <?= esc_html__('Reject', 'Reject site cookies', 'granola'); ?>
                    </button>
                </li>
            </ul>
        </div>
    </div>
<?php } ?>
