function saveToLocalStorage(event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const address = document.getElementById("address").value;
    const dob = document.getElementById("dob").value;
    const gender = document.querySelector("input[name='gender']:checked")?.value;
    const classes = Array.from(document.querySelectorAll("input[name='classes']:checked")).map(input => input.value);
    const fileInput = document.getElementById("cv");

    if (!name || name.length < 3) {
        alert("Nama harus minimal 3 karakter.");
        return;
    }
    if (!address || address.length < 10) {
        alert("Alamat harus minimal 10 karakter.");
        return;
    }
    if (!dob) {
        alert("Tanggal lahir harus diisi.");
        return;
    }
    if (!gender) {
        alert("Jenis kelamin harus dipilih.");
        return;
    }
    if (classes.length === 0) {
        alert("Pilih minimal satu kelas.");
        return;
    }
    if (!fileInput.files.length) {
        alert("Unggah CV Anda.");
        return;
    }

    const file = fileInput.files[0];
    if (file.size > 2 * 1024 * 1024 || !file.name.endsWith(".txt")) {
        alert("File harus berupa .txt dan kurang dari 2MB.");
        return;
    }

    const reader = new FileReader();
    reader.onload = function () {
        const fileContent = reader.result;

        const data = {
            name,
            address,
            dob,
            gender,
            classes,
            fileContent,
        };

        const storedData = JSON.parse(localStorage.getItem("registrations")) || [];
        storedData.push(data);
        localStorage.setItem("registrations", JSON.stringify(storedData));

        window.location.href = "result.php";
    };
    reader.readAsText(file);
}
