<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
    <li class="active">Dashboard</li>
</ol>
<h1 class="page-header">Dashboard</h1>
<div class="section-container section-with-top-border p-b-5">
    <div class="row">
        <div class="col-md-3">
            <div class="widget widget-stat bg-inverse text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-users"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Beneficiaries</div>
                    <div class="widget-stat-number"><?php echo $applicants ?></div>
                    <div class="widget-stat-text">All Beneficiaries</div>
                </div>
            </div>
        </div>
        <!--div class="col-md-3">
            <div class="widget widget-stat bg-success text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-diamond"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Albums's Categories</div>
                    <div class="widget-stat-number"><?php echo $categories ?></div>
                    <div class="widget-stat-text">All Album's Categories</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-primary text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-folder-open"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Albums</div>
                    <div class="widget-stat-number"><?php echo $sessions ?></div>
                    <div class="widget-stat-text">All Albums</div>
                </div>
            </div>
        </div>
      

        <div class="col-md-3">
            <div class="widget widget-stat bg-danger text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-picture-o"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Sliders</div>
                    <div class="widget-stat-number"><?php echo $sliders ?></div>
                    <div class="widget-stat-text">All Slides</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget widget-stat bg-purple text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-sitemap"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Journal Categories</div>
                    <div class="widget-stat-number"><?php echo $blog_categories ?></div>
                    <div class="widget-stat-text">All Journal Categories</div>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="widget widget-stat bg-grey text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-newspaper-o"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Jurnal Posts</div>
                    <div class="widget-stat-number"><?php echo $posts ?></div>
                    <div class="widget-stat-text">All Jurnal Posts</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget widget-stat bg-warning text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-money"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Packages</div>
                    <div class="widget-stat-number"><?php echo $packages ?></div>
                    <div class="widget-stat-text">All Packages</div>
                </div>
            </div>
        </div-->
    </div>
</div>

<!--div class="section-container section-with-top-border p-b-5">
    <h5 class="m-t-0">Blog  / Gallery Widget</h5>
    <p class="m-b-15">
        Blog  / latest post & Session Images in.  
    </p>
    <div class="row">
        <?php foreach ($this->db->order_by('post_id', 'desc')->limit('2')->get('posts')->result() as $row): ?>
        <div class="col-md-4">

            <div class="widget widget-blog">
                <div class="widget-blog-cover">
                    <img src="<?php echo base_url() ?>/cdn/blog/<?php echo $row->image ?>" alt="<?php echo $row->title ?>">
                </div>

                <div class="widget-blog-content">
                    <h5><?php echo $row->title ?></h5>
                    <p>
                        <?php $this->load->helper('text') ?>
                        <?php echo character_limiter($row->content, 150) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <div class="col-md-4">
            <div class="widget widget-gallery">
                <div class="widget-gallery-header">
                    <h5>Latest Uploaded Images</h5>

                </div>
                <ul class="widget-gallery-list clearfix">
                    <?php foreach ($this->db->order_by('session_id', 'desc')->limit('12')->get('sessions')->result() as $row): ?>
                    <li><a href="<?php echo site_url('session/index/' . $row->permalink) ?>" target="_blank"><img src="<?php echo base_url() ?>/cdn/sessions/<?php echo $row->image ?>" alt="<?php echo $row->title ?>" /></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div-->
<script src="<?php echo STYLE_JS ?>/page-widgets.demo.js"></script>