<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="<?php echo config('meta_description') ?>" />
        <meta name="author" content="Marwa El-Manawy <marwa@elmanawy.info>" />
        <link rel="shortcut icon" href="<?php echo config('favicon') ?>" type="image/x-icon" />
        <title><?php echo config('title') ?> - Login</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
        <link href="<?php echo STYLE_JS ?>/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_CSS ?>/animate.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_CSS ?>/style.css" rel="stylesheet" />
        <script src="<?php echo STYLE_JS ?>/plugins/pace/pace.min.js"></script>
    </head>
    <body class="pace-top">
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <div id="page-container" class="fade page-container">
            <div class="login">
                <div class="login-brand bg-inverse text-white">
                     Login Panel
                </div>
                <div class="login-content">
                    <h4 class="text-center m-t-0 m-b-20">Lets get started!</h4>
                    <?php if (validation_errors()): ?>
                    <div class="alert alert-danger"><?php echo validation_errors() ?></div>
                    <?php endif ?>
                    <?php echo form_open(false, 'class="form-input-flat"') ?>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Email Address" name="email" value="<?php echo set_value('email') ?>" />
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Password" name="password" />
                        <i class="fa fa-key"></i>
                    </div>
                    <div class="row m-b-20">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lime btn-lg btn-block"><i class="fa fa-sign-in"></i> Sign in to your account</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>   
                </div>
            </div>
        </div>


        <script src="<?php echo STYLE_JS ?>/plugins/jquery/jquery-1.9.1.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo STYLE_JS ?>/demo.js"></script>
        <script src="<?php echo STYLE_JS ?>/apps.js"></script>
        <script>
            $(document).ready(function () {
                App.init();
                Demo.initThemePanel();
            });
        </script>
    </body>
</html>