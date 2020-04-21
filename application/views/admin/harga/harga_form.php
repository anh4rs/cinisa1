<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form </small> Tambah Harga
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Harga</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-header with-border">
            <h3 class="box-title"><?= $button == "Create" ? 'Tambah' : 'Edit' ?> data harga </h3>
            <div class="pull-right">
              <a href="<?= site_url('harga') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <form action="<?php echo $action; ?>" method="post">
                  <div class="form-group">
                    <label for="int">Nama Kecamatan <?php echo form_error('kecamatan_id') ?></label>
                    <select class="form-control" name="kecamatan_id" id="kecamatan_id">
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
                    <label for="int">Nama Pasar <?php echo form_error('pasar_id') ?></label>
                    <select class="form-control" name="pasar_id" id="pasar_id">
                      <option value="">-- Pilih Pasar -- </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="int">Nama Komoditi <?php echo form_error('sembako_id') ?></label>
                    <select class="form-control" name="sembako_id">
                      <option value="">-- Pilih Komoditi -- </option>
                      <?php
                      foreach ($sembakos as $sembako) {
                      ?>
                        <option value="<?= $sembako->sembako_id ?>" <?= $sembako->sembako_id == $sembako_id ? 'selected' : '' ?>><?= $sembako->sembako_nama; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Nama Barang <?php echo form_error('nama_bahan') ?></label>
                    <input type="text" class="form-control" name="nama_bahan" id="nama_bahan" placeholder="Nama Barang" value="<?php echo $nama_bahan; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Satuan <?php echo form_error('satuan') ?></label>
                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="int">Harga Borongan <?php echo form_error('harga_borongan') ?></label>
                    <input type="text" class="form-control" name="harga_borongan" id="harga_borongan" placeholder="Harga Borongan" value="<?php echo $harga_borongan; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="int">Harga Eceran <?php echo form_error('harga_eceran') ?></label>
                    <input type="text" class="form-control" name="harga_eceran" id="harga_eceran" placeholder="Harga Eceran" value="<?php echo $harga_eceran; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="3" class="form-control"><?php echo $keterangan; ?></textarea>
                  </div>                  
                  <div class="form-group">
                    <label for="varchar">Tanggal Input</label>
                    <input type="date" class="form-control" name="waktu" id="waktu" placeholder="Harga Eceran" value="<?php echo date('Y-m-d'); ?>" />                  
                  </div>
                  <input type="hidden" name="harga_id" value="<?php echo $harga_id; ?>" />
                  <button type="submit" class="btn btn-success btn-flat"><?= $button == "Create" ? 'Simpan' : 'Update' ?></button>
                  <button type="reset" class="btn btn-default btn-flat">Reset</button>
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