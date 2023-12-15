<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Pengguna</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <section class="content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Registrasi Pengguna</h3>
                        </div>
                        <div class="card-body">
                            <form action="registrasi_proses.php" method="post">
                                <!-- Nama -->
                                <div class="form-group">
                                    <label for="name">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <!-- Nomor HP -->
                                <div class="form-group">
                                    <label for="phone_number">Nomor HP:</label>
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <!-- Grup Pengguna Dropdown -->
                                <div class="form-group">
                                    <label for="group_id">Level</label>
                                    <select id="group_id" name="group_id" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <?php
                                        $queryLevel = "SELECT id, group_name FROM  user_groups";
                                        $resultLevel = $conn->query($queryLevel);

                                        while ($rowLevel = $resultLevel->fetch_assoc()) {
                                            echo "<option value='" . $rowLevel['id'] . "'>" . $rowLevel['group_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Submit Button -->
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                    <a href="login.php" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Bootstrap JS and Popper.js CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>