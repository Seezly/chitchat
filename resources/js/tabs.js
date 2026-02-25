const tabs = document.querySelectorAll("[role='tablist'] button");

if (tabs) {
    tabs.forEach((tab, i, tabs) => {
        tab.addEventListener("click", (e) => {
            if (tab.ariaSelected !== "true") {
                // Deselect each tab
                tabs.forEach((tab) => (tab.ariaSelected = "false"));
                // Select the clicked tab
                tab.ariaSelected = "true";

                // Hide other target tab
                tabs.forEach((tab) => {
                    let el = document.getElementById(tab.dataset.tabTarget);
                    el.classList.add("hidden");
                    tab.classList.add(
                        "border-transparent",
                        "text-gray-600",
                        "hover:text-gray-700",
                    );
                    el.ariaHidden = "true";
                });
                // Show clicked target tab
                let selectedTab = document.getElementById(
                    tab.dataset.tabTarget,
                );

                selectedTab.classList.remove("hidden");
                tab.classList.remove(
                    "border-transparent",
                    "text-gray-600",
                    "hover:text-gray-700",
                );
                tab.classList.add(
                    "border-indigo-800",
                    "text-indigo-800",
                    "hover:text-indigo-900",
                );
                selectedTab.ariaHidden = "false";
            }
        });
    });
}
