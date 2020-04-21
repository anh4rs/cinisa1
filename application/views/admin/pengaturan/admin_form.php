<div class="content-wrapper">
  <section class="content-header">
    <h1><small>Form</small> Admin
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Admin</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <form action="<?php echo $action; ?>" method="post">
      <div class="row">
        <div class="col-xs-9">
          <div class="box box-warning">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
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
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Foto <?php echo form_error('foto') ?></label>
                    <input type="file" name="foto" id="profile-img" class="form-control">
                    <div id="image_preview" style="display: block"></div>
                  </div>

                  <input type="hidden" name="username" value="<?php echo $username; ?>" />
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-3">
          <div class="box box-warning">
            <div class="box-body text-center">
              <button type="submit" class="btn btn-success btn-flat"><?= $button == "Create" ? 'Simpan' : 'Update' ?></button>
              <button type="reset" class="btn btn-default btn-flat">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>