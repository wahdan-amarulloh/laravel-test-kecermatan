import "./bootstrap";

// style imports
import "flatpickr/dist/themes/airbnb.css";
import "flipclock/dist/flipclock.css";

import Alpine from "alpinejs";
import flatpickr from "flatpickr";
import FlipClock from "flipclock";

window.Alpine = Alpine;
window.flatpickr = flatpickr;

document.addEventListener("alpine:init", () => {
    Alpine.data("main", () => ({
        open: false,
        isDark: false,

        toggle() {
            this.open = !this.open;
        },
        toggleDarkMode() {
            if (localStorage.theme === "dark") {
                this.isDark = false;
                localStorage.theme = "light";
                document.documentElement.classList.remove("dark");
            } else {
                this.isDark = true;
                localStorage.theme = "dark";
                document.documentElement.classList.add("dark");
            }
        },

        init() {
            this.$nextTick(() => {
                if (
                    localStorage.theme === "dark" ||
                    (!("theme" in localStorage) &&
                        window.matchMedia("(prefers-color-scheme: dark)")
                            .matches)
                ) {
                    document.documentElement.classList.add("dark");
                } else {
                    document.documentElement.classList.remove("dark");
                }
            });
        },
    }));

    let time_24 = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    };

    let calendar = {
        inline: true,
    };

    Alpine.directive("time", (el) => {
        flatpickr(el, time_24);
    });

    Alpine.directive("calendar", (el) => {
        flatpickr(el, calendar);
    });

    let date = (offset = 0) =>
        new Date(new Date().setSeconds(new Date().getSeconds() + offset));

    Alpine.data("countdown", () => ({
        isRunning: false,
        time: 10,
        reset() {
            location.reload();
        },
        toggle() {
            if (!this.isRunning) {
                this.start();
            } else {
                this.stop();
            }

            this.isRunning = !this.isRunning;
        },
        start() {
            this.clock = new FlipClock(this.$refs.wrapper, () => date(10), {
                face: "MinuteCounter",
                countdown: true,
                clockFaceOptions: {
                    countdown: true,
                },
                stopAt: -11,
            });

            this.clock.on("start", () => {
                console.log("clock started");
            });
            this.clock.on("stop", () => {
                console.log("clock stopped");
                this.isRunning = false;
            });
        },
        stop() {
            clock.reset();
            this.clock.timer.isRunning && this.clock.stop();
        },
        init() {
            // this.clock.on("start", () => {
            //     console.log("clock started");
            // });
            // this.clock.on("stop", () => {
            //     console.log("clock stopped");
            // });
        },
    }));
});

Alpine.start();
