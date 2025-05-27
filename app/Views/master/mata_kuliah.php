<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Master Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Master Mata Kuliah</h2>
    <form method="post" action="/master/mata-kuliah/save" class="row g-3 mb-3">
        <?= csrf_field() ?>
        <div class="col-md-3">
            <input type="text" name="kode" class="form-control" placeholder="Kode Mata Kuliah" required />
        </div>
        <div class="col-md-5">
            <input type="text" name="nama" class="form-control" placeholder="Nama Mata Kuliah" required />
        </div>
        <div class="col-md-2">
            <input type="number" name="sks" class="form-control" placeholder="SKS" required min="1" />
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </div>
    </form>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($mata_kuliah)) : ?>
                <?php $no = 1; foreach ($mata_kuliah as $mk) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($mk['kode']) ?></td>
                        <td><?= htmlspecialchars($mk['nama']) ?></td>
                        <td><?= htmlspecialchars($mk['sks']) ?></td>
                        <td>
                            <form method="post" action="/master/mata-kuliah/delete/<?= $mk['id'] ?>" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
