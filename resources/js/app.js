import { persist } from "@alpinejs/persist";
import "./bootstrap";

import { collapse } from "@alpinejs/collapse";
import Alpine from "alpinejs";
import TomSelect from "tom-select";

window.Alpine = Alpine;

Alpine.plugin([persist, collapse]);
Alpine.start();

document.querySelectorAll("select").forEach((el) => {
    let settings = {
        plugins: ["no_backspace_delete"],
        persist: true,
        create: false,
        controlInput: "<select class='appearance-none'>",
    };
    new TomSelect(el, settings);
});
document.querySelectorAll("select[multiple]").forEach((el) => {
    let settings = {
        plugins: {
            remove_button: {
                title: "Remove this item",
            },
        },
        hideSelected: true,
        persist: false,
        create: true,
    };
    new TomSelect(el, settings);
});
