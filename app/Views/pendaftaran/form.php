<form method="post" action="/pendaftaran/save" class="row g-3">
    <?= csrf_field() ?>
    <div class="col-md-6">
        <label for="nipd" class="form-label">NIPD</label>
        <input type="text" class="form-control" id="nipd" name="nipd" required />
    </div>
    <div class="col-md-6">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required />
    </div>
    <div class="col-md-6">
        <label for="prodi" class="form-label">Prodi</label>
        <input type="text" class="form-control" id="prodi" name="prodi" required />
    </div>
    <div class="col-md-6">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
    </div>
    <div class="col-md-6">
        <label for="periode" class="form-label">Periode/Gelombang</label>
        <input type="text" class="form-control" id="periode" name="periode" />
    </div>
    <div class="col-md-6">
        <label for="referensi" class="form-label">Referensi</label>
        <input type="text" class="form-control" id="referensi" name="referensi" />
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" />
    </div>
    <div class="col-md-6">
        <label for="tagihan" class="form-label">Tagihan</label>
        <input type="number" step="0.01" class="form-control" id="tagihan" name="tagihan" value="0.00" />
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" id="form-reset" class="btn btn-secondary">Reset</button>
        <button type="button" class="btn btn-info" onclick="alert('Fungsi Email Tagihan dummy');">Email Tagihan</button>
    </div>
</form>
