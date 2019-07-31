<?php
$idberita = $berita->idberita;
$judul = $berita->judul;
$nama = $berita->nama;
$jenis = $berita->jenis;
$foto = $berita->foto;
$isi = $berita->isi;
?>
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
            <form role="form" action="<?php echo base_url() ?>editdaftarberita" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="hidden" value="<?php echo $idberita; ?>" name="idberita" id="idberita" />
                        <input type="text" class="form-control required" value="<?php echo $judul; ?>" name="judul">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control required" readonly name="nama" value="<?php echo $nama; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Jenis</label>
                    <div class="col-sm-10">
                        <select class="form-control required" name="jenis">
                            <option><?php echo $jenis; ?></option>
                            <?php foreach ($tags as $tgs) : ?>
                                <option><?php echo $tgs['tag'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Foto Sampul</label>
                    <div class="col-sm-10">
                        <p> <img src="<?php echo $foto; ?>" width="75" height="75" /></p>
                        <input type="file" class="form-control required" name="foto" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2">Isi Berita</label>
                    <div class="col-lg-10">
                        <textarea id="editor1" name="isi"><?php echo $isi; ?></textarea>
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