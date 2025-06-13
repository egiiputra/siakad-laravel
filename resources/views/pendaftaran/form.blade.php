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
            <h2>Form pendaftaran</h2>
        </div>
        <form method="post" class="form-horizontal">
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

                <label for="smt" class="control-label col-lg-1">Periode <span style="color:#F00">*</span></label>
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

                <label for="jenjangPendidikan" class="control-label col-lg-1">Jenjang pendidikan <span style="color:#F00">*</span></label>
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
                <?
                    // $qryJenisDaftar = "SELECT * FROM ms_jenis_pendaftaran ORDER BY kode";
                    // $rsJenisDaftar = mysql_query($qryJenisDaftar);
                    // while ($rowsJenisDaftar = mysql_fetch_array($rsJenisDaftar))
                    // {
                ?>
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
        </form>

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
    </script>
</body>
</html>
