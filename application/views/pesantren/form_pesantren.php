<div class="content-wrapper">
    <div class="content-header">
        <div class="content-fluid">
            <h2 style="margin-top:0px col-8">Tambah Pesantren</h2>
            <div style="margin-bottom: 10px">
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message alert alert-success">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
                <label for="varchar">Kabupaten <?php echo form_error('id_kabupaten') ?></label>
                <select class="form-control" name="id_kabupaten" id="id_kabupaten" required>
                    <option value="">--Pilih Kabupaten--</option>
                    <?php foreach ($kabupaten as $get) { ?>
                        <option value="<?= $get->id_kabupaten; ?>" <?= $id_kabupaten == $get->id_kabupaten ? "selected" : "" ?>><?= $get->nama_kabupaten; ?>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                <select class="form-control" name="id_kecamatan" id="id_kecamatan" required>

                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Link Pesantren <?php echo form_error('link_pesantren') ?></label>
                <input type="text" class="form-control" name="link_pesantren" id="link_pesantren" placeholder="Link Pesantren" value="<?php echo $link_pesantren; ?>" />
            </div>
            <input type="hidden" name="id_pesantren" value="<?php echo $id_pesantren; ?>" />
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            <a href="<?php echo site_url('pesantren') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
    <script>
        $('#id_kabupaten').change(function() {
            var kabupaten = $(this).val();
            $.ajax({
                type: 'get',
                url: '<?php echo site_url('pesantren/data_kecamatan') ?>?id=' + kabupaten,
                success: function(data) {
                    $('#id_kecamatan').html(data);
                }

            })
        })
    </script>
</div>
</body>