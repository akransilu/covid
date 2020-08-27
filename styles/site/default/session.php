<header id="header" class="has-border">
    <a href="<?php echo site_url() ?>" class="logo">
        <img src="<?php echo base_url() ?>cdn/<?php echo config('logo') ?>" alt="<?php echo config('title') ?> - Logo">
    </a>
    <a href="#" class="mob-menu"><i class="fa fa-bars"></i></a>
    <nav>
        <ul class="main-menu">
            <li><a href="<?php echo site_url() ?>">home</a> </li>
            <li><a href="<?php echo site_url('aboutme') ?>">About Me</a></li>
            <li><a href="<?php echo site_url('albums') ?>">Albums</a></li>
            <li><a href="<?php echo site_url('journal') ?>">Journal</a></li>
            <li><a href="<?php echo site_url('packages') ?>">Packages</a></li>
            <li><a href="<?php echo site_url('home/contactme') ?>">Say Hello !</a></li>

        </ul>
    </nav>
</header>
<div class="container fullwidth equal-height-cols">
    <div class="row">
        <?php if ($item->video_link): ?>
            <div class="col-md-6">
                <iframe width="100%" height="100%" src="<?php echo str_replace('watch?v=', 'embed/', $item->video_link); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <div class="col-md-6" data-background="<?php echo base_url() ?>/cdn/sessions/<?php echo $item->image ?>"></div>
        <?php endif ?>

        <div class="col-md-6 bg-dark text-light p100 pt140 pb140">
            <h1 class="title"><?php echo $item->title ?></h1>
            <p><i class="fa fa-folder-open-o"></i> <?php echo $item->category ?></p>
            <p class="separator-left"></p>
            <p>
                <?php echo $item->description ?>
            </p>
        </div>
    </div>
</div>
<div class="container text-center">
    <h3 class="title mt90">Session Gallery</h3>
    <p class="separator mb60"></p>
    <?php if (json_decode($item->gallery)): ?>
        <div class="grid gallery mt20 mb90" data-gutter="5" data-columns="4">
            <?php foreach (json_decode($item->gallery) as $img): ?>
                <div class="grid-item">
                    <a href="<?php echo base_url() ?>/cdn/sessions/<?php echo $img ?>" data-background="<?php echo base_url() ?>/cdn/sessions/<?php echo $img ?>" data-rel="lightcase:gal" title="<?php echo $item->title ?>"></a>
                </div>
            <?php endforeach ?>
        </div>	
    <?php else: ?>
        <div class="grid gallery mt20 mb90">
            <h5 class="text-center">
                There is no Session Images.
            </h5>
        </div>
    <?php endif ?>
</div>
<footer id="footer">
    <div class="footer-links">
        <?php echo config('copyright') ?> By <a href="http://elmanawy.info" class="copyright">Marwa El-Manawy</a>. |
        <a href="<?php echo config('facebook') ?>" class="social-link-footer"><i class="fa fa-facebook"></i></a> |
        <a href="<?php echo config('instagram') ?>" class="social-link-footer"><i class="fa fa-instagram"></i></a> | 
        <a href="<?php echo config('youtube') ?>" class="social-link-footer"><i class="fa fa-youtube-play"></i></a> |
        <a href="<?php echo config('twitter') ?>" class="social-link-footer"><i class="fa fa-twitter"></i></a> 
    </div>
</footer>