<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $group_id = $_POST['group_id'];

    if (empty($name) || empty($email) || empty($phone_number) || empty($password) || empty($group_id)) {
        echo "Semua field harus diisi.";
    } else {
        $checkQuery = "SELECT * FROM users WHERE phone_number = '$phone_number' OR email = '$email'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult && $checkResult->num_rows > 0) {
            echo "Nomor HP atau Email sudah terdaftar. Silakan gunakan Nomor HP atau Email lain.";
        } else {
            $insertQuery = "INSERT INTO users (name, email, phone_number, password, group_id) VALUES ('$name', '$email', '$phone_number', '$password', '$group_id')";
            $insertResult = $conn->query($insertQuery);

            if ($insertResult) {
                echo '<script>alert("Data berhasil disimpan.");</script>';
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }
}
