<?php
$db = new Database();

if ($_POST) {
    $data = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $db->insert('artikel', $data);
    header('Location: ../artikel/index');
    exit;
}
?>

<h2>Tambah Artikel</h2>

<form method="POST">
    <p>
        <label>Judul</label><br>
        <input type="text" name="judul" required>
    </p>
    <p>
        <label>Isi</label><br>
        <textarea name="isi" rows="5" required></textarea>
    </p>
    <button type="submit">Simpan</button>
</form>
