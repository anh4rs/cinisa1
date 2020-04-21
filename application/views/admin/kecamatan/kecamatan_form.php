<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Kecamatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kecamatan</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $button == "Create" ? 'Tambah' : 'Edit' ?> data kecamatan </h3>
            <div class="pull-right">
              <a href="<?= site_url('sembako') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <form action="<?php echo $action; ?>" method="post">
                  <div class="form-group">
                    <label for="varchar">Nama Kecamatan <?php echo form_error('kecamatan_nama') ?></label>
                    <input type="text" class="form-control" name="kecamatan_nama" id="kecamatan_nama" placeholder="Kecamatan Nama" value="<?php echo $kecamatan_nama; ?>" />
                  </div>
                  <input type="hidden" name="kecamatan_id" value="<?php echo $kecamatan_id; ?>" />
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