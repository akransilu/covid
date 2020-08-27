<!--<base href="<?php echo site_url() ?>" />-->
<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo site_url('admin/sessions') ?>">Sessions</a></li>
    <li class="active">Manage Session</li>
</ol>
<h1 class="page-header">Manage Session</h1>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Session</h3>
    </div>
    <div class="panel-body">
        <?php if (validation_errors()) : ?>
            <div class="form-group">
                <div class="alert alert-danger">
                    <?php echo validation_errors() ?>
                </div>
            </div>
        <?php endif ?>
        <form role="form" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label">Album <span class="required">*</span></label>

                <div class="col-sm-10">
                    <?php echo form_dropdown('category_id', dd2menu('categories', array('category_id' => 'title')), set_value('category_id', $item->category_id), 'class="form-control"') ?>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"> Title <span class="required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Title" name="title"
                           value="<?php echo set_value('title', $item->title) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Description <span class="required">*</span></label>
                <div class="compose-message-editor col-sm-10">
                    <textarea class="form-control" name="description" placeholder="Description" style="height: 150px;"><?php echo set_value('description', $item->description) ?></textarea>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"> Permalink <span class="required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Permalink" name="permalink"
                           value="<?php echo set_value('permalink', $item->permalink) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"> Video Link </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Video Link" name="video_link"
                           value="<?php echo set_value('video_link', $item->video_link) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Meta Keywords </label>

                <div class="compose-message-editor col-sm-10">
                    <textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords" style="height: 120px;"><?php echo set_value('meta_keywords', $item->meta_keywords) ?></textarea>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Meta Description </label>

                <div class="compose-message-editor col-sm-10">
                    <textarea class="form-control" name="meta_description" placeholder="Meta Description" style="height: 150px;"><?php echo set_value('meta_description', $item->meta_description) ?></textarea>
                </div>
            </div>                       
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1"> Featured Image <span class="required">*</span></label>

                <div class="col-sm-8">
                    <input class="form-control" type="file" name="image" >
                </div>
                <div class="col-sm-2">
                    <?php if ($item->image): ?>
                        <img src="<?php echo base_url() ?>/cdn/sessions/<?php echo $item->image ?>" class="img-inline userpic-32" height="32"/>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group-separator"></div>
            <div class="portlet light bordered form-group">
                <div class="portlet-title col-sm-2 control-label">
                    <label class=""> Session Gallery </label>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="portlet-body">
                        <div class="form-md-checkboxes">
                            <input type="file" name="gallery[]" multiple id="gallery" onchange="imagesUpdate(this)"  />
                            <div class="dropzone dropzone-file-area gallery gallery_sortable" >
                                <?php if ($images = $this->input->post("gallery") or $images = json_decode($item->gallery)): ?>
                                    <?php foreach ($images as $img): ?>
                                        <div id="<?php echo $img ?>">
                                            <img src="<?php echo site_url() ?>/cdn/sessions/<?php echo $img ?>" />
                                            <input type="hidden" name="gallery[]" value="<?php echo $img ?>" />
                                            <button type="button" onclick="imagesRemoveItem(this)" class="btn btn-danger">Remove</button>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <h3 class="sbold">
                                        <i class="fa fa-camera"></i>
                                        No Images
                                    </h3>
                                    <p> Please select multiple image </p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group-separator"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-lime" name="submit"><i class="fa fa-check-circle"></i> Submit</button>
                    <a href="<?php echo site_url('admin/sessions/index'); ?>" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
                </div>
            </div>
        </form>

    </div>
</div>


<script>
   

    var featuredImageUpdate = function (input) {
        if (!$(".gallery img").length) {
            $(".gallery .dropzone").html("<img src='' style='width: 100%' />");
        }
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(".gallery img").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    };

    $(function () {
        $(".gallery_sortable").sortable();
        $(".gallery_sortable").disableSelection();
    });


    var imagesUpdate = function (that) {
        if (!$(".gallery_sortable div").length) {
            $(".gallery_sortable").html("");
        }

        data = new FormData();
        $(that.files).each(function (i, x) {
            data.append('file[]', x);
        });


        $.ajax({
            url: "<?php echo site_url() ?>admin/sessions/image_upload",
            type: "POST",
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data'
        }).done(function (res) {
            res = JSON.parse(res);
            if (res.error == true)
                console.log(res.message);
            else {
                $(res.files).each(function (i, x) {
                    console.log(x);
                    $(".gallery_sortable").append('<div id="' + x + '">'
                            + '    <img src="<?php echo site_url() ?>/cdn/sessions/' + x + '" />'
                            + '    <input type="hidden" name="gallery[]" value="' + x + '" />'
                            + '    <button type="button" onclick="imagesRemoveItem(this)" class="btn btn-danger">Remove</button>'
                            + '</div>');
                });
            }
        });
    };

    var imagesRemoveItem = function (item) {
        $(item).parent().remove();
    };
</script>


<style>
    .portlet-body .sbold i{
        display: block;
        font-size: 40px;
        margin-bottom: 15px;
    }
    .portlet-body {
        background-color: #f5f5f5;
        padding: 20px;
        text-align: center;
        border: 1px solid #e4e4e4;
    }
    .gallery{
        cursor: pointer;
    }
    .gallery_sortable div{
        height: 80px;
        width: 100%;
        text-align: left;
        position: relative;
    }

    .gallery_sortable div:nth-child(even){
        background: #ccc;
    }
    .gallery_sortable div img{
        height: 60px;
        line-height: 80px;
        float: left;
        margin-top: 10px;
        margin-left: 10px;
    }
    .gallery_sortable div button,
    .gallery_sortable div button:focus:active, 
    .gallery_sortable div button:hover:active,
    .gallery_sortable div button:active{
        position: absolute;
        line-height: 1.44;
        right: 10px;
        top: 20px;
        z-index: 99;
    }
    .gallery_sortable div:nth-child(even) {
        background: #ddd;
    }
</style>