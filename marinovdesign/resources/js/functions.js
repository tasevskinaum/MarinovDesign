function toggleRootClass() {
    var current = $("html").attr("data-bs-theme");
    var inverted = current == "dark" ? "light" : "dark";
    $("html").attr("data-bs-theme", inverted);
}

function toggleLocalStorage() {
    if (isLight()) {
        localStorage.removeItem("light");
    } else {
        localStorage.setItem("light", "set");
    }
}

function isLight() {
    return localStorage.getItem("light");
}

export const functions = {
    toggleRootClass: toggleRootClass,
    toggleLocalStorage: toggleLocalStorage,
    isLight: isLight
};