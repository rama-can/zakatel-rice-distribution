import "./bootstrap";
import "preline";
import Alpine from "alpinejs";
import mask from "@alpinejs/mask";

// Import flatpickr
import flatpickr from "flatpickr";

// Import Chart
import "./components/rice";

// Call Alpine
window.Alpine = Alpine;
Alpine.plugin(mask);
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const notification = document.querySelector("div.notify");

    if (notification) {
        setTimeout(() => {
            notification.remove();
        }, notify.timeout);
    }

    // Flatpickr
    flatpickr(".datepicker", {
        // mode: "range",
        static: true,
        monthSelectorType: "static",
        dateFormat: "M j, Y | H:i",
        defaultDate: [new Date()],
        prevArrow:
            '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
        nextArrow:
            '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
    });
});

NProgress.configure({
    showSpinner: true,
    easing: "ease",
    speed: 500,
});

// Event listener untuk memulai NProgress saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    NProgress.start();
});

// Event listener untuk memulai NProgress sebelum halaman berpindah
window.addEventListener("beforeunload", function () {
    NProgress.start();
});

window.addEventListener("load", function () {
    NProgress.done();
});
