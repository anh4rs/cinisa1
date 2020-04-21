<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Pasar
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pasar</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $button == "Create" ? 'Tambah' : 'Edit' ?> data pasar </h3>
            <div class="pull-right">
              <a href="<?= site_url('sembako') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <form action="<?php echo $action; ?>" method="post">
                  <div class="form-group">
                    <label for="varchar">Nama Pasar <?php echo form_error('pasar_nama') ?></label>
                    <input type="text" class="form-control" name="pasar_nama" id="pasar_nama" placeholder="Pasar Nama" value="<?php echo $pasar_nama; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="int">Nama Kecamatan <?php echo form_error('kecamatan_id') ?></label>
                    <select class="form-control" name="kecamatan_id">
                      <option value="">-- Pilih Kecamatan -- </option>
                      <?php
                      foreach ($kecamatans as $kecamatan) {
                      ?>
                        <option value="<?= $kecamatan->kecamatan_id ?>" <?= $kecamatan->kecamatan_id == $kecamatan_id ? 'selected' : '' ?>><?= $kecamatan->kecamatan_nama; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Lokasi Pasar <?php echo form_error('pasar_lokasi') ?></label>
                    <input type="text" class="form-control" name="pasar_lokasi" id="pasar_lokasi" placeholder="Pasar Lokasi" value="<?php echo $pasar_lokasi; ?>" />
                  </div>
                  <input type="hidden" name="pasar_id" value="<?php echo $pasar_id; ?>" />
                  <button type="submit" class="btn btn-success btn-flat"><?= $button == "Create" ? 'Simpan' : 'Update' ?></button>
                </form>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
</div>
</section>