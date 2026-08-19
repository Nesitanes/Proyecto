document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");
    const searchInput = document.getElementById("searchInput");
    const patientsBody = document.getElementById("patientsBody");
    const noResults = document.getElementById("noResults");
    const resultCount = document.getElementById("resultCount");
    const sortButton = document.getElementById("sortButton");
    const sortLabel = document.getElementById("sortLabel");

    function showToast(message) {
        if (!toast) return;

        toast.textContent = message;
        toast.classList.add("show");

        clearTimeout(window.medicatecToast);
        window.medicatecToast = setTimeout(() => {
            toast.classList.remove("show");
        }, 2300);
    }

    // Los botones todavía no tienen páginas reales.
    document.querySelectorAll("[data-route]").forEach(element => {
        element.addEventListener("click", event => {
            event.preventDefault();
            showToast(`La página "${element.dataset.route}" quedará conectada posteriormente.`);
        });
    });

    // Buscador por nombre o DUI.
    if (searchInput && patientsBody) {
        searchInput.addEventListener("input", () => {
            const term = searchInput.value.trim().toLowerCase();
            const rows = [...patientsBody.querySelectorAll("tr")];
            let visible = 0;

            rows.forEach(row => {
                const name = row.dataset.name || "";
                const dui = row.dataset.dui || "";
                const matches = !term || name.includes(term) || dui.includes(term);

                row.hidden = !matches;

                if (matches) visible++;
            });

            if (noResults) {
                noResults.hidden = visible !== 0;
            }

            if (resultCount) {
                resultCount.textContent =
                    `${visible} paciente${visible === 1 ? "" : "s"}`;
            }
        });
    }

    // Filtro/ordenamiento visual.
    if (sortButton && patientsBody) {
        let newestFirst = true;

        sortButton.addEventListener("click", () => {
            const rows = [...patientsBody.querySelectorAll("tr")];

            rows.reverse().forEach(row => {
                patientsBody.appendChild(row);
            });

            newestFirst = !newestFirst;

            if (sortLabel) {
                sortLabel.textContent =
                    newestFirst ? "Recientes" : "Más antiguos";
            }
        });
    }

    // Clic sobre una fila para abrir el expediente.
    if (patientsBody) {
        patientsBody
            .querySelectorAll("tr[data-patient-url]")
            .forEach(row => {
                row.addEventListener("click", event => {
                    if (event.target.closest("a, button, input")) {
                        return;
                    }

                    window.location.href = row.dataset.patientUrl;
                });

                row.addEventListener("keydown", event => {
                    if (event.key === "Enter" || event.key === " ") {
                        event.preventDefault();
                        window.location.href = row.dataset.patientUrl;
                    }
                });
            });
    }
});