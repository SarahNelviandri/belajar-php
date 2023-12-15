<?php
session_start();
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Email dan Password harus diisi.";
    } else {
        // Cek keberadaan pengguna di database
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                echo '<script>alert("Login berhasil");</script>';
                echo "<script>window.location.href = 'dashboard.php';</script>";
            } else {
                echo '<script>alert("Login gagal");</script>';
                echo "<script>window.location.href = 'login.php';</script>";
            }
        } else {
            echo '<script>alert("Data tidak ditemukan");</script>';
            echo "<script>window.location.href = 'login.php';</script>";
        }
    }
}
?>
