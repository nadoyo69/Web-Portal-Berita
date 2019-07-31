<div class="super_container">
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4 text-white">Tags</h4>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <?php foreach ($tag as $tag) : ?>
                                <a href="<?= base_url()
                                                . 'tag/' .
                                                $tag['tag'] ?>">
                                    <button type="button" class="button fa fa-tags mt-1" style="color:#000">
                                        <?php echo $tag['tag'] ?>
                                    </button>
                                </a>
                            <?php endforeach ?>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4 text-white">Sosial Media</h4>
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
                <div class="col-md-4 mb-5 mb-lg-0 text-center">
                    <h4 class="text-uppercase mb-4 text-white">FCK</h4>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="text-white" href="<?= base_url() ?>kontak">
                                <button type="button" class="button" style="color:#000">
                                    <strong>Kontak</strong>
                                </button>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-white" href="<?= base_url() ?>arsip.txt">
                                <button type="button" class="button" style="color:#000">
                                    <strong>Arsip</strong>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
        <div class="container">
            Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> By <a style="color:#17a2b8" href="<?= base_url() ?>" target="_blank">FCK</a>
        </div>
    </div>
</div>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
<script src="<?php echo base_url() ?>assets/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
</body>

</html>