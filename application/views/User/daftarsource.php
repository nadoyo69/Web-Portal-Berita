<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-newspaper-o"></i> Daftar Source Code
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Souce Code</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>daftarsource" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Judul</th>
                                <th>jenis</th>
                                <th>Uploader</th>
                                <th>Foto Sampul</th>
                                <th>Isi</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            if (!empty($daftarRecords)) {
                                foreach ($daftarRecords as $daftar) {
                                    ?>
                                    <tr>
                                        <td><?php echo substr($daftar->judul, 0, 20) ?>....</td>
                                        <td><?php echo $daftar->jenis ?></td>
                                        <td><?php echo $daftar->nama ?></td>
                                        <td><?php echo substr($daftar->foto, 0, 20) ?>....</td>
                                        <td><?php echo substr($daftar->isi, 0, 30) ?>....</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?= base_url() ?>Home/detail/<?= $daftar->slug; ?>" title="View" target=_blank><i class="fa fa-eye"></i></a> |
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editberita/' . $daftar->idberita; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . "user/deleteberita/" . $daftar->idberita; ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }
                        ?>
                        </table>

                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('ul.pagination li a').click(function(e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "daftar/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>