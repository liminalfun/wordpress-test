/* global wp */

/**
 * Filter block settings to hide the dropcap option on paragraph blocks.
 *
 * Uses an experimental feature filter.
 *
 * @link: https://github.com/joppuyo/remove-drop-cap
 *
 * @param {object} settings Block settings object.
 * @param {string} name Block name.
 */
const removeDropCap = function (settings, name) {
    // Bail early - wrong block.
    if (name !== "core/paragraph") {
        return settings;
    }

    const newSettings = Object.assign({}, settings);

    if (
        newSettings.supports &&
        newSettings.supports.__experimentalFeatures &&
        newSettings.supports.__experimentalFeatures.typography &&
        newSettings.supports.__experimentalFeatures.typography.dropCap
    ) {
        newSettings.supports.__experimentalFeatures.typography.dropCap = false;
    }

    return newSettings;
};

wp.hooks.addFilter(
    "blocks.registerBlockType",
    "granola/remove-drop-cap",
    removeDropCap
);
