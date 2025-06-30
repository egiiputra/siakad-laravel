@extends('../layouts.dashboard')

@section('head')
  <title>{{ env('APP_NAME') }} - Tambah data pendaftar</title>
@endsection

@section('content')
  <div class="d-flex flex-row justify-content-between align-items-center">
      
    <form method="post" action="" class="form-horizontal w-100">
      @csrf

      <h2>Form pendaftaran</h2>
      @if (isset($nipd))
        <div class="row mb-2">
          <label for="nipd" class="col-sm-2 col-form-label fs-6">NIPD</label>
          <div class="col-lg-4">
            <input class="form-control" id="nipd" name="tNIPD" value="{{ $nipd }}" maxlength="50" type="text" placeholder="NIPD" disabled/>
          </div>
        </div>
      @endif
      <div class="row mb-2">
        <label for="angkatan" class="col-sm-2 col-form-label fs-6">Tahun Angkatan <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="angkatan" class="form-control" name="angkatan" autofocus tabindex="1" required>
          <option value="">-Tahun</option>
          @php
          $angkatan = $angkatan ?? '';
          for ($i=date("Y");$i<=date("Y")+1;$i++):
          @endphp
              <option value="{{ $i }}" {{ $angkatan == $i ? 'selected':'' }}>{{ $i }}</option>
          @php
          endfor;
          @endphp
          </select>
        </div>

        <label for="kelas" class="col-form-label col-sm-2">Kelas <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="kelas" class="form-control" name="kelas" tabindex="2" required>
          <option value="">-</option>
          @foreach (['PAGI', 'SORE', 'EKSTENSI'] as $kls)
            <option
              value="{{ $kls }}"
              {{ !isset($kelas) ? '':(($kelas == $kls) ? 'selected':'') }}
            >
              {{ $kls }}
            </option>
          @endforeach
          </select>
        </div>

        <label for="gelombang" class="col-form-label col-sm-2">Gelombang <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="gelombang" class="form-control" name="gelombang" tabindex="3" required>
          <option value="">-</option>
          @for ($i = 1; $i <= 3; $i++)
            <option
              value="{{ $i }}"
              {{ !isset($gelombang) ? '':($i == $gelombang ? 'selected':'') }}
            >
              {{ $i }}
            </option>
          @endfor
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="tanggalDaftar" class="col-form-label col-sm-2">Tanggal Pendaftaran <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <input id="tanggalDaftar" class="form-control default-date-picker" name="tanggalDaftar" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="4"/>
        </div>

        <label for="periode" class="col-form-label col-sm-2">Periode <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="periode" class="form-control" name="periode" tabindex="5" required>
          <option value="">-- Periode</option>
          @foreach($periodeOpts as $p)
            <option
              value="{{ $p->id }}"
              {{ !isset($periode) ? '':($periode == $p->id ? 'selected':'')}}
            >
              {{ $p->nama }}
            </option>
          @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="prodi" class="col-form-label col-sm-2">Prodi <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="prodi" class="form-control" name="prodi" tabindex="6" required>
            <option value="">-- Prodi</option>
            @foreach($prodiOpts as $p)
              <option
                value="{{ $p->id }}"
                {{ !isset($prodi) ? '':($prodi == $p->id ? 'selected':'')}}
              >
                {{ $p->nama }}
              </option>
            @endforeach
          </select>
        </div>

        <label for="jenjangPendidikan" class="col-form-label col-sm-2">Jenjang pendidikan <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="jenjangPendidikan" class="form-control" name="jenjangPendidikan" tabindex="7" required>
          <option value="">-- jenjang pendidikan</option>
          @foreach($jenjangPendidikanOpts as $j)
            <option
              value="{{ $j->id }}"
              {{ !isset($jenjangPendidikan) ? '':($jenjangPendidikan == $j->id ? 'selected':'')}}
            >
              {{ $j->nama }}
            </option>
          @endforeach
          </select>
        </div>

        <label for="sks" class="col-form-label col-sm-2">SKS Diakui</label>
        <div class="col-lg-2">
          <input class="form-control" id="sks" name="sks" value="{{ isset($sks) ? $sks:'' }}" type="text" tabindex="8" placeholder="SKS"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="terimaKps" class="col-form-label col-sm-2">Menerima KPS ? <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <select id="terimaKps" class="form-control" name="terimaKps" tabindex="9">
            <option value="Tidak" selected>Tidak</option>
            <option value="Ya">Ya</option>
          </select>
        </div>
        <div class="col-lg-4">
          <input class="form-control" id="noKps" name="noKps" value="{{ $noKps ?? '' }}" maxlength="50" type="text" placeholder="Inputkan Nomor KPS" style="display: none" tabindex="10"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="jenisPendaftaran" class="col-form-label col-sm-2">Jenis Pendaftaran <span style="color:#F00">*</span></label>
        <div class="col-lg-3">
          <select id="jenisPendaftaran" class="form-control" name="jenisPendaftaran" tabindex="11">
            <option value="">-- Pilih Salah Satu</option>
            @foreach ($jenisPendaftaranOpts as $item)
              <option value="{{ $item->id }}"
                @php
                if (!isset($jenisPendaftaran)) {
                  if ($item->id == 1) {
                    echo 'selected';
                  }
                } else {
                  if ($item->id == $jenisPendaftaran) {
                    echo 'selected';
                  }
                }
                @endphp
              >
                {{ $item->nama}}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="jalur_daftar" class="col-form-label col-sm-2">Jalur Pendaftaran <span style="color:#F00">*</span></label>
        <div class="col-lg-3">
          <select id="jalur_daftar" class="form-control" name="jalurPendaftaran" tabindex="12">
            <option value="">-- Pilih Salah Satu</option>
            @foreach ($jalurPendaftaranOpts as $item)
              <option value="{{ $item->id }}"
                @php
                if (!isset($jalurPendaftaran)) {
                  if ($item->id == 1) {
                    echo 'selected';
                  }
                } else {
                  if ($item->id == $jalurPendaftaran) {
                    echo 'selected';
                  }
                }
                @endphp
              >
                {{ $item->nama}}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pembiayaan" class="col-form-label col-sm-2">Pembiayaan <span style="color:#F00">*</span></label>
        <div class="col-lg-3">
          <select id="pembiayaan" class="form-control" name="pembiayaan" tabindex="13">
            <option value="">-- Pilih Salah Satu</option>
            @foreach ($pembiayaanOpts as $item)
              <option value="{{ $item->id }}"
                @php
                if (!isset($pembiayaan)) {
                  if ($item->id == 1) {
                    echo 'selected';
                  }
                } else {
                  if ($item->id == $pembiayaan) {
                    echo 'selected';
                  }
                }
                @endphp
              >
                {{ $item->nama}}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <h2>Dokumen pendukung</h2>

      <div class="row mb-2">
        <label for="pembiayaan" class="col-form-label col-sm-4">Ijazah/Surat Keterangan Lulus SMU/SMK/Sederajat</label>
        <div class="col-form-label col-lg-3">
          <input name="ijazah" type="file" tabindex="14"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pembiayaan" class="col-form-label col-sm-4">Identitas (KTP / SIM / Kartu Pelajar)</label>
        <div class="col-form-label col-lg-3">
          <input name="identitas" type="file" tabindex="15"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pembiayaan" class="col-form-label col-sm-4">Kartu Keluarga</label>
        <div class="col-form-label col-lg-3">
          <input name="kk" type="file" tabindex="16"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pembiayaan" class="col-form-label col-sm-4">Pas Foto</label>
        <div class="col-form-label col-lg-3">
          <input name="foto" type="file" tabindex="17"/>
        </div>
      </div>

      <h2>Profil</h2>

      <div class="row mb-2">
        <label for="noKtp" class="col-form-label col-sm-2">No. KTP <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="noKtp" class="form-control" name="noKtp" type="text" placeholder="Masukkan no. KTP" autocomplete="off" tabindex="18"/>
        </div>
      </div>
      <div class="row mb-2">
        <label for="asalSekolah" class="col-form-label col-sm-2">Asal Sekolah <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="asalSekolah" class="form-control" name="asalSekolah" type="text" placeholder="Masukkan asal sekolah" autocomplete="off" tabindex="19"/>
        </div>
      </div>
      <div class="row mb-2">
        <label for="nisn" class="col-form-label col-sm-2">NISN <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="nisn" class="form-control" name="nisn" type="text" placeholder="Masukan NISN" autocomplete="off" tabindex="20"/>
        </div>

        <label for="npwp" class="col-form-label col-lg-2 col-sm-2">NPWP</label>
        <div class="col-lg-3">
          <input id="npwp" class="form-control" name="npwp" type="text" placeholder="Masukan NPWP" autocomplete="off" tabindex="21"/>
        </div>
      </div>
      <div class="row mb-2">
        <label for="nama" class="col-form-label col-sm-2">Nama<span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="nama" class="form-control" name="nama" type="text" placeholder="Masukkan nama lengkap" autocomplete="off" tabindex="22"/>
        </div>
      </div>
      <div class="row mb-2">
        <label for="tempatLahir" class="col-form-label col-sm-2">Tempat Lahir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="tempatLahir" class="form-control" name="tempatLahir" type="text" placeholder="Masukkan tempat lahir" autocomplete="off" tabindex="23"/>
        </div>
        <label for="tanggalLahir" class="col-form-label col-lg-2 col-sm-2">Tanggal Lahir <span style="color:#F00">*</span></label>
        <div class="col-lg-2">
          <input id="tanggalLahir" class="form-control default-date-picker" name="tanggalLahir" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="24"/>
        </div>
        <div class="col-lg-2">
          <select class="form-select" name="jenisKelamin" id="jenisKelamin" tabindex="25" required>
            <option value="">-Jenis kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="agama" class="col-form-label col-sm-2">Agama <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="agama" class="form-control" name="agama" tabindex="26" required>
            <option value="">-- Agama</option>
            @foreach ($agamaOpts as $agama)
              <option value="{{ $agama->id}}">{{ $agama->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="kewarganegaraan" class="col-form-label col-sm-2">Kewarganegaraan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="kewarganegaraan" class="form-control" name="kewarganegaraan" tabindex="27" required>
            @foreach ($kewarganegaraanOpts as $kewarganegaraan)
              <option 
                value="{{ $kewarganegaraan->id}}"
                {{ $kewarganegaraan->id == 'ID' ? 'selected':''}}
              >
                {{ $kewarganegaraan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <h2>Alamat</h2>

      <div class="row mb-2">
        <label for="kota" class="col-form-label col-sm-1">Kota <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="kota" class="form-control" name="kota" type="text" placeholder="" autocomplete="off" tabindex="28"/>
        </div>
        <label for="kecamatan" class="col-form-label col-sm-1">kecamatan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="kecamatan" class="form-control" name="kecamatan" type="text" placeholder="" autocomplete="off" tabindex="29"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="kelurahan" class="col-form-label col-sm-2">Kelurahan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="kelurahan" class="form-control" name="kelurahan" type="text" placeholder="" autocomplete="off" tabindex="30"/>
        </div>
        <label for="rt" class="col-form-label col-sm-1">RT/RW <span style="color:#F00">*</span></label>
        <div class="col-lg-1">
          <input id="rt" class="form-control" name="rt" type="text" placeholder="RT" autocomplete="off" tabindex="31"/>
        </div>
        <div class="col-lg-1">
          <input id="rw" class="form-control" name="rw" type="text" placeholder="RW" autocomplete="off" tabindex="32"/>
        </div>
        <label for="kodePos" class="col-form-label col-sm-1">kodePos <span style="color:#F00">*</span></label>
        <div class="col-lg-1">
          <input id="kodePos" class="form-control" name="kodePos" type="text" placeholder="" autocomplete="off" tabindex="33"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="jalan" class="col-form-label col-sm-2">Jalan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="jalan" class="form-control" name="jalan" type="text" placeholder="" autocomplete="off" tabindex="34"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="jenisTinggal" class="col-form-label col-sm-2">Tinggal dengan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="jenisTinggal" class="form-control" name="jenisTinggal" tabindex="35" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($jenisTinggalOpts as $jenisTinggal)
              <option 
                value="{{ $jenisTinggal->id}}"
                {{ $jenisTinggal->id == 'ID' ? 'selected':''}}
              >
                {{ $jenisTinggal->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="transportasi" class="col-form-label col-sm-2">Transportasi <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="transportasi" class="form-control" name="transportasi" tabindex="36" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($transportasiOpts as $transportasi)
              <option 
                value="{{ $transportasi->id}}"
                {{ $transportasi->id == 'ID' ? 'selected':''}}
              >
                {{ $transportasi->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="telepon" class="col-form-label col-sm-2">No HP <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="telepon" class="form-control" name="telepon" type="text" placeholder="" autocomplete="off" tabindex="37"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="email" class="col-form-label col-sm-2">Email <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="email" class="form-control" name="email" type="text" placeholder="" autocomplete="off" tabindex="38"/>
        </div>
      </div>

      <!-- START form data ayah -->
      <h2>Ayah</h2>
      
      <div class="row mb-2">
        <label for="nikAyah" class="col-form-label col-sm-2">NIK <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="nikAyah" class="form-control" name="nikAyah" type="text" placeholder="" autocomplete="off" tabindex="39"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="namaAyah" class="col-form-label col-sm-2">Nama lengkap<span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="namaAyah" class="form-control" name="namaAyah" type="text" placeholder="" autocomplete="off" tabindex="40"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="tanggalLahirAyah" class="col-form-label col-sm-2">Tanggal lahir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="tanggalLahirAyah" class="form-control default-date-picker" name="tanggalLahirAyah" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="41"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pendidikanAyah" class="col-form-label  col-sm-2">Pendidikan terakhir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pendidikanAyah" class="form-control" name="pendidikanAyah" tabindex="42" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pendidikanOpts as $pendidikan)
              <option 
                value="{{ $pendidikan->id}}"
              >
                {{ $pendidikan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pekerjaanAyah" class="col-form-label  col-sm-2">Pekerjaan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pekerjaanAyah" class="form-control" name="pekerjaanAyah" tabindex="43" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pekerjaanOpts as $pekerjaan)
              <option 
                value="{{ $pekerjaan->id}}"
              >
                {{ $pekerjaan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="penghasilanAyah" class="col-form-label col-sm-2">Penghasilan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="penghasilanAyah" class="form-control" name="penghasilanAyah" tabindex="44" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($penghasilanOpts as $penghasilan)
              <option 
                value="{{ $penghasilan->id}}"
              >
                {{ $penghasilan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- END form data ayah -->

      <!-- START Form data Ibu -->
      <h2>Ibu</h2>
      
      <div class="row mb-2">
        <label for="nikIbu" class="col-form-label col-sm-2">NIK <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="nikIbu" class="form-control" name="nikIbu" type="text" placeholder="" autocomplete="off" tabindex="45"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="namaIbu" class="col-form-label col-sm-2">Nama lengkap<span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="namaIbu" class="form-control" name="namaIbu" type="text" placeholder="" autocomplete="off" tabindex="46"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="tanggalLahirIbu" class="col-form-label col-sm-2">Tanggal lahir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <input id="tanggalLahirIbu" class="form-control default-date-picker" name="tanggalLahirIbu" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="47"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pendidikanIbu" class="col-form-label  col-sm-2">Pendidikan terakhir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pendidikanIbu" class="form-control" name="pendidikanIbu" tabindex="48" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pendidikanOpts as $pendidikan)
              <option 
                value="{{ $pendidikan->id}}"
              >
                {{ $pendidikan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pekerjaanIbu" class="col-form-label  col-sm-2">Pekerjaan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pekerjaanIbu" class="form-control" name="pekerjaanIbu" tabindex="49" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pekerjaanOpts as $pekerjaan)
              <option 
                value="{{ $pekerjaan->id}}"
              >
                {{ $pekerjaan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="penghasilanIbu" class="col-form-label col-sm-2">Penghasilan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="penghasilanIbu" class="form-control" name="penghasilanIbu" tabindex="50" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($penghasilanOpts as $penghasilan)
              <option 
                value="{{ $penghasilan->id}}"
              >
                {{ $penghasilan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- END form data Ibu -->

      <!-- START form data wali -->
      <h2>Wali</h2>
      
      <div class="row mb-2">
        <label for="nikWali" class="col-form-label col-sm-2">NIK <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
            <input id="nikWali" class="form-control" name="nikWali" type="text" placeholder="" autocomplete="off" tabindex="51"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="namaWali" class="col-form-label col-sm-2">Nama lengkap<span style="color:#F00">*</span></label>
        <div class="col-lg-4">
            <input id="namaWali" class="form-control" name="namaWali" type="text" placeholder="" autocomplete="off" tabindex="52"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="tanggalLahirWali" class="col-form-label col-sm-2">Tanggal lahir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
            <input id="tanggalLahirWali" class="form-control default-date-picker" name="tanggalLahirWali" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="53"/>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pendidikanWali" class="col-form-label  col-sm-2">Pendidikan terakhir <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pendidikanWali" class="form-control" name="pendidikanWali" tabindex="54" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pendidikanOpts as $pendidikan)
              <option 
                value="{{ $pendidikan->id}}"
              >
                {{ $pendidikan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="pekerjaanWali" class="col-form-label  col-sm-2">Pekerjaan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="pekerjaanWali" class="form-control" name="pekerjaanWali" tabindex="55" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($pekerjaanOpts as $pekerjaan)
              <option 
                value="{{ $pekerjaan->id}}"
              >
                {{ $pekerjaan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row mb-2">
        <label for="penghasilanWali" class="col-form-label col-sm-2">Penghasilan <span style="color:#F00">*</span></label>
        <div class="col-lg-4">
          <select id="penghasilanWali" class="form-control" name="penghasilanWali" tabindex="56" required>
            <option value="">-- Pilih salah satu</option>
            @foreach ($penghasilanOpts as $penghasilan)
              <option 
                value="{{ $penghasilan->id}}"
              >
                {{ $penghasilan->nama }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- END form data wali -->



      <div class="row col-sm-2">
        <button type="submit" id="submit" class="btn btn-primary" tabindex="56">Daftar</button>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if (session('success'))
  <script>
    Swal.fire({
      title: "Data berhasil ditambahkan",
      icon: "success",
      //   draggable: true
    });
  </script>

  @endif
  <script>
    const noKpsInput = document.getElementById('noKps');
    document.getElementById('terimaKps').addEventListener('change', function () {
        if (this.value === 'Ya') {
            noKpsInput.style.display = 'block'
            noKpsInput.required = true;
        } else {
            noKpsInput.style.display = 'none'
            noKpsInput.required = false;
        }
    })
  </script>
@endsection