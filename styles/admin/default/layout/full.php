<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Era Biz Solution <marwa@elmanawy.info>" />
        <link rel="shortcut icon" href="<?php echo base_url() ?>cdn/<?php echo config('favicon') ?>" type="image/x-icon" />
        <title><?php echo config('title') ?></title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />
        <link href="<?php echo STYLE_JS ?>/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_CSS ?>/animate.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_CSS ?>/style.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />	
        <link href="<?php echo STYLE_JS ?>/plugins/summernote/dist/summernote.css" rel="stylesheet" />
        <script src="<?php echo STYLE_JS ?>/plugins/pace/pace.min.js"></script>
        <link href="<?php echo STYLE_JS ?>/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo STYLE_JS ?>/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
        <script src="<?php echo STYLE_JS ?>/plugins/jquery/jquery-1.9.1.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.stack.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.crosshair.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/jquery.flot.categories.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/flot/CurvedLines/curvedLines.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="<?php echo STYLE_JS ?>/page-index.demo.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/page-index.demo.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/DataTables/media/js/jquery.dataTables.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/page-table-manage.demo.min.js"></script>
        <script src="<?php echo STYLE_JS ?>/demo.js"></script>
        <script src="<?php echo STYLE_JS ?>/apps.js"></script>

        <script>
            $(document).ready(function () {
                App.init();
                Demo.init();
                PageDemo.init();
            });
        </script>
    </head>
    <body>
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="<?php echo site_url('admin/dashboard') ?>" class="navbar-brand"><img src="<?php echo base_url() ?>cdn/<?php echo config('logo') ?>" class="logo" alt="<?php echo config('title') ?>" /></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown navbar-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="image"><img src="<?php echo base_url() ?>/cdn/users/<?php echo session('image') ?>" alt="<?php echo session('username') ?>" /></span>
                                <span class="hidden-xs"><?php echo session('username') ?></span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo site_url('admin/users/manage/' . session('user_id')) ?>"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                                <li><a href="<?php echo site_url('admin/logout') ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="sidebar" class="sidebar">
                <div data-scrollbar="true" data-height="100%">
                    <ul class="nav">
                        <li class="nav-user">
                            <div class="image">
                                <img src="<?php echo base_url() ?>/cdn/users/<?php echo session('image') ?>" alt="" />
                            </div>
                            <div class="info">
                                <div class="name dropdown">
                                    <a href="#" data-toggle="dropdown"><?php echo session('username') ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('admin/users/manage/' . session('user_id')) ?>"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                                        <li><a href="<?php echo site_url('admin/logout') ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </div>
                                <div class="position">Administrator</div>
                            </div>
                        </li>

                        <li>
                            <a href="<?php echo site_url('admin/userdetails') ?>">
                                <i class="fa fa-users"></i>
                                <span>Form Details</span>
                            </a>
                        </li> 
                        <li>
                            <a href="<?php echo site_url('admin/users') ?>">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>                    

                    </ul>
                </div>
            </div>
            <div class="sidebar-bg"></div>

            <div id="content" class="content">
                {layout}

                <div id="footer" class="footer">
                    <span class="pull-right">
                        <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
                            <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
                        </a>
                    </span>
                    &copy; <?=date('yy')?> <a href="http://erabizsolution.com">Era Biz Solution</a>  All Right Reserved
                </div>
            </div>
        </div>


    </body>
</html>