<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
    <li class="active">Dashboard</li>
</ol>
<h1 class="page-header">Users</h1>
<div class="section-container section-with-top-border">

    <a href="<?php echo site_url('admin/users/manage'); ?>" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-user-plus"></i>  Add</a>

    <div class="panel pagination-inverse m-b-0 clearfix">
        <!-- <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th> Name</th>
                    <th> Email</th>
                    <th> Operation</th>
                </tr>
            </thead>
            <tbody>
                /*<?php foreach ($items as $item): ?>
                    <tr class="gradeA">
                        <td><img src="<?php echo base_url() ?>/cdn/users/<?php echo $item->image ?>" class="img-circle img-inline userpic-32" width="28" /> <?php echo $item->username ?></td>
                        <td><?php echo $item->email ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/users/manage/' . $item->user_id); ?>" class="btn btn-lime btn-rounded">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Edit
                            </a>

                            <a href="<?php echo site_url('admin/users/delete/' . $item->user_id); ?>" class="btn btn-danger btn-rounded">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    
                <?php endforeach ?>*/
            </tbody>
        </table> -->
        <select>
            <?php foreach ($items as $item): ?>
                <option><?php echo $item->role ?></option>           
            <?php endforeach ?>
        </select>
    </div>
</div>















