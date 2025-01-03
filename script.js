document.addEventListener("DOMContentLoaded", function () {
    const addDrugForm = document.getElementById("add-drug-form");
    const recordSaleForm = document.getElementById("record-sale-form");
    const drugsList = document.getElementById("drugs-list");

    addDrugForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(addDrugForm);
        formData.append("action", "addDrug");
        fetch("actions.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadDrugs();
                    addDrugForm.reset();
                }
            });
    });

    recordSaleForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(recordSaleForm);
        formData.append("action", "recordSale");
        fetch("actions.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadDrugs();
                    recordSaleForm.reset();
                }
            });
    });

    function loadDrugs() {
        fetch("actions.php")
            .then(response => response.json())
            .then(drugs => {
                drugsList.innerHTML = "";
                drugs.forEach(drug => {
                    drugsList.innerHTML += `<div>${drug.name} (${drug.dose}) - Remaining: ${drug.quantity}</div>`;
                    const option = document.createElement("option");
                    option.value = drug.id;
                    option.textContent = drug.name;
                    recordSaleForm
                        .querySelector('select[name="drug_id"]')
                        .appendChild(option);
                });
            });
    }

    loadDrugs();
});
