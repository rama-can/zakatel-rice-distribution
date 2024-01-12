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

document.addEventListener("click", function (event) {
    const target = event.target;

    // Periksa apakah elemen yang diklik adalah elemen tautan unduh
    if (target.tagName === "A" && target.getAttribute("download")) {
        // Hentikan NProgress setelah unduhan selesai
        target.addEventListener("load", function () {
            NProgress.done();
        });
    }
});

// Event listener untuk menangani event load
window.addEventListener("load", function () {
    NProgress.done();
});
