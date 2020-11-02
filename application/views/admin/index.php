<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Kelolah Pengguna
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
      <a href="<?= base_url(); ?>admin/tambah" class="col-md-2 col-sm-2 col-xs-2">
        <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>
      </a>

      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Pengguna</span>
            <span class="info-box-number"><?= $ju; ?> <small>Pengguna</small></span>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border1 bg-gray">
            <div class="row">
              <div class="col-md-6">
                <h3 class="box-title">Tabel Pegawai</h3>
              </div>
              <form action="" method="post" class="col-md-6">
                <button type="submit" class="btn btn-primary pull-right">Cari</button>
                <div class="pull-right form-group">
                  <input type="text" name="nip" class="form-control" placeholder="Masukan NIP untuk Cari.." value="<?= set_value('nip') ?>">
                </div>
              </form>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
              <tr>
                <th>NO</th>
                <th>N I P</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Info</th>
              </tr>
              <?php $i=1; foreach($userpegawai as $pgw) : ?>
                <tr>
                  <td style="width: 10px"><?= $i; $i++?></td>
                  <td><?= $pgw['user_nip'] ?></td>
                  <td><?= $pgw['peg_nama'] ?></td>
                  <?php
                  if($pgw['user_status'] == 1) {
                    echo "<td>Admin</td>";
                  } else {
                    echo "<td>Pegawai</td>";
                  }
                  ?>
                  <td>
                    <button data-toggle="modal" data-target="#detail-<?= $pgw['user_nip'] ?>" class="btn btn-xs btn-info">Lihat</button>
                    <?php if($pgw['user_status'] == 0){ ?>
                      <a href="<?= base_url() ?>admin/hapuspegawai/<?= $pgw['user_nip'] ?>" class="btn btn-xs btn-danger">Hapus</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>






<!-- Modals Detail Pegawai -->
<?php foreach($userpegawai as $pgw) : ?>
  <div class="modal fade" id="detail-<?= $pgw['peg_nip']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Lihat Detail Data</h4>
        </div>
        <div class="modal-body">
          <h4 class="row"> <small class="col-lg-3">Nama Lengkap</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_nama']; ?></b> </h4>
          <h4 class="row"> <small class="col-lg-3">N I P</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_nip']; ?></b> </h4>
          <h4 class="row"> <small class="col-lg-3">Pangkat</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_pangkat']; ?></b> </h4>
          <h4 class="row"> <small class="col-lg-3">Unit Kerja</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_unit_kerja']; ?></b> </h4>
          <h4 class="row"> <small class="col-lg-3">Tugas Pokok</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_tugas_pokok']; ?></b> </h4>
          <h4 class="row"> <small class="col-lg-3">Atasan</small> <b class="col-lg-9 info-box-text"><?= $pgw['peg_atasan']; ?></b> </h4>
          <!-- <h4 class="row"> <small class="col-lg-3">Atasan Dari Atasan</small> <b class="col-lg-9 info-box-text"><?//= $pgw['atasan2']; ?></b> </h4> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>