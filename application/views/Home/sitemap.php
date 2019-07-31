<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url(); ?></loc>
        <priority>1.0</priority>
    </url>

    <!-- My code is looking quite different, but the principle is similar -->
    <?php foreach ($beritasite as $url) { ?>
        <url>
            <loc><?= base_url() . 'blog/' . $url->slug ?></loc>
            <priority>0.5</priority>
        </url>
    <?php } ?>

</urlset>