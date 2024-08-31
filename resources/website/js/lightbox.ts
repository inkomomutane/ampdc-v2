import GLightbox from "glightbox";
import "glightbox/dist/css/glightbox.css";
import "../css/lightboxOverride.css";

document.addEventListener("DOMContentLoaded", () => {
    const assets = document.querySelectorAll(".gallery");

    if (assets) {
        for (let i = 0; i < assets.length; i++) {
            let light = GLightbox({
                selector: ".gallery",
                openEffect: "fade",
                skin: "clean",
            });
            light.init();
        }
    }
});
