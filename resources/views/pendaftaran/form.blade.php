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
        <div class="d-flex flex-row justify-content-between align-items-center">
            
            <form method="post" action="" class="form-horizontal w-100">
                @csrf

                <h2>Form pendaftaran</h2>
                @if (isset($nipd))
                    <div class="row mb-2">
                        <label for="nipd" class="col-sm-2 col-form-label">NIPD</label>
                        <div class="col-lg-4">
                            <input class="form-control" id="nipd" name="tNIPD" value="{{ $nipd }}" maxlength="50" type="text" placeholder="NIPD" disabled/>
                        </div>
                    </div>
                @endif
                <div class="row mb-2">
                    <label for="angkatan" class="col-sm-2 col-form-label">Tahun Angkatan <span style="color:#F00">*</span></label>
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
                        <select id="kelas" class="form-control" name="optKls" tabindex="2" required>
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
                        <select id="gelombang" class="form-control" name="gelombang" tabindex="2" required>
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
                    <label for="tgl_daftar" class="col-form-label col-sm-2">Tanggal Pendaftaran <span style="color:#F00">*</span></label>
                    <div class="col-lg-2">
                        <input id="tgl_daftar" class="form-control default-date-picker" name="tTglDaftar" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="3"/>
                    </div>

                    <label for="smt" class="col-form-label col-sm-2">Periode <span style="color:#F00">*</span></label>
                    <div class="col-lg-2">
                        <select id="smt" class="form-control" name="optSmt" required>
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
                    <label for="tgl_daftar" class="col-form-label col-sm-2">Prodi <span style="color:#F00">*</span></label>
                    <div class="col-lg-2">
                        <select id="prodi" class="form-control" name="optProdi" required>
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
                        <select id="jenjangPendidikan" class="form-control" name="jenjangPendidikan" required>
                        <option value="">-- Periode</option>
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
                        <input class="form-control" id="sks" name="tSKS" value="{{ isset($sks) ? $sks:'' }}" type="text" placeholder="SKS"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pilih_kps" class="col-form-label col-sm-2">Menerima KPS ? <span style="color:#F00">*</span></label>
                    <div class="col-lg-2">
                        <select id="pilih_kps" class="form-control" name="terimaKps">
                            <option value="">-</option>
                            @foreach (["Ya", "Tidak"] as $item)
                            <option value="{{ $item }}">
                                {{ $item }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" id="no_kps" name="NoKps" value="{{ $noKps ?? '' }}" maxlength="50" type="text" placeholder="Inputkan Nomor KPS" style="display: none"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="jenis_daftar" class="col-form-label col-sm-2">Jenis Pendaftaran <span style="color:#F00">*</span></label>
                    <div class="col-lg-3">
                        <select id="jenis_daftar" class="form-control" name="jenisPendaftaran">
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
                        <select id="jalur_daftar" class="form-control" name="jalurPendaftaran">
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
                        <select id="pembiayaan" class="form-control" name="pembiayaan">
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
                        <input name="ijazah" type="file"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pembiayaan" class="col-form-label col-sm-4">Identitas (KTP / SIM / Kartu Pelajar)</label>
                    <div class="col-form-label col-lg-3">
                        <input name="identitas" type="file"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pembiayaan" class="col-form-label col-sm-4">Kartu Keluarga</label>
                    <div class="col-form-label col-lg-3">
                        <input name="kk" type="file"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="pembiayaan" class="col-form-label col-sm-4">Pas Foto</label>
                    <div class="col-form-label col-lg-3">
                        <input name="foto" type="file"/>
                    </div>
                </div>

                <h2>Profil</h2>

                <div class="row mb-2">
                    <label for="noKtp" class="col-form-label col-sm-2">No. KTP <span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <input id="noKtp" class="form-control" name="noKtp" type="text" placeholder="Masukkan no. KTP" autocomplete="off" tabindex="3"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="asalSekolah" class="col-form-label col-sm-2">Asal Sekolah <span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <input id="asalSekolah" class="form-control" name="asalSekolah" type="text" placeholder="Masukkan asal sekolah" autocomplete="off" tabindex="3"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="nisn" class="col-form-label col-sm-2">NISN <span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <input id="nisn" class="form-control" name="nisn" type="text" placeholder="Masukan NISN" autocomplete="off" tabindex="3"/>
                    </div>

                    <label for="npwp" class="col-form-label col-lg-2 col-sm-2">NPWP</label>
                    <div class="col-lg-3">
                        <input id="npwp" class="form-control" name="npwp" type="text" placeholder="Masukan NPWP" autocomplete="off" tabindex="3"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="nama" class="col-form-label col-sm-2">Nama<span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <input id="nama" class="form-control" name="nama" type="text" placeholder="Masukkan nama lengkap" autocomplete="off" tabindex="3"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="tempatLahir" class="col-form-label col-sm-2">Tanggal Lahir <span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <input id="tempatLahir" class="form-control" name="tempatLahir" type="text" placeholder="Masukkan tempat lahir" autocomplete="off" tabindex="3"/>
                    </div>
                    <label for="tanggalLahir" class="col-form-label col-lg-2 col-sm-2">Tempat Lahir <span style="color:#F00">*</span></label>
                    <div class="col-lg-2">
                        <input id="tanggalLahir" class="form-control default-date-picker" name="tanggalLahir" type="date" placeholder="Tgl. Daftar" autocomplete="off" tabindex="3"/>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-select" name="jenisKelamin" id="jenisKelamin">
                            <option value="">-Jenis kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="agama" class="col-form-label col-sm-2">Agama <span style="color:#F00">*</span></label>
                    <div class="col-lg-4">
                        <select id="agama" class="form-control" name="agama" required>
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
                        <select id="kewarganegaraan" class="form-control" name="kewarganegaraan" required>
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

                <div class="row col-sm-2">
                    <button type="submit" id="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        const noKpsInput = document.getElementById('no_kps');
        document.getElementById('pilih_kps').addEventListener('change', function () {
            if (this.value === 'Ya') {
                noKpsInput.style.display = 'block'
            } else {
                noKpsInput.style.display = 'none'
            }
        })

        // new FormData(document.getElementsByTagName('form'))
        // console.log('lol')
        // const form = document.getElementsByTagName('form')[0];
        // const buttonSubmit = document.getElementById('submit');
        // console.log(document.getElementsByTagName('form')[0]);

        // form.addEventListener('submit', (e) => {
        //     e.preventDefault()

        //     const formData = new FormData(form, buttonSubmit)

        //     fetch('/pendaftaran/add', {
        //         method: 'POST',
        //         body: formData
        //     })
        //         .then(res => res.json())
        //         .then(body => console.log(body))
        // })
    </script>
</body>
</html>
