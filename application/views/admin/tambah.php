<!-- ==============================================
Konten (isi)
=============================================== -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambahkan Pengguna
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
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header box-solid with-border bg-gray">
            <h3 class="box-title">Masukan Data Pengguna</h3>
          </div>

          <form action="<?= base_url(); ?>admin/tambah" method="post" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label for="nip" class="col-sm-3 control-label">N I P</label>
                <div class="col-sm-9">
                  <input name="nip" type="text" class="form-control" id="nip" placeholder="Masukan NIP.." required>
                  <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

               <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama.." required>
                  <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="pangkat" class="col-sm-3 control-label">Pangkat</label>
                <div class="col-sm-9">
                  <input name="pangkat" type="text" class="form-control" id="pangkat" placeholder="Masukan Pangkat.." required>
                  <?= form_error('pangkat', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="unit_kerja" class="col-sm-3 control-label">Unit Kerja</label>
                <div class="col-sm-9">
                  <input name="unit_kerja" type="text" class="form-control" id="unit_kerja" placeholder="Masukan Unit Kerja.." required>
                  <?= form_error('unit_kerja', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-9">
                  <input name="jabatan" type="text" class="form-control" id="jabatan" placeholder="Masukan Jabatan.." required>
                  <?= form_error('jabatan', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="atasan1" class="col-sm-3 control-label">Atasan Lansung</label>
                <div class="col-sm-9">
                  <input name="atasan1" type="text" class="form-control" id="atasan1" placeholder="Masukan Nama Atasan Lansung.." required>
                  <?= form_error('atasan1', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="atasan2" class="col-sm-3 control-label">Atasan dari Atasan Langsung</label>
                <div class="col-sm-9">
                  <input name="atasan2" type="text" class="form-control" id="atasan2" placeholder="Masukan Nama Atasan dari Atasan Lansung.." required>
                  <?= form_error('atasan2', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="tugas_pokok" class="col-sm-3 control-label">Tugas Pokok</label>
                <div class="col-sm-9">
                  <input name="tugas_pokok" type="text" class="form-control" id="tugas_pokok" placeholder="Masukan Tugas Pokok.." required>
                  <?= form_error('tugas_pokok', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="kata_sandi" class="col-sm-3 control-label">Kata Sandi</label>
                <div class="col-sm-9">
                  <input name="kata_sandi" type="text" class="form-control" id="kata_sandi" value="infokom">
                  <?= form_error('kata_sandi', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Status Pengguna</label>
                <div class="col-sm-9">
                  <input type="radio" id="member" name="status" class="custom-control-input1" value="0" checked>
                  <label class="custom-control-label" for="member" style="margin-right: 40px">Pegawai</label>
                  <input type="radio" id="admin" name="status" class="custom-control-input1" value="1">
                  <label class="custom-control-label" for="admin">Admin</label>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
