<footer class="footer">
    <div class="footer__inner">
        <div class="footer__logo">
            <?php echo \Granola\image('logo-wholegrain-digital.svg', [
                'alt' => get_bloginfo('name'),
            ]); ?>
        </div>

        <div class="footer__content">
            <?php wp_nav_menu(array(
                'theme_location' => 'footer',
                'depth' => 2,
                'container' => '',
                'menu_class' => 'footer__menu',
                'fallback_cb' => false,
            )); ?>
        </div>

        <ul class="footer__social">
            <li>
                <?= \Granola\render('assets/components/link', [
                    'url' => '#0',
                    'content' => __('Facebook', 'granola'),
                ]);?>
            </li>
            <li>
                <?= \Granola\render('assets/components/link', [
                    'url' => '#0',
                    'content' => __('LinkedIn', 'granola'),
                ]);?>
            </li>
            <li>
                <?= \Granola\render('assets/components/link', [
                    'url' => '#0',
                    'content' => __('Twitter', 'granola'),
                ]);?>
            </li>
        </ul>

        <p class="footer__signature">
            <?php echo \Granola\render('template-parts/signature'); ?>
        </p>
    </div>
</footer>
