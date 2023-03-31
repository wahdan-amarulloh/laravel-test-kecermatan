import "./bootstrap";

// style imports
import "flatpickr/dist/themes/airbnb.css";
import "flipclock/dist/flipclock.css";
import "sweetalert2/dist/sweetalert2.min.css";

import Chart from "chart.js/auto";
import Alpine from "alpinejs";
import flatpickr from "flatpickr";
import FlipClock from "flipclock";
import Swal from "sweetalert2";
// import Chart from "chart.js/dist/chart.js";

window.Alpine = Alpine;
window.Swal = Swal;
window.flatpickr = flatpickr;
window.Chart = Chart;

document.addEventListener("alpine:init", () => {
    Alpine.data("main", () => ({
        open: false,
        isDark: false,
        toggle() {
            this.open = !this.open;
        },
        toggleDarkMode() {
            if (localStorage.getItem("color-theme")) {
                if (localStorage.getItem("color-theme") === "light") {
                    this.isDark = true;
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("color-theme", "dark");
                } else {
                    this.isDark = false;
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("color-theme", "light");
                }
            } else {
                if (document.documentElement.classList.contains("dark")) {
                    this.isDark = false;
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("color-theme", "light");
                } else {
                    this.isDark = true;
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("color-theme", "dark");
                }
            }
        },

        init() {
            this.$nextTick(() => {
                if (localStorage.getItem("color-theme")) {
                    if (localStorage.getItem("color-theme") === "light") {
                        this.isDark = false;
                    } else {
                        this.isDark = true;
                    }
                } else {
                    if (document.documentElement.classList.contains("dark")) {
                        this.isDark = true;
                    } else {
                        this.isDark = false;
                    }
                }
            });
            this.$watch("isDark", (value, oldValue) =>
                console.log(value, oldValue)
            );
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
});

Alpine.start();
