import { functions } from "./functions";

const {
    toggleLocalStorage,
    toggleRootClass,
    isLight
} = functions;

$(document).ready(function () {
    $(".theme-toggle").click(function () {
        toggleLocalStorage();
        toggleRootClass();
    });

    if (isLight()) {
        toggleRootClass();
    }
});
