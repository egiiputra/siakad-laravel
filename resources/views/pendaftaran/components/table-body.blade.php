@if (!empty($pendaftaran))
  @for ($i = 0; $i < count($pendaftaran); $i++)
    <tr>
      <td><?= ((intval($_GET['page']) - 1) * 20) +$i + 1 ?></td>
      <td><?= $pendaftaran[$i]->nipd ?></td>
      <td><?= $pendaftaran[$i]->prodi ?></td>
      <td><?= $pendaftaran[$i]->nama ?></td>
      <td><?= $pendaftaran[$i]->kota ?></td>
      <td><?= $pendaftaran[$i]->periode . htmlspecialchars($pendaftaran[$i]->gelombang) ?></td>
      <td>#</td>
      <td><?=($pendaftaran[$i]->sudah_ujian) ?></td>
      <td><?=($pendaftaran[$i]->sudah_wawancara) ?></td>
      <td><?=($pendaftaran[$i]->email) ?></td>
      {{-- <td><?= number_format($mhs['tagihan'], 2) ?></td> --}}
    </tr>
  @endfor
@else
  <tr><td colspan="14" class="text-center">Data tidak ditemukan</td></tr>
@endif