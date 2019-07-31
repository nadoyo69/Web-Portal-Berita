<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-newspaper-o"></i> Daftar berita
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Komen List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>komen" method="POST" id="searchList">
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Isi</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            if (!empty($komenRecords)) {
                                foreach ($komenRecords as $komen) {
                                    ?>
                            <tr>
                                <td><?php echo substr($komen->nama, 0, 20) ?>....</td>
                                <td><?php echo $komen->email ?></td>
                                <td><?php echo $komen->website ?></td>
                                <td><?php echo substr($komen->isi, 0, 20) ?>....</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . "user/deletekomen/" . $komen->idkomen; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php

                        }
                    }
                    ?>
                        </table>
                        <div>
                            <hr>
                            <h4>Hapus Semua Komentar <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . "user/deleteallkomen/" ?>"><i class="fa fa-trash"></i></a> </h4>
                        </div>
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
            jQuery("#searchList").attr("action", baseURL + "komen/" + value);
            jQuery("#searchList").submit();
        });
    });
</script> 