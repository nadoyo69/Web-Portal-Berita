<div class="body">
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#076b7a" href="<?= base_url() ?>"><strong>Home</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
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
    </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>