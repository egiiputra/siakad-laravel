<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIAKAD - Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            font-weight: 600;
            color: #343a40;
        }
        .form-select, .form-control {
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 8px 12px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            padding: 8px 20px;
            border-radius: 6px;
        }
        table {
            margin-top: 20px;
        }
        thead {
            background-color: #343a40;
            color: white;
        }
        tbody tr:hover {
            background-color: #f1f3f5;
        }
        .btn-danger {
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calon Mahasiswa</h2>
        <form method="get" class="row g-3 mb-3">
            <div class="col-md-2">
                <select name="prodi" class="form-select" aria-label="Filter Prodi">
                    <option value="">-- Prodi --</option>
                    <?php
                    $prodiOptions = array_unique(array_column($mahasiswa, 'prodi'));
                    sort($prodiOptions);
                    foreach ($prodiOptions as $prodi) {
                        $selected = (isset($_GET['prodi']) && $_GET['prodi'] == $prodi) ? 'selected' : '';
                        echo "<option value=\"$prodi\" $selected>$prodi</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="tahun" class="form-select" aria-label="Filter Tahun">
                    <option value="">-- Tahun --</option>
                    <?php
                    $tahunOptions = array_unique(array_column($mahasiswa, 'periode'));
                    rsort($tahunOptions);
                    foreach ($tahunOptions as $tahun) {
                        $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $tahun) ? 'selected' : '';
                        echo "<option value=\"$tahun\" $selected>$tahun</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status_ujian" class="form-select" aria-label="Filter Status Ujian">
                    <option value="">-- Status Ujian --</option>
                    <option value="belum" <?= (isset($_GET['status_ujian']) && $_GET['status_ujian'] == 'belum') ? 'selected' : '' ?>>Belum</option>
                    <option value="lulus" <?= (isset($_GET['status_ujian']) && $_GET['status_ujian'] == 'lulus') ? 'selected' : '' ?>>Lulus</option>
                    <option value="gagal" <?= (isset($_GET['status_ujian']) && $_GET['status_ujian'] == 'gagal') ? 'selected' : '' ?>>Gagal</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status_wawancara" class="form-select" aria-label="Filter Status Wawancara">
                    <option value="">-- Status Wawancara --</option>
                    <option value="belum" <?= (isset($_GET['status_wawancara']) && $_GET['status_wawancara'] == 'belum') ? 'selected' : '' ?>>Belum</option>
                    <option value="lulus" <?= (isset($_GET['status_wawancara']) && $_GET['status_wawancara'] == 'lulus') ? 'selected' : '' ?>>Lulus</option>
                    <option value="gagal" <?= (isset($_GET['status_wawancara']) && $_GET['status_wawancara'] == 'gagal') ? 'selected' : '' ?>>Gagal</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '' ?>" />
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="/pendaftaran" class="btn btn-secondary">Reset</a>
            </div>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIPD</th>
                    <th>Prodi</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Periode/Gelombang</th>
                    <th>Referensi</th>
                    <th>#</th>
                    <th>Info</th>
                    <th>Ujian</th>
                    <th>Wawancara</th>
                    <th>Email</th>
                    <th>Tagihan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mahasiswa)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($mhs['nipd']) ?></td>
                            <td><?= htmlspecialchars($mhs['prodi']) ?></td>
                            <td><?= htmlspecialchars($mhs['nama']) ?></td>
                            <td><?= htmlspecialchars($mhs['alamat']) ?></td>
                            <td><?= htmlspecialchars($mhs['periode']) ?></td>
                            <td><?= htmlspecialchars($mhs['referensi']) ?></td>
                            <td>#</td>
                            <td>Info</td>
                            <td><?= htmlspecialchars($mhs['status_ujian']) ?></td>
                            <td><?= htmlspecialchars($mhs['status_wawancara']) ?></td>
                            <td><?= htmlspecialchars($mhs['email']) ?></td>
                            <td><?= number_format($mhs['tagihan'], 2) ?></td>
                            <td>
                                <form method="post" action="/pendaftaran/delete/<?= $mhs['id'] ?>" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="14" class="text-center">Data tidak ditemukan</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
