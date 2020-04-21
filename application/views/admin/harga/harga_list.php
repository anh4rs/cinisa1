<div class="content-wrapper">
  <section class="content-header">
    <h1> Daftar Harga
      <small>Referensi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">harga</li>
    </ol>
  </section>
  <br>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-header">
            <div class="row" style="margin-bottom: 10px">
              <div class="col-md-4">
                <?php echo anchor(site_url('harga/create'), '<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data Harga Barang', 'class="btn btn-primary"'); ?>
              </div>
              <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '' ?>
                </div>
              </div>
              <div class="col-md-1 text-right">
              </div>
              <div class="col-md-3 text-right">
                <form action="<?php echo site_url('harga/index'); ?>" class="form-inline" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                    <span class="input-group-btn">
                      <?php
                      if ($q <> '') {
                      ?>
                        <a href="<?php echo site_url('harga'); ?>" class="btn btn-default">Reset</a>
                      <?php
                      }
                      ?>
                      <button class="btn btn-primary" type="submit">Cari</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body ">
            <table class="table table-striped table-hover">
              <tbody>
                <tr>
                  <th style="width: 60px">#</th>
                  <th>Kecamatan</th>
                  <th>Nama Pasar</th>
                  <th>Nama Sembako</th>
                  <th>Nama Bahan</th>
                  <th>Satuan</th>
                  <th>Harga Borongan</th>
                  <th>Harga Eceran</th>
                  <th>Keterangan</th>
                  <th style="text-align:center" width="100px">Action</th>
                </tr>
                <?php
                if ($total_rows > 0) :
                  foreach ($harga_data as $harga) :
                ?>
                    <tr>
                      <td width="80px"><?php echo ++$start ?></td>
                      <td><?php echo $harga->kecamatan_id ?></td>
                      <td><?php echo $harga->pasar_id ?></td>
                      <td><?php echo $harga->sembako_id ?></td>
                      <td><?php echo $harga->nama_bahan ?></td>
                      <td><?php echo $harga->satuan ?></td>
                      <td><?php echo $harga->harga_borongan ?></td>
                      <td><?php echo $harga->harga_eceran ?></td>
                      <td><?php echo $harga->keterangan ?></td>
                      <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('harga/read/' . $harga->harga_id), '<i class="fa fa-list"></i> Read');
                        echo ' | ';
                        echo anchor(site_url('harga/update/' . $harga->harga_id), '<i class="fa fa-pencil-square-o"></i> Edit');
                        echo ' | ';
                        echo anchor(site_url('harga/delete/' . $harga->harga_id), '<i class="fa fa-trash-o"></i> Delete', array('onclick' => "return confirm(\'Yakin untuk hapus data ini ?\')"))
                        ?>
                      </td>
                    </tr>
                  <?php
                  endforeach;
                else :

                  ?>
                  <tr>
                    <td colspan="10">
                      <div class="callout callout-warning">
                        <h5>Data masih kosong!</h5>
                      </div>
                    </td>
                  </tr>

                <?php
                endif;
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <div class="col-md-6">
              <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            </div>
            <div class="col-md-6 text-right">
              <?php echo $pagination ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>