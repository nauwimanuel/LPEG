<!DOCTYPE html>
<html>
<head>
  <title>Cetak | Laporan Harian</title>
  <style type="text/css">
    *{
      margin: 0px;
      padding: 0px;
    }
    body{
      width: auto;
      height: 290;
      padding: 1px;
    }
    .kiri{
      width: 65%;
    }
    .kanan{
      width: auto;
      margin-bottom: auto;
    }
    .table table{
      width: 100%;
      border: 1px solid black;
      background: grey;
    }
    .col1{width: 3%}
    .col2{width: 9%}
    .col3{width: 9%}
    .col4{width: 25%}
    .col5{width: 6%}
    .col6{width: 6%}
    .col7{width: 16%}
    .col8{width: 16%}
    .col9{width: 10%}
    .table th, .table tr, .table td{
      background: white;
      border: 1px solid black;
    }
    .table td{
      padding: 0 2px;
    }
    .table .datar td{
      text-align: center;
      background: silver;
    }
    .no{
      text-align: center;
    }
  </style>

</head>
<body onload="window.print();">
  <h4><center> LAPORAN KERJA HARIAN PNS <br> PEMERINTAH KABUPATEN MANOKWARI</center></h4>

  <table width="100%">
    <tr>
      <td class="kiri">
        <table>
          <tr>
            <td>NAMA</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_nama'] ?></td>
          </tr>
          <tr>
            <td>NIP</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_nip'] ?></td>
          </tr>
          <tr>
            <td>PANGKAT</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_pangkat'] ?></td>
          </tr>
          <tr>
            <td>UNIT KERJA</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_unit_kerja'] ?></td>
          </tr>
          <tr>
            <td>JABATAN</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_jabatan'] ?></td>
          </tr>
          <tr>
            <td>ATASAN</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"> <?= $pegawai[0]['peg_atasan'] ?> </td>
          </tr>
          <tr>
            <td>ATASAN DARI ATASAN LANSUNG</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_atasan2'] ?></td>
          </tr>
          <tr>
            <td>TUGAS POKOK</td>
            <td>&nbsp;&nbsp; : &nbsp;</td>
            <td class="font-bolt"><?= $pegawai[0]['peg_tugas_pokok'] ?></td>
          </tr>
        </table>
      </td>

      <td class="kanan">
        <table>
          <br><br><br><br>
          <tr>
            <td>Tanggal</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td>
              <?php
                $tgl = substr($laporan[0]['lap_tanggal'], 8);
                $bln = substr($laporan[0]['lap_tanggal'], 5, 2);
                $thn = substr($laporan[0]['lap_tanggal'], 0, 4);
                echo $tgl.'-'.$bln.'-'.$thn;
              ?>
            </td>
          </tr>
          <tr>
            <td>Hari Kerja</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
            <td>1 (satu) hari kerja</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <div class="table">
    <table>
      <thead>
        <tr>
          <th class="col1">NO</th>
          <th class="col2">Waktu</th>
          <th class="col3">Durasi<br><span>Jam & Menit</span></th>
          <th class="col4">Kegiatan</th>
          <th class="col5">Satuan</th>
          <th class="col6">Jumlah Satuan</th>
          <th class="col7">Tempat</th>
          <th class="col8">Penyelenggara</th>
          <th class="col9">Keterangan</th>
        </tr>
      </thead>
       <tbody>
        <tr class="datar">
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>4</td>
          <td>5</td>
          <td>6</td>
          <td>7</td>
          <td>8</td>
          <td>9</td>
        </tr>
        <?php $i=1; foreach ($laporan as $lprn ): ?>
          <tr>
            <td><?= $i; $i++ ?></td>
            <td><?= $lprn['lap_jam_mulai']." - ".$lprn['lap_jam_selesai'] ?></td>
            <td><?= $lprn['lap_jam_selesai'] - $lprn['lap_jam_mulai'] ?></td>
            <td><?= $lprn['lap_kegiatan'] ?></td>
            <td><?= $lprn['lap_satuan_kegiatan'] ?></td>
            <td><?= $lprn['lap_jumlah_satuan'] ?></td>
            <td><?= $lprn['lap_tempat_kegiatan'] ?></td>
            <td><?= $lprn['lap_penyelenggara'] ?></td>
            <td><?= $lprn['lap_keterangan'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<br>
  <table width="100%">
      <tr>
        <td width="65%"  style="border: 1px solid black">
          <table>
            <tr>
              <center>
                <u>Penilaian Atasan Langsung :</u><br>
                <p>Sesuai fakta dan kepatuhan maka yang bersangkutan pada hari ini telah melaksanakan seluruh tugas selamah <?= $rekapan[0]['rekap_jamkerja']; ?> jam.</p>
                Mengetahui Atasan<br><br><br><br>
                <?php if( !empty($pegawai[0]['peg_atasan']) ){ ?>
                  <u><?= $pegawai[0]['peg_atasan'] ?></u><br>
                  NIP. .....................
                <?php } else { ?>
                  <u>............................................</u><br>
                  NIP.
                <?php } ?>
              </center>
            </tr>
          </table>
        </td>
        <td width="35%">
          <center>
            Manokwari, <?= date('d F Y') ?><br>
            PNS Yang Bersangkuan<br><br><br><br>
            <u><?= $pegawai[0]['peg_nama'] ?></u><br>
            NIP.<?= $pegawai[0]['peg_nip'] ?>
          </center>
        </td>
      </tr>
    </table>
</body>
</html>
