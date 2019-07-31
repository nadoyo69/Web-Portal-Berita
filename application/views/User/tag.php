<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tags"></i> Tags
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="box-body table-responsive no-padding">
                    <div class="col-xs-12 box box-primary mt-3">
                        <h4>Daftar Tags</h4>

                        <table class="table table-hover">
                            <tr>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($tags as $tgs) : ?>
                            <tr>
                                <td><?php echo $tgs['tag'] ?></td>
                                <?php if ($role == ROLE_ADMIN) { ?>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() . "user/deletetag/" . $tgs['idtag'];  ?>"><i class="fa fa-trash"></i></a>
                                </td>
                                <?php 
                            } ?>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <small class="text-red">Hanya Admin Yang bisa Hapus Tag*</small>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xs-12 box box-primary mt-3">
            <div class="container">
                <h4>Tambah Tags</h4>
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php 
            } ?>
                <?php 
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php 
            } ?>
                <form role="form" id="addUser" action="<?php echo base_url() ?>newtag" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2">Tags</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control required" placeholder="Enter Tags" name="tag">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script> 