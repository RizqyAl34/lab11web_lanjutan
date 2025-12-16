<?php
$db = new Database();
$data = $db->query("SELECT * FROM artikel ORDER BY id DESC");
?>

<h2>Data Artikel</h2>
<a href="../artikel/tambah" class="btn btn-primary">Tambah Artikel</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['judul'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td>
            <a href="../artikel/edit?id=<?= $row['id'] ?>">Edit</a> |
            <a href="../artikel/hapus?id=<?= $row['id'] ?>"
               onclick="return confirm('Yakin hapus data?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
