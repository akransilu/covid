<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo site_url('admin/users') ?>">Users</a></li>
    <li class="active">Manage User</li>
</ol>
<h1 class="page-header">Manage User</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">User</h3>
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
                <label class="col-sm-2 control-label" for="field-1">User Name <span class="required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="User Name" name="username"
                           value="<?php echo set_value('username', $item->username) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Email <span class="required">*</span></label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Email" name="email"
                           value="<?php echo set_value('email', $item->email) ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Image <span class="required">*</span></label>

                <div class="col-sm-8">
                    <input class="form-control" type="file" name="image" >
                </div>
                <div class="col-sm-2">
                    <?php if ($item->image): ?>
                        <img src="<?php echo base_url() ?>/cdn/users/<?php echo $item->image ?>" class="img-inline userpic-32" height="32"/>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Password <span class="required">*</span></label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password"
                           value="<?php echo set_value('password') ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-lime" name="submit"><i class="fa fa-check-circle"></i> Submit</button>
                    <a href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
                </div>
            </div>


        </form>

    </div>
</div>

