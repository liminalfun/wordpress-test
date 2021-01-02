/* global wp */

// A list of blocks to disable in the editor.
const disabledBlocks = [
    "core/gallery",
    "core/archives",
    "core/audio",
    "core/calendar",
    "core/categories",
    "core/code",
    "core/columns",
    "core/column",
    "core/file",
    "core/media-text",
    "core/latest-comments",
    "core/latest-posts",
    "core/more",
    "core/nextpage",
    "core/preformatted",
    "core/pullquote",
    "core/rss",
    "core/search",
    "core/social-links",
    "core/social-link",
    "core/spacer",
    "core/subhead",
    "core/tag-cloud",
    "core/table",
    "core/text-columns",
    "core/video",
    "core/verse",
]

wp.domReady(() => {
    for (const block of disabledBlocks) {
        wp.blocks.unregisterBlockType(block)
    }
})
