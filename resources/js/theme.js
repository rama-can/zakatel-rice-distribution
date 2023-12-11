import "./bootstrap";
import "preline";
import Alpine from "alpinejs";

// Call Alpine
window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {});
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
