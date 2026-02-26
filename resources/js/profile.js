const imgPlaceholder = document.getElementById("img_placeholder");
const fileInput = document.getElementById("File");

if (imgPlaceholder && fileInput) {
    fileInput.addEventListener("change", (e) => {
        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();

            console.log("I'm in");

            reader.addEventListener("load", (e) => {
                imgPlaceholder.src = e.target.result;
            });

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
}
