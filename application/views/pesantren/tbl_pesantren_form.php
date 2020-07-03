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
        <h2 style="margin-top:0px">Tbl_pesantren <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Pesantren <?php echo form_error('nama_pesantren') ?></label>
            <input type="text" class="form-control" name="nama_pesantren" id="nama_pesantren" placeholder="Nama Pesantren" value="<?php echo $nama_pesantren; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Id Kabupaten <?php echo form_error('id_kabupaten') ?></label>
            <input type="text" class="form-control" name="id_kabupaten" id="id_kabupaten" placeholder="Id Kabupaten" value="<?php echo $id_kabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Kecamatan <?php echo form_error('id_kecamatan') ?></label>
            <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Id Kecamatan" value="<?php echo $id_kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Produk <?php echo form_error('produk') ?></label>
            <input type="text" class="form-control" name="produk" id="produk" placeholder="Produk" value="<?php echo $produk; ?>" />
        </div>
	    <input type="hidden" name="id_pesantren" value="<?php echo $id_pesantren; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pesantren') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>