<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo config('title') ?></title>
        <meta name="author" content="Marwa El-Manawy <marwa@elmanawy.info>" />
        <meta name="description" content="<?php echo config('meta_description') ?>">
        <meta name="Keywords" content="<?php echo config('meta_keywords') ?>">
       	<link rel="shortcut icon" href="<?php echo base_url() ?>cdn/<?php echo config('favicon') ?>" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo STYLE_CSS ?>/plugins.css">
        <link rel="stylesheet" href="<?php echo STYLE_CSS ?>/font-awesome.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300%7cPoppins:400,300,500,700,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo STYLE_CSS ?>/main.css">
        <script src="<?php echo STYLE_JS ?>/lib/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper animsition" >
            {layout}
        </div>

        <script src="<?php echo STYLE_JS ?>/lib/jquery.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/lib/scripts.js"></script>
        <script>
            $(document).ready(function () {
                var classes = ['wide', 'tall', 'tall wide'];
                $('.grid.albums .grid-item').each(function (i) {
                    $(this).addClass(
                            classes[Math.floor(Math.random() * classes.length)]);
                });
            });

        </script>
        <script src="<?php echo STYLE_JS ?>/main.js"></script>
    </body>
</html>