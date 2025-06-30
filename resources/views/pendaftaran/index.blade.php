@extends('../layouts.dashboard')

@section('content')
  <div class="d-flex flex-row justify-content-between align-items-center">
    <h2>Pendaftaran Mahasiswa</h2>
    <a href="/pendaftaran/add" class="btn btn-success">Tambah data</a>
  </div>
  <form method="get" class="row g-3 mb-3">
    <div class="col-md-2">
      <select name="prodi" class="form-select" aria-label="Filter Prodi">
        <option value="">-- Prodi --</option>
        <?php
        // $prodiOptions = array_unique(array_column($mahasiswa, 'prodi'));
        // sort($prodiOptions);
        // foreach ($prodiOptions as $prodi) {
        //     $selected = (isset($_GET['prodi']) && $_GET['prodi'] == $prodi) ? 'selected' : '';
        //     echo "<option value=\"$prodi\" $selected>$prodi</option>";
        // }
        ?>
      </select>
    </div>
    <div class="col-md-2">
      <select name="tahun" class="form-select" aria-label="Filter Tahun">
        <option value="">-- Tahun --</option>
        <?php
        // $tahunOptions = array_unique(array_column($mahasiswa, 'periode'));
        // rsort($tahunOptions);
        // foreach ($tahunOptions as $tahun) {
        //     $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $tahun) ? 'selected' : '';
        //     echo "<option value=\"$tahun\" $selected>$tahun</option>";
        // }
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
        <th>#</th>
        <th>Ujian</th>
        <th>Wawancara</th>
        <th>Email</th>
        <th>Tagihan</th>
      </tr>
    </thead>
    <tbody id="table-body">
      @include('pendaftaran.components.table-body')
    </tbody>
  </table>

  <nav aria-label="Page navigation example" id="pagination">
    @include('pendaftaran.components.pagination')
  </nav>

  <script>
    function loadPage(page) {
      const tableBody = document.getElementById('table-body');
      const pagination = document.getElementById('pagination');
      
      // document.querySelectorAll('.page-link').forEach(element => {
      //   element.addEventListener('click', function() {
          const url = new URL(window.location.href);
          // url.searchParams.set('page', this.innerText);
          // url.searchParams.set('page', this.innerText);
          url.searchParams.set('page', page);

          fetch(url.href, {
            headers: {
              "X-refresh": 'true',
            }
          })
            .then(resp => resp.json())
            .then(data => {
              // console.log(JSON.stringify(body));
              console.log(data);
              tableBody.innerHTML = data.content;
              pagination.innerHTML = data.pagination;

            })
          console.log(this);
          console.log(this.innerText);
          window.history.pushState({}, '', url);
      //   })
      // });
    }

    // addEvent();
  </script>
@endsection