<!-- ==============================================
Konten (isi)
=============================================== -->
<section class="content-wrapper">
  <div class="content-header">
    <h1> Laporan Harian </h1>
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- Pesan Singkat -->
        <?= $this->session->flashdata('pesan')?>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border bg-gray">
            <div class="row">
              <div class="col-md-6">
                <h3 class="box-title">Laporan Harian Pegawai</h3>
              </div>

              <form action="" method="get" class="col-md-6">
                <button type="submit" class="btn btn-primary pull-right">Pilih</button>
                <div class="pull-right form-group">
                  <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal') ?>">
                </div>
              </form>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <?php if($laporan){ ?>
              <a href="<?= base_url(); ?>cetak/index/<?= $laporan[0]['lap_tanggal'] ?>" target="_blank" class="btn btn-primary">Print Laporan</a>
            <h5><div class="text-center"> LAPORAN KERJA HARIAN PNS <br> PEMERINTAH KABUPATEN MANOKWARI</div></h5 >

            <div>
              <div class="row">
                <div class="col-md-8">
                  <table>
                    <tr>
                      <td>NAMA</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_nama'] ?></td>
                    </tr>
                    <tr>
                      <td>NIP</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_nip'] ?></td>
                    </tr>
                    <tr>
                      <td>PANGKAT</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_pangkat'] ?></td>
                    </tr>
                    <tr>
                      <td>UNIT KERJA</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_unit_kerja'] ?></td>
                    </tr>
                    <tr>
                      <td>JABATAN</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_jabatan'] ?></td>
                    </tr>
                    <tr>
                      <td>ATASAN LANSUNG</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_atasan'] ?></td>
                    </tr>
                    <tr>
                      <td>ATASAN DARI ATASAN LANSUNG</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_atasan2'] ?></td>
                    </tr>
                    <tr>
                      <td>TUGAS POKOK</td>
                      <td>&nbsp;&nbsp; : &nbsp;</td>
                      <td class="font-bolt info-box-text"><?= $pegawai[0]['peg_tugas_pokok'] ?></td>
                    </tr>
                  </table>
                </div>

                <div class="col-md-4">
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
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Durasi</th>
                    <th class="text-center">Kegiatan</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Jumlah Satuan</th>
                    <th class="text-center">Tempat</th>
                    <th class="text-center">Penyelenggara</th>
                    <th class="text-center">Keterangan</th>
                  </tr>
                </thead>
                 <tbody>
                  <tr class="datar">
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                    <td class="text-center">3</td>
                    <td class="text-center">4</td>
                    <td class="text-center">5</td>
                    <td class="text-center">6</td>
                    <td class="text-center">7</td>
                    <td class="text-center">8</td>
                    <td class="text-center">9</td>
                  </tr>
                  <?php $i=1; foreach ($laporan as $lprn ) : ?>
                    <tr>
                      <td style="width: 10px"><?= $i; $i++ ?></td>
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

            <div class="row">
              <div class="col-md-8">
                <div class="text-center" style="border: 1px solid black">
                  <u>Penilaian Atasan Langsung :</u><br>
                  <p>Sesuai fakta dan kepatuhan maka yang bersangkutan pada hari ini telah melaksanakan seluruh tugas selamah <?= $rekapan[0]['rekap_jamkerja'] ?> jam</p>
                  Mengetahui Atasan<br><br><br><br>

                  <?php if( !empty($pegawai[0]['peg_atasan']) ){ ?>
                    <u class="info-box-text"><?= $pegawai[0]['peg_atasan'] ?></u>
                    NIP. .....................
                  <?php } else { ?>
                    <u class="info-box-text">............................................</u>
                    NIP.
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="text-center">
                  Manokwari, <?= date('d F Y') ?><br>
                  PNS Yang Bersangkuan<br><br><br><br>
                  <u><?= $pegawai[0]['peg_nama'] ?></u><br>
                  NIP. <?= $pegawai[0]['peg_nip'] ?>
                </div>
              </div>
            </div>
          </div>
          <?php
            } else {
              echo '<div class="">Data Laporan tidak di temukan atau tidak ada Data, <a href="'.base_url().'masukan/index">isi Data disini..</a></div>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

</section>
