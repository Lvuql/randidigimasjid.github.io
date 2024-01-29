<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Halaman Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-box">
                <h3 class="text-center mt-0 m-b-15">
                    <h4>
                        <center>
                            Login <img src="" alt="">
                        </center>
                    </h4>
                </h3>
                <?php
                if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <div class="p-3">
                    <form action="/login/ceklogin" class="form-horizontal m-t-20" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" name="username" id="username" required="" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" name="password" id="username" required="" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block waves-effect wafes-light">
                                    Log In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>