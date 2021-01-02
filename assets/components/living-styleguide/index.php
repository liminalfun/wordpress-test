<?php

$components = testableComponents();

?><h2 class="livingstyleguide__heading livingstyleguide__heading--section">
    <?= __('HTML Elements', 'granola'); ?>
</h2><?php

echo \Granola\render('assets/components/living-styleguide/html-elements');

?><h2 class="livingstyleguide__heading livingstyleguide__heading--section">
    <?= __('Components', 'granola'); ?>
</h2>
<?php

// Loop the components
foreach ($components as $key => $path) {
    // Get the JSON
    $json = componentJSON($path);
    $args = resolveArgs($json->args);
    $variations = generateVariations($json, $args);

    ?><h2 class="livingstyleguide__heading livingstyleguide__heading--component">
        <?= $json->name; ?>
    </h2><?php

    echo \Granola\render($path, $args);

    foreach ($variations as $key => $variation) {
        ?><h2 class="livingstyleguide__heading livingstyleguide__heading--variation">
            <?= $variation['_variation']; ?>
        </h2><?php

        echo \Granola\render($path, $variation);
    }
}
