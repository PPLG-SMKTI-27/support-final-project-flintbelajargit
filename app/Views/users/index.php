<?php include __DIR__ . '/../layout.php'; ?>
<h2>Daftar Pengguna</h2>
<a href="?action=create">Tambah Pengguna</a>
<table border="1" cellpadding="6">
<tr><th>Foto</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
<?php foreach ($users as $user): ?>
<tr>
<td><img src="public/uploads/<?= $user['photo'] ?>" width="60"></td>
<td><?= htmlspecialchars($user['name']) ?></td>
<td><?= htmlspecialchars($user['email']) ?></td>
</tr>
<?php endforeach; ?>
</table>