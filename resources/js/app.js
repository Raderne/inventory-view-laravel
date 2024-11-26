import "./bootstrap";

import.meta.glob(["../images/*"]);
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const skuHandler = () => {
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
};

const notificationsHandler = () => {
    const notificationTrigger = document.getElementById("notification-trigger");
    let canSendRequest = true;
    const cooldownTime = 5000;

    notificationTrigger.addEventListener("click", () => {
        if (!canSendRequest) return;

        fetch("/notifications", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then((response) => response.json())
            .then((data) => {
                console.log("Notification sent: ", data);

                const notificationDot = document.getElementById("notify-dot");
                if (notificationDot) {
                    notificationDot.style.display = "none";
                }
            })
            .catch((error) => {
                console.error("Error sending notification: ", error);
            });

        canSendRequest = false;
        setTimeout(() => {
            canSendRequest = true;
        }, cooldownTime);
    });
};

window.addEventListener("DOMContentLoaded", () => {
    skuHandler();
    notificationsHandler();
});
