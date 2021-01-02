<?php

namespace Granola;

/**
 * Return and possibly output the content of an SVG file in the assets directory
 * @param string $name
 * @param array $args
 * @return string
 */
function svg(string $name, array $args = []): string
{
    $svg = '';

    // Merge attributes
    $args = wp_parse_args($args, [
        'name'          => $name,
        'wrapped'       => false,
        'title'         => '',
        'description'   => '',
        'keepcolors'    => false,
        'keepsize'      => false,
        'width'         => 0,
        'height'        => 0,
    ]);

    // get the path to the SVG
    $svgPath = \Granola\svgPath($args['name']);

    if (file_exists($svgPath)) {
        $uniqueID = uniqid();

        // How to edit an SVG in PHP
        // https://stackoverflow.com/questions/41264017/php-svg-editing
        // https://stackoverflow.com/questions/18758101/domdocument-add-attribute-to-root-tag

        // Create a new instance of DOMDocument
        $doc = new \DOMDocument;

        // Load in the SVG
        $doc->loadXML(file_get_contents($svgPath));

        // set a role attribute on the SVG element
        $doc->documentElement->setAttribute('role', 'img');

        if ($args['keepcolors']) {
            $doc->documentElement->setAttribute('class', 'svg--keepcolors');
        }

        // To prevent responsive styling and maintain size from width/height attrs
        if ($args['keepsize']) {
            $doc->documentElement->setAttribute('class', 'svg--keepsize');
        }

        // Is there a title
        if ($args['title'] !== "") {
            $labelled = [];
            $labelled[] = 'title-' . $uniqueID;

            // Add a title
            $title = $doc->createElement('title', $args['title']);
            $title->setAttribute('id', 'title-' . $uniqueID);

            // Append it to the SVG
            $doc->firstChild->appendChild($title);

            // Is there a description
            if ($args['description'] !== "") {
                $labelled[] = 'description-' . $uniqueID;

                // Add a description
                $description = $doc->createElement('description', $args['description']);
                $description->setAttribute('id', 'description-' . $uniqueID);

                // Append it to the SVG
                $doc->firstChild->appendChild($description);
            }

            // Add the attributes to the SVG
            $doc->documentElement->setAttribute('aria-labelledby', implode(' ', $labelled));
        } else {
            $doc->documentElement->setAttribute('aria-hidden', 'true');
        }

        // If either width or height aren't specified let's try and get some more info
        if (empty($args['width']) || empty($args['height'])) {
            $svgInfo = \Granola\svgInfo($doc);
        }

        // If width has been specified, set it. Otherwise try and use what we got from svgInfo
        if (!empty($args['width'])) {
            $doc->documentElement->setAttribute('width', $args['width']);
        } elseif (!empty($svgInfo['w'])) {
            $doc->documentElement->setAttribute('width', $svgInfo['w']);
        }

        // If height has been specified, set it. Otherwise try and use what we got from svgInfo
        if (!empty($args['height'])) {
            $doc->documentElement->setAttribute('height', $args['height']);
        } elseif (!empty($svgInfo['h'])) {
            $doc->documentElement->setAttribute('height', $svgInfo['h']);
        }

        // output the svg markup and strip the xml doctype declaration
        // https://stackoverflow.com/questions/5706086/php-domdocument-output-without-xml-version-1-0-encoding-utf-8/17362447
        $svg = $doc->saveXML($doc->documentElement);

        if ($args['wrapped'] === true) {
            $svg = '<span class="svg-asset svg-asset--' . esc_attr($args['name']) . '">' . $svg . '</span>';
        }
    }

    return $svg;
}

/**
 * Build the path to the SVG asset in the theme
 * @param string $name
 * @return string
 */
function svgPath(string $name): string
{
    return \Granola\assetPath('svgs/' . $name);
}


/**
 * Get selected top-level attribute values from an SVG file 
 * @param string|DOMDocument $svg so we can avoid additional DOMDocument calls
 * @param array $attrs HTML attributes we want the values of
 * @return array
 */
function svgAttrs($svg, array $attrNames): array
{
    $attrs = [];

    // Set up (if it's a path to an SVG file) or use DOMDocument
    if (gettype($svg) === 'string' && file_exists($svg)) {
        $doc = new \DOMDocument;
        $doc->loadXML(file_get_contents($svg));
    } else{
        $doc = $svg;
    }

    // As long as we've got a DOMDocument to work with...
    if (gettype($doc) === 'object' && get_class($doc) === 'DOMDocument') {

        // Map requested attributes to what DOMDocument returns
        foreach($attrNames as $attrName){
            $attrs[$attrName] = $doc->documentElement->getAttribute($attrName);
        }
    }

    return $attrs;
}

/**
 * Get info about an SVG file (currently just width and height)
 * @param string|DOMDocument $svg so we can avoid additional DOMDocument calls
 * @return array
 */
function svgInfo($svg): array
{
    // Defaults
    $info = [
        'w' => 'auto',
        'h' => 'auto',
    ];

    // See if we can grab the attributes
    $attrs = \Granola\svgAttrs($svg, ['width', 'height', 'viewBox']);

    // The width or height are missing, let's see if we can get the values from the viewBox attr
    if (empty($attrs['width']) || empty($attrs['height'])) {
        if (!empty($attrs['viewBox'])) {
            $viewboxAttrParts = explode(' ', $attrs['viewBox']);
        }
    }

    // If we can get the width directly, use that. Otherewise try and use the viewBox value
    if (!empty($attrs['width'])) {
        $info['w'] = $attrs['width'];                
    } elseif (!empty($viewboxAttrParts[2])) {
        $info['w'] = $viewboxAttrParts[2];
    }

    // If we can get the height directly, use that. Otherewise try and use the viewBox value
    if (!empty($attrs['height'])) {
        $info['h'] = $attrs['height'];                
    } elseif (!empty($viewboxAttrParts[3])) {
        $info['h'] = $viewboxAttrParts[3];
    }

    return $info;
}
