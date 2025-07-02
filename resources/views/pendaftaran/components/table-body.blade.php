@if (!empty($pendaftaran))
  @for ($i = 0; $i < count($pendaftaran); $i++)
    <tr>
      <td><span><?= ((intval($_GET['page']) - 1) * 20) +$i + 1 ?></span></td>
      <td><span><?= $pendaftaran[$i]->nipd ?></span></td>
      <td><span><?= $pendaftaran[$i]->prodi ?></span></td>
      <td><span><?= $pendaftaran[$i]->nama ?></span></td>
      <td><span><?= $pendaftaran[$i]->kota ?></span></td>
      <td><span><?= $pendaftaran[$i]->periode . htmlspecialchars($pendaftaran[$i]->gelombang) ?></span></td>
      <td><span>#</span></td>
      <td><span><?=($pendaftaran[$i]->sudah_ujian) ?></span></td>
      <td><span><?=($pendaftaran[$i]->sudah_wawancara) ?></span></td>
      <td><span><?=($pendaftaran[$i]->email) ?></span></td>
      {{-- <td><?= number_format($mhs['tagihan'], 2) ?></td> --}}
    </tr>
  @endfor
@else
  <tr><td colspan="14" class="text-center">Data tidak ditemukan</td></tr>
@endif