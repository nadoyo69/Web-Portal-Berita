<!DOCTYPE html>
<html>

<head>
    <title>Login Admin || FCk</title>
    <link rel="shortcut icon" href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="<?= base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css_login/style.css">
</head>

<body>

    <div class="container">
        <div class="card card-login mx-auto text-center">
            <div class="card-header mx-auto">
                <span class="logo_title mt-5">FCK</span>
                <h6>Silahkan Login Sesuai Username dan Password Anda</h6>
            </div>
            <div class="card-body">
                <?php $this->load->helper('form'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
                <?php
                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>
                    </div>
                <?php
                }
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>
                    </div>
                <?php
                } ?>
                <form action="<?php echo base_url(); ?>loginMe" method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="KodeOTP" name="otp" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="myInput" required />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <small class="text-white float-right"><input type="checkbox" onclick="myFunction()">Show Password</small>
                    <br>

                    <div class="form-group">
                        <input name="login" type="submit" value="Send" class="btn btn-outline-danger float-left login_btn">
                    </div>

                </form>
            </div>
            <div class="card-body">
                <h5 style="color:#fff">Back to <a style="color:#17a2b8" class="fa fa-home" href="<?= base_url() ?>Home"> Home</a></h5>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>