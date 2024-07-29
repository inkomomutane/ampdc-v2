import "flowbite";
import AOS from "aos";
import "aos/dist/aos.css";

// import images from "../images/*";

import.meta.glob(["../images/**"]);

window.addEventListener("load", () => {
    AOS.init({
        offset: 0,
        duration: 700,
        delay: 0,
    });

});
