<?php
$db = new Database();
$id = $_GET['id'];

$data = $db->query("SELECT * FROM artikel WHERE id = $id")->fetch_assoc();

if ($_POST) {
    $update = [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ];

    $db->update('artikel', $update, "id=$id");
    header('Location: ../artikel/index');
    exit;
}
?>

<h2>Edit Artikel</h2>

<form method="POST">
    <p>
        <label>Judul</label><br>
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required>
    </p>
    <p>
        <label>Isi</label><br>
        <textarea name="isi" rows="5" required><?= $data['isi'] ?></textarea>
    </p>
    <button type="submit">Update</button>
</form>
