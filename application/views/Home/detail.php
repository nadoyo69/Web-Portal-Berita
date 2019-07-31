<div class="body">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card cardbody p-3 mb-5" style="border-radius: 0;">
                    <h2 class="font-weight-bold"><?= $detailberita['judul']; ?></h2>
                    <br>
                    <h6 class="mt-1"> <span class="fa fa-calendar-times-o badge badge-info"> <?= $detailberita['tanggal']; ?></span> <span class="fa fa-user-circle-o badge badge-info"> <?php echo $detailberita['nama'] ?> </span> <span class="fa fa-tags badge badge-info"><a class="text-white" href="<?= base_url()
                                                                                                                                                                                                                                                                                                                . 'tag/' .
                                                                                                                                                                                                                                                                                                                $detailberita['jenis'] ?>"> <?php echo $detailberita['jenis'] ?></a></span></h6>
                    <hr>
                    <div class="text-center">
                        <img src="<?= $detailberita['foto'] ?>" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="container card-title">
                        <p><?= $detailberita['isi']; ?></p>
                    </div>
                </div>

                <div class="card shadow cardbody p-3 mb-5">
                    <h3 style="color:#fff;">Share halaman ini :</h3>
                    <hr>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_google_plus"></a>
                        <a class="a2a_button_linkedin"></a>
                        <a class="a2a_button_pinterest"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_instagram"></a>
                        <a class="a2a_button_telegram"></a>
                    </div>
                </div>

                <div class="card cardbody shadow p-3 mb-5">
                    <h3 style="color:#fff;">Artikel Terkait :</h3>
                    <hr>
                    <div class="card-columns" style="border-radius: 0;">
                        <?php foreach ($beritabawah as $brt) : ?>
                            <div class="card cards">
                                <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                                    <img class="card-img-bawah" src="<?php echo $brt['foto'] ?>" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                                        <h5 class="card-title" style="color:#fff;"><?php echo $brt['judul']; ?> </h5>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="card cardbody shadow p-3 mb-5">
                    <div>
                        <h3 style="color:#fff;">Tulis Komentar / Pertanyaan</h3>
                        <small style="color:#17a2b8;">Your email address will not be published. Required fields are marked *</small>
                        <hr>
                        <form enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="color:#fff;">Nama <i style="color:#17a2b8;">*</i></label>
                                <div class="col-sm-10">
                                    <input type="Nama" class="form-control" placeholder="Nama" required name="nama" style="border-radius: 0;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="color:#fff;">Email <i style="color:#17a2b8;">*</i></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" required name="email" style="border-radius: 0;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" style="color:#fff;">Website</label>
                                <div class="col-sm-10">
                                    <input type="tetx" class="form-control" placeholder="Website" name="website" style="border-radius: 0;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 " style="color:#fff;">Pesan Untuk Kami <i style="color:#17a2b8;">*</i></div>
                                <div class="col-sm-10">
                                    <textarea name="isi" class="form-control" name="isi" cols="20" rows="5" style="border-radius: 0;" required placeholder="Silahkan isi disini"></textarea>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="button">Kirim Komentar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card cardbody shadow p-3 mb-5">
                    <div class="card-header">
                        <h3 class="text-center" style="color:#fff;">Artikel Terbaru</h3>
                    </div>
                    <hr>
                    <div class="card-body">
                        <?php foreach ($beritasamping as $brt) : ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>"><img class="img-fluid img-thumbnail pictsamping cards" alt="Responsive image" src="<?php echo $brt['foto'] ?>"></a>
                                </div>
                                <div class="col-md-8">
                                    <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                                        <h5 style="color:#fff;"><?php echo $brt['judul'] ?></h5>
                                    </a>
                                </div>
                                <hr>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="card cardbody">
                    <div class="card-header">
                        <h3 class="text-center" style="color:#fff;">Kategori</h3>
                    </div>
                    <hr>
                    <div class="card-body">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <?php
                                foreach ($grafik as $data) :
                                    ?>
                                    <a href="<?= base_url() . "/tag/" . $data->jenis ?>">
                                        <button type="button" class="button fa fa-tags mt-1">
                                            <?= $data->jenis ?> <span class="badge badge-dark badge-pill"><?= $data->total ?></span>
                                        </button>
                                    </a>
                                <?php endforeach ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>

                <div class="text-center">
                    <div class="fb-page" data-href="" data-width="330" data-hide-cover="false" data-show-facepile="false">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>