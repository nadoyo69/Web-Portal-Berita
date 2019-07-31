<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-upload"></i> Tambah Berita
        </h1>
    </section>

    <section class="content">
        <div class="col-xs-12 box box-primary mt-3">
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

            <div class="row">
                <div class="col-md-12">
                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                </div>
            </div>
            <?php $this->load->helper("form"); ?>
            <form role="form" id="addUser" action="<?php echo base_url() ?>newupload" enctype="multipart/form-data" method="post">
                <div class="form-group row">
                    <label class="col-sm-2">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control required" placeholder="Judul" name="judul">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control required" readonly name="nama" value="<?php echo $name; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control required" name="jenis">
                            <?php foreach ($tags as $tgs) : ?>
                                <option><?php echo $tgs['tag'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Foto Sampul</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control required" name="foto">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Isi Berita</label>
                    <div class="col-lg-10">
                        <textarea id="editor1" name="isi"></textarea>
                        <small class="text-red">class="img-fluid" alt="Responsive image"</small>
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
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>newupload',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    alert("Upload Image Successful.");
                }
            });
        });


    });
</script>