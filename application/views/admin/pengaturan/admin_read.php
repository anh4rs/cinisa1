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
        <h2 style="margin-top:0px">Admin Read</h2>
        <table class="table">
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Kecamatan Id</td><td><?php echo $kecamatan_id; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>