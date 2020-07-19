<div class="content-wrapper">
    <div class="content-header">
        <div class="content-fluid">
            <h2 style="margin-top:0px">Data Pesantren</h2>
            <div style="margin-bottom: 10px">
                <div class="col-12"><br><br>
                    <?php echo anchor(site_url('pesantren/create'), 'Tambah Data Pesantren', 'class="btn btn-primary"'); ?>
                    <?php echo anchor(site_url('pesantren/excel'), 'Export ke Excel', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message alert alert-success">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <form action="<?php echo site_url('pesantren'); ?>" class="form-inline" method="get">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="q" class="form-control float-right" placeholder="Cari Pesantren" value="<?php echo $q; ?>">
                            <div class="input-group-append">
                                <?php
                                if ($q <> '') {
                                ?>
                                    <a href="<?php echo site_url('pesantren'); ?>" class="btn btn-default">Reset</a>
                                <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pesantren</th>
                            <th>Alamat</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Link Pesantren</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($pesantren_data as $pesantren) {
                    ?>
                        <tbody>
                            <tr class="<?= $start % 2 == 0 ? '' : 'odd' ?>">
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $pesantren->nama_pesantren ?></td>
                                <td><?php echo $pesantren->alamat ?></td>
                                <td><?php echo $pesantren->nama_kabupaten ?></td>
                                <td><?php echo $pesantren->nama_kecamatan ?></td>
                                <td><a href="<?= $pesantren->link_pesantren; ?>"><?= $pesantren->link_pesantren; ?></td>
                                <td style="text-align:center" width="200px">
                                    <a href="<?= site_url('pesantren/update/' . $pesantren->id_pesantren); ?>" class="btn btn-block btn-warning btn-sm">Update</a>
                                    <a href="<?= site_url('pesantren/delete/' . $pesantren->id_pesantren); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-block btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php
                    }
                        ?>
                        </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="row col-12">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary">Jumlah Pesantren : <?php echo $total_rows ?></a>
        </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>
</body>