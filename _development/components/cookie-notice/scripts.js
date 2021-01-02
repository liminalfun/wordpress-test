import cookieNotice from "./scripts/cookie-notice";

window.addEventListener("DOMContentLoaded", () => {
    const cookieNoticeElement = document.querySelector(".cookie-notice");

    if (cookieNoticeElement) {
        new cookieNotice(cookieNoticeElement);
    }
});
