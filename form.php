<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran IT Course</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form id="registerForm" onsubmit="saveToLocalStorage(event)">
        <h1>REGISTRATION</h1>

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" class="input-field" required>

        <label for="address">Alamat:</label>
        <input type="text" id="address" name="address" class="input-field" required></input>

        <label for="dob">Tanggal Lahir:</label>
        <input type="date" id="dob" name="dob" class="input-field" required>

        <fieldset>
            <legend>Jenis Kelamin:</legend>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="Male" required> Laki-laki</label>
                <label><input type="radio" name="gender" value="Female" required> Perempuan</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Kelas yang Diambil:</legend>
            <div class="checkbox-group">
                <label><input type="checkbox" name="classes" value="Front End & UI/UX"> Front End & UI/UX</label>
                <label><input type="checkbox" name="classes" value="Back End & Data Analysis"> Back End & Data Analysis</label>
                <label><input type="checkbox" name="classes" value="Full Stack Development"> Full Stack Development</label>
            </div>
        </fieldset>

        <label for="cv">Upload Dokumen Data Diri (.txt):</label>
        <input type="file" id="cv" name="cv" accept=".txt" class="input-field" required>

        <button type="submit">Submit</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
