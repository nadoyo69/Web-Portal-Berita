<div class="body">
    <div class="container mt-3 text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arsip</li>
            </ol>
        </nav>
        <table class="table">
            <thead class="text-info">
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Judul</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($berita as $brt) : ?>
                <tr>
                    <td class="text-white"><?php echo $brt['tanggal']; ?> </td>
                    <td>
                        <a href="<?php echo base_url() . 'blog/' . $brt['slug'] ?>">
                            <?php echo $brt['judul']; ?>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button> 