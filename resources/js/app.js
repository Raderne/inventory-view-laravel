import "./bootstrap";

import.meta.glob(["../images/*"]);
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.addEventListener("DOMContentLoaded", () => {
    const skuInput = document.getElementById("sku");
    const nameInput = document.getElementById("name");
    const generateSkuButton = document.getElementById("generate-sku");

    const generateSku = (productName) => {
        if (!productName || productName === "") return;

        let normalized = productName
            .toUpperCase()
            .replace(/\s+/g, "-")
            .replace(/[^A-Z0-9\-]/g, "");

        normalized = normalized
            .split("-")
            .map((word) => word.slice(0, 2))
            .join("-");

        const randomSuffix = Math.random()
            .toString(36)
            .substring(2, 6)
            .toUpperCase();

        return `${normalized}-${randomSuffix}`;
    };

    generateSkuButton.addEventListener("click", () => {
        const productName = nameInput.value.trim();
        skuInput.value = "";
        if (productName) skuInput.value = generateSku(productName);
    });
});
