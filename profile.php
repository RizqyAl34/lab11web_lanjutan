<?php
// Proteksi halaman: wajib login
if (!isset($_SESSION['is_login'])) {
    header("Location: ../user/login");
    exit;
}

$db = new Database();
$message = "";

$username = $_SESSION['username'];
$nama     = $_SESSION['nama'];

if ($_POST) {
    $password_baru = $_POST['password_baru'];
    $konfirmasi    = $_POST['konfirmasi_password'];

    if ($password_baru !== $konfirmasi) {
        $message = "Password dan konfirmasi tidak sama!";
    } elseif (strlen($password_baru) < 6) {
        $message = "Password minimal 6 karakter!";
    } else {
        // Enkripsi password
        $hash = password_hash($password_baru, PASSWORD_DEFAULT);

        // Update ke database
        $sql = "UPDATE users SET password='$hash' WHERE username='$username'";
        $db->query($sql);

        $message = "Password berhasil diubah!";
    }
}
?>

<h3>Profil User</h3>

<?php if ($message): ?>
    <p style="color:green"><?= $message ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label>Username</label><br>
        <input type="text" value="<?= $username ?>" readonly>
    </div>
    <br>

    <div>
        <label>Nama</label><br>
        <input type="text" value="<?= $nama ?>" readonly>
    </div>
    <br>

    <hr>

    <h4>Ubah Password</h4>

    <div>
        <label>Password Baru</label><br>
        <input type="password" name="password_baru" required>
    </div>
    <br>

    <div>
        <label>Konfirmasi Password</label><br>
        <input type="password" name="konfirmasi_password" required>
    </div>
    <br>

    <button type="submit">Simpan</button>
</form>