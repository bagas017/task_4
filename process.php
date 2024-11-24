<?php
session_start();

$name = htmlspecialchars($_POST['name'] ?? '');
$address = htmlspecialchars($_POST['address'] ?? '');
$dob = htmlspecialchars($_POST['dob'] ?? '');
$gender = htmlspecialchars($_POST['gender'] ?? '');
$classes = isset($_POST['classes']) ? $_POST['classes'] : [];
$fileContent = "";

if (empty($name) || strlen($name) < 3) {
    die("Nama harus memiliki panjang minimal 3 karakter.");
}
if (empty($address) || strlen($address) < 10) {
    die("Alamat harus memiliki panjang minimal 10 karakter.");
}
if (empty($dob)) {
    die("Tanggal lahir harus diisi.");
}
if (empty($gender)) {
    die("Jenis kelamin harus dipilih.");
}
if (empty($classes) || !is_array($classes)) {
    die("Anda harus memilih setidaknya satu kelas.");
}

if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
    $fileTmpName = $_FILES['cv']['tmp_name'];
    $fileSize = $_FILES['cv']['size'];
    $fileName = $_FILES['cv']['name'];

    if ($fileSize > 2 * 1024 * 1024) {
        die("Ukuran file harus kurang dari 2MB.");
    }
    if (pathinfo($fileName, PATHINFO_EXTENSION) !== "txt") {
        die("File harus berupa file .txt.");
    }

    $fileContent = file_get_contents($fileTmpName);
} else {
    die("File CV tidak diunggah.");
}

$_SESSION['form_data'] = [
    'name' => $name,
    'address' => $address,
    'dob' => $dob,
    'gender' => $gender,
    'classes' => $classes,
    'fileContent' => $fileContent,
];

header("Location: result.php");
exit();
?>
