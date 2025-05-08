var elements = Array.prototype.slice.call(document.querySelectorAll("[data-bs-stacked-modal]"));

if (elements && elements.length > 0) {
    elements.forEach((element) => {
        if (element.getAttribute("data-kt-initialized") === "1") {
            return;
        }

        element.setAttribute("data-kt-initialized", "1");

        element.addEventListener("click", function (e) {
            e.preventDefault();

            const modalEl = document.querySelector(this.getAttribute("data-bs-stacked-modal"));

            if (modalEl) {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    });
}