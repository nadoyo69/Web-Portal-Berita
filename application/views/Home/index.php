<div class="body">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/3.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="jumb">
        <div class="newcard-columns">
            <div class="newcard">
                <div class="mt-2 px-2">
                    <div class="card-block">
                        <h4 class="card-title text-uppercase" style="color:#000">Welcome to FCK</h4>
                        <p class="card-text">FCK merupakan website yang berisi konten tentang dunia IT.</p>
                    </div>
                </div>
            </div>
            <div class="newcard">
                <div class="mt-2 px-2">
                    <div class="card-block">
                        <h4 class="card-title text-uppercase" style="color:#000">Isi Konten</h4>
                        <p class="card-text">FCK menyediakan konten yang jelas dan simple untuk membantu anda mencari ilmu tentang dunia IT.</p>
                    </div>
                </div>
            </div>
            <div class="newcard">
                <div class="mt-2 px-2">
                    <div class="card-block">
                        <h4 class="card-title text-uppercase" style="color:#000">FCK</h4>
                        <p class="card-text">Selamat Membaca, jangan lupa isi komentar anda di bawah konten kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container mt-3" id="about">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?php echo base_url() ?>assets/images/index.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-lg-6">
                <p class="text-justify text-white">Teknologi Informasi adalah suatu studi perancangan, implementasi, pengembangan, dukungan atau manajemen sistem informasi berbasis komputer, khususnya perangkat keras (hardware) dan perangkat lunak (software).</p>
                <p class="text-justify text-white">Menurut Wikipedia, pengertian teknologi informasi (TI) secara bahasa merupakan istilah dalam bidang teknologi apapun dalam kehidupan manusia yang bermanfaat untuk mengubah, membantu, mengkomunikasikan, menyimpan dan menyebarkan informasi.</p>
                <p class="text-justify text-white">TI menyatukan komputasi dan komunikasi berkecepatan tinggi untuk data, suara, dan video. Contoh dari Teknologi Informasi bukan hanya berupa komputer pribadi, tetapi juga telepon, TV, peralatan rumah tangga elektronik, dan peranti genggam modern (misalnya ponsel).</p>
            </div>
        </div>
    </section>
    <hr><br><br>
    <div class="container mt-3">
        <div class=text-center>
            <h2 class="text-uppercase text-white">Artikel Terbaru</h2>
            <p class="text-uppercase text-white">------------------------------<i class="fa fa-star-o" aria-hidden="true"></i>-------------------------------</p>
        </div>
        <br>
        <br>
        <div class="card-columns">
            <?php foreach ($berita as $brt) : ?>
                <div class="card cards">
                    <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                        <img class="card-img-atas" style="border-radius: 0;" src="<?php echo $brt['foto'] ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url() ?>blog/<?= $brt['slug']; ?>">
                            <h5 class="card-title"><?php echo $brt['judul']; ?> </h5>
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
        <div class="text-center">
            <a class="text-white" href="<?php echo base_url() ?>blog">
                <div class="flat-button">View More</div>
            </a>
        </div>
    </div>

</div>