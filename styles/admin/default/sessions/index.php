<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/dashboard') ?>">Home</a></li>
    <li class="active">Journal Posts</li>
</ol>
<h1 class="page-header">Journal Posts</h1>
<div class="section-container section-with-top-border">

    <a href="<?php echo site_url('admin/sessions/manage'); ?>" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>  Add</a>

    <div class="panel pagination-inverse m-b-0 clearfix">
        <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th> Title</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr class="gradeA">
                        <td><?php echo $item->title ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/sessions/manage/' . $item->session_id); ?>" class="btn btn-lime btn-rounded">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </a>

                            <a href="<?php echo site_url('admin/sessions/delete/' . $item->session_id); ?>" class="btn btn-danger btn-rounded">
                                <i class="fa fa-trash"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


















