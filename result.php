<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Pendaftaran IT Course</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kelas yang Diambil</th>
                <th>Isi CV</th>
            </tr>
        </thead>
        <tbody id="data-table">

        </tbody>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="form.php">
            <button class="back-button">Back to Form</button>
        </a>
    </div>

    <script>
        const storedData = JSON.parse(localStorage.getItem("registrations")) || [];

        const tableBody = document.getElementById("data-table");
        storedData.forEach(data => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${data.name}</td>
                <td>${data.address}</td>
                <td>${data.dob}</td>
                <td>${data.gender}</td>
                <td>${data.classes ? data.classes.join(", ") : "Tidak ada kelas"}</td>
                <td><pre>${data.fileContent}</pre></td>
            `;
            tableBody.appendChild(row);
        });
    </script>
</body>
</html>
