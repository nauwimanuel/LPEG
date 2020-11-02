<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Halaman Utama
    </h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <!-- Pesan Singkat -->
        <?= $this->session->flashdata('pesan')?>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9">
        <div class="nav-tabs-custom bg-gray">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
            <li><a href="#aditprofile" data-toggle="tab">Ubah Profile</a></li>
            <li><a href="#gantisandi" data-toggle="tab">Ubah Sandi</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="profile">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?= base_url() ?>assets/img/default.jpg" class="img-thumbnail">
                </div>
                <div class="col-md-9">
                  <div class="">
                    <h4 class="row"> <small class="col-lg-5">Nama Lengkap</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_nama'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">N I P</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_nip'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Pangkat (Gol/Ruang)</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_pangkat'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Unit Kerja</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_unit_kerja'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Jabatan</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_jabatan'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Atasan</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_atasan'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Atasan dari Atasan</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_atasan2'] ?> </b> </h4>
                    <h4 class="row"> <small class="col-lg-5">Tugas Pokok</small> <b class="col-lg-7 info-box-text"> <?= $pegawai[0]['peg_tugas_pokok'] ?> </b> </h4>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="aditprofile">
              <form class="form-horizontal" action="<?= base_url(); ?>home/editProfil" method="post">
                <div class="form-group">
                  <label for="nip" class="col-sm-3 control-label">N I P</label>
                  <div class="col-sm-9">
                    <input name="nip" type="text" class="form-control" id="nip" value="<?= $pegawai[0]['peg_nip'] ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" id="nama" value="<?= $pegawai[0]['peg_nama'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="pangkat" class="col-sm-3 control-label">Pangkat</label>
                  <div class="col-sm-9">
                    <input name="pangkat" type="text" class="form-control" id="pangkat" value="<?= $pegawai[0]['peg_pangkat'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="unit_kerja" class="col-sm-3 control-label">Unit Kerja</label>
                  <div class="col-sm-9">
                    <input name="unit_kerja" type="text" class="form-control" id="unit_kerja" value="<?= $pegawai[0]['peg_unit_kerja'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input name="jabatan" type="text" class="form-control" id="jabatan" value="<?= $pegawai[0]['peg_jabatan'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="atasan1" class="col-sm-3 control-label">NIP Atasan</label>
                  <div class="col-sm-9">
                    <input name="atasan1" type="text" class="form-control" id="atasan1" value="<?= $pegawai[0]['peg_atasan'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="atasan2" class="col-sm-3 control-label">NIP Atasan dari Atasan</label>
                  <div class="col-sm-9">
                    <input name="atasan2" type="text" class="form-control" id="atasan2" value="<?= $pegawai[0]['peg_atasan2'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="tugas_pokok" class="col-sm-3 control-label">Tugas Pokok</label>
                  <div class="col-sm-9">
                    <input name="tugas_pokok" type="text" class="form-control" id="tugas_pokok" value="<?= $pegawai[0]['peg_tugas_pokok'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="gantisandi">
              <form action="<?= base_url() ?>home/gantisandi" method="post" class="form-horizontal">
                <div class="form-group">
                  <label for="sandilama" class="col-sm-3 control-label">Kata Sandi Lama</label>
                  <div class="col-sm-9">
                    <input name="sandilama" type="password" class="form-control" id="sandilama" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="sandibaru" class="col-sm-3 control-label">Kata Sandi Baru</label>
                  <div class="col-sm-9">
                    <input name="sandibaru" type="password" class="form-control" id="sandibaru" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="ceksandibaru" class="col-sm-3 control-label">Cek Sandi Baru</label>
                  <div class="col-sm-9">
                    <input name="ceksandibaru" type="password" class="form-control" id="ceksandibaru" value="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>



        <!-- Tabel Kegiatan -->
        <div class="box box-primary">
          <div class="box-header with-border1 bg-gray">
            <div class="row">
              <div class="col-md-6">
                <h3 class="box-title">Tabel Kegiatan</h3>
              </div>
              <form action="" method="post" class="col-md-6">
                <button type="submit" class="btn btn-primary pull-right">Cari</button>
                <div class="pull-right form-group">
                  <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal') ?>">
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th>NO</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th style="width: 150px">Aksi</th>
              </tr>
              <?php $i=1; foreach($laporanpegin as $lprn) : ?>
                <tr>
                  <td style="width: 10px"><?= $i; $i++?></td>
                  <td><?= $lprn['lap_kegiatan'] ?></td>
                  <td><?= $lprn['lap_tanggal'] ?></td>
                  <td><?= $lprn['lap_jam_mulai']." - ".$lprn['lap_jam_selesai'] ?></td>
                  <td>
                    <button  data-toggle="modal" data-target="#detail-<?= $lprn['lap_id'] ?>" class="btn btn-info btn-xs">Lihat</button>
                    <button data-toggle="modal" data-target="#edit-<?= $lprn['lap_id'] ?>" class="btn btn-primary btn-xs">Edit</button>
                    <a href="<?= base_url() ?>home/hapusdata/<?= $lprn['lap_id'] ?>" class="btn btn-danger btn-xs hapus">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <?php echo $pagination; ?>
          </div>
        </div>
      </div>


      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Kegiatan</span>
            <span class="info-box-number"><?= $jl ?> <small>Kegiatan</small></span>
          </div>
        </div>

        <!-- <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div>
        </div>

        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span>
          </div>
        </div> -->

        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Pegawai</span>
            <span class="info-box-number"><?= $ju ?> <small>Pegawai</small></span>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<!-- Modals Detail Laporan -->
<?php foreach($laporanpegin as $lprn) : ?>
  <div class="modal fade" id="detail-<?= $lprn['lap_id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Lihat Detail Data</h4>
        </div>
        <div class="modal-body">
          <h4 class="row"> <small class="col-sm-4">Kegiatan</small> <b class="col-sm-8"><?= $lprn['lap_kegiatan']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Tanggal</small> <b class="col-sm-8"><?= $lprn['lap_tanggal']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Jam Mulai</small> <b class="col-sm-8"><?= $lprn['lap_jam_mulai']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Jam Selesai</small> <b class="col-sm-8"><?= $lprn['lap_jam_selesai']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Satuan Kegiatan</small> <b class="col-sm-8"><?= $lprn['lap_satuan_kegiatan']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Jumlah Satuan</small> <b class="col-sm-8"><?= $lprn['lap_jumlah_satuan']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Tempat Kegiatan</small> <b class="col-sm-8"><?= $lprn['lap_tempat_kegiatan']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Penyelenggara</small> <b class="col-sm-8"><?= $lprn['lap_penyelenggara']; ?></b> </h4>
          <h4 class="row"> <small class="col-sm-4">Keterangan</small> <b class="col-sm-8"><?= $lprn['lap_keterangan']; ?></b> </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
          <button data-toggle="modal" data-target="#edit-<?= $lprn['lap_id'] ?>" class="btn btn-primary">Edit Data</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- Modals Edit Data Laporan -->
<?php foreach($laporanpegin as $lprn) : ?>
  <div class="modal fade" id="edit-<?= $lprn['lap_id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Data Laporan</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('home/editdata/'); ?>" method="post" class="form-horizontal">
            <input type="hidden" name="nip" value="<?= $this->session->user; ?>">
            <input type="hidden" name="id" value="<?= $lprn['lap_id']; ?>">
            <div class="box-body">
              <div class="form-group">
                <label for="kegiatan" class="col-sm-2 control-label">Kegiatan</label>
                <div class="col-sm-10">
                  <input name="kegiatan" type="text" class="form-control" id="kegiatan" value="<?= $lprn['lap_kegiatan']; ?>" required>
                  <?= form_error('kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-3 ">
                  <input name="tanggal" type="date" class="form-control" id="tanggal" value="<?= $lprn['lap_tanggal']; ?>" required>
                  <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                </div>
                <label for="jammulai" class="col-sm-2 control-label">Jam Mulai</label>
                <div class="col-sm-2">
                  <input name="jam_mulai" type="time" class="form-control" id="jammulai" value="<?= $lprn['lap_jam_mulai']; ?>" required>
                  <?= form_error('jam_mulai', '<small class="text-danger">', '</small>') ?>
                </div>

                <label for="jamselesai" class="col-sm-1 control-label">Selesai</label>
                <div class="col-sm-2">
                  <input name="jam_selesai" type="time" class="form-control" id="jamselesai" value="<?= $lprn['lap_jam_selesai']; ?>" required>
                  <?= form_error('jam_selesai', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="satuankegiatan" class="col-sm-2 control-label">Satuan Kegiatan</label>
                <div class="col-sm-6">
                  <input name="satuan_kegiatan" type="text" class="form-control" id="satuankegiatan" value="<?= $lprn['lap_satuan_kegiatan']; ?>" required>
                  <?= form_error('satuan_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>

                <label for="jumlahsatuan" class="col-sm-2 control-label">Jumlah Satuan</label>
                <div class="col-sm-2">
                  <input name="jumlah_satuan" type="number" class="form-control" id="jumlahsatuan" value="<?= $lprn['lap_jumlah_satuan']; ?>" required>
                  <?= form_error('jumlah_satuan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tempat" class="col-sm-2 control-label">Tempat Kegiatan</label>
                <div class="col-sm-10">
                  <input name="tempat_kegiatan" type="text" class="form-control" id="tempat" value="<?= $lprn['lap_tempat_kegiatan']; ?>" required>
                  <?= form_error('tempat_kegiatan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="penyelenggara" class="col-sm-2 control-label">Penyelenggara</label>
                <div class="col-sm-10">
                  <input name="penyelenggara" type="text" class="form-control" id="penyelenggara" value="<?= $lprn['lap_penyelenggara']; ?>" required>
                  <?= form_error('penyelenggara', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                  <textarea name="keterangan" class="form-control" rows="3" id="keterangan" required><?= $lprn['lap_keterangan']; ?></textarea>
                  <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan Laporan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
