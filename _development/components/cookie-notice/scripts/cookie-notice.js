import { setCookie, getCookie } from "../../../scripts/helpers/cookies";

class cookieNotice {
    constructor(element) {
        this.element = element;

        this.cookieLifetime = 365;
        this.cookieName = "cookies-accepted";

        this.acceptBtn = this.element.querySelector(".js-cookie-notice-accept");
        this.rejectBtn = this.element.querySelector(".js-cookie-notice-reject");

        this.init();
    }

    init() {
        // The cookie notice is only shown if not previously dismissed.
        if (getCookie(this.cookieName) === "") {
            this.element.classList.add("active");
        }

        // Handle cookie acceptance.
        this.element.addEventListener("click", (event) => {
            if (event.target === this.acceptBtn) {
                this.setCookieChoice(true);
            } else if (event.target === this.rejectBtn) {
                this.setCookieChoice(false);
            }
        });
    }

    /**
     * Handles the user accepting or rejecting site cookies.
     *
     * @param {boolean} choice Whether the user has accepted/rejected site cookies.
     */
    setCookieChoice(choice) {
        setCookie(this.cookieName, choice, this.cookieLifetime);
        this.closeCookieNotice();
    }

    /**
     * Closes the cookie notice.
     */
    closeCookieNotice() {
        this.element.classList.remove("active");
    }
}

export default cookieNotice;
