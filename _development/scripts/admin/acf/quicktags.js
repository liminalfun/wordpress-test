/* global acf */

if ("acf" in window && "add_filter" in acf) {
    acf.add_filter("wysiwyg_quicktags_settings", function (qtInit, id, field) {
        const editorWrap = field.context.querySelector("[data-toolbar]");

        if (editorWrap.getAttribute("data-toolbar") === "minimal") {
            qtInit.buttons = "strong,em,link,close";
        }

        return qtInit;
    });
}
