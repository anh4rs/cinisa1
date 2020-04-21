<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Harga Read</h2>
        <table class="table">
	    <tr><td>Kecamatan Id</td><td><?php echo $kecamatan_id; ?></td></tr>
	    <tr><td>Pasar Id</td><td><?php echo $pasar_id; ?></td></tr>
	    <tr><td>Sembako Id</td><td><?php echo $sembako_id; ?></td></tr>
	    <tr><td>Nama Bahan</td><td><?php echo $nama_bahan; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Harga Borongan</td><td><?php echo $harga_borongan; ?></td></tr>
	    <tr><td>Harga Eceran</td><td><?php echo $harga_eceran; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('harga') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>