    <div class="content-wrapper">
        <div class="content-header">
            <div class="content-fluid">
                <h2 style="margin-top:0px">File OPOP</h2>
                <div style="margin-bottom: 10px">
                    <div class="col-12"><br><br>
                        <?php echo anchor(site_url('file/create'), 'Upload File', 'class="btn btn-primary"'); ?>
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
                        <form action="<?php echo site_url('file'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('file'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Nama File</th>
                                <th>Ukuran File</th>
                                <th>Tanggal Upload</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($file_data as $file) {
                            $tanggal = $file->uploaded_at;
                            $newDate = date("d-m-Y H:i:s", strtotime($tanggal));

                            $size_file = $file->size;
                        ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $file->judul ?></td>
                                <td><?php echo $file->nama_file ?></td>
                                <td><?php if ($size_file <= 1000) {
                                        echo $size_file . ' KB'; ?>
                                    <?php
                                    } else if ($size_file >= 1000) {
                                        $size_file = $size_file / 1000;
                                        echo round($size_file, 2) . ' MB';
                                    }
                                    ?></td>
                                <td><?php echo $newDate ?></td>
                                <td>
                                    <a href="<?= base_url('uploads/file/opop/' . $file->nama_file); ?>" class="btn btn-block btn-primary btn-sm">Download</a>
                                    <a href="<?= site_url('file/update/' . $file->id_file); ?>" class="btn btn-block btn-warning btn-sm">Update</a>
                                    <a href="<?= site_url('file/delete/' . $file->id_file); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')" class="btn btn-block btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Jumlah File : <?php echo $total_rows ?></a>
            </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    </body>