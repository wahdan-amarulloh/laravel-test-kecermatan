import './bootstrap';

// style imports
import 'flatpickr/dist/themes/airbnb.css'

import Alpine from 'alpinejs';
import flatpickr from "flatpickr";

window.Alpine = Alpine;
window.flatpickr = flatpickr;

document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
        open: false,
        isDark: false,

        toggle() {
            this.open = ! this.open
        },

        toggleDarkMode() {
            if (localStorage.theme === 'dark') {
                this.isDark = false;
                localStorage.theme = 'light';
                document.documentElement.classList.remove('dark');
            } else {
                this.isDark = true;
                localStorage.theme = 'dark';
                document.documentElement.classList.add('dark');
            }
        },

        init() {
            this.$nextTick(() => {
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                  } else {
                    document.documentElement.classList.remove('dark')
                  }
            })
        }
    }));

    let time_24 = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    }

    let calendar = {
        inline: true,
    }

    Alpine.directive('time', el => {
        flatpickr(el, time_24);
    })

    Alpine.directive('calendar', el => {
        flatpickr(el, calendar);
    })
})

Alpine.start();
