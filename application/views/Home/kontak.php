<div class="body">
    <div class="container mt-3">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#076b7a" href="<?= base_url() ?>"><strong>Home</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>

        <div class="card cardbody p-3 mb-5">
            <h2>Kontak</h2>
            <hr>
            <p>Terima kasih banyak kepada teman-teman yang sudah berkunjung di <a href="<?= base_url() ?>" target="_blank">FCK</a>. Jika ada Kekurangan dalam Website ini silahkan beritahu kami dengan cara komentar pada konten kami. Untuk teman-teman yang ingin menghubungi kami untuk tujuan bertanya atau untuk hal lainnya. teman-teman bisa mengirimkan pesan ke email :</p>
            <ol style="list-style-type: disc;padding:30px">
                <li class="uppercase">FCK</li>
            </ol>
            <h4>Sosial Media :</h4>
            <br>
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a target="_blank" class="btn btn-outline-light btn-social text-center rounded-circle" href="">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a target="_blank" class="btn btn-outline-light btn-social text-center rounded-circle" href="">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a target="_blank" class="btn btn-outline-light btn-social text-center rounded-circle" href="">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a target="_blank" class="btn btn-outline-light btn-social text-center rounded-circle" href="">
                        <i class="fa fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-columns">
            <?php foreach ($berita as $brt) : ?>
                <div class="card cards">
                    <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                        <img class="card-img-atas" src="<?php echo $brt['foto'] ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                            <h5 class="card-title" style="color:#fff;"><?php echo $brt['judul']; ?> </h5>
                        </a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><i class="fa fa-user-circle-o" aria-hidden="true"> <?= $brt['nama'] ?> || </i> <a style="color:#fff;" href="<?= base_url()
                                                                                                                                                                    . 'tag/' .
                                                                                                                                                                    $brt['jenis'] ?>"> <i class="fa fa-tags" aria-hidden="true"> <?= $brt['jenis'] ?></i></a> || <i class="fa fa-calendar-times-o" aria-hidden="true"> <?= $brt['tanggal'] ?></i></small>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>