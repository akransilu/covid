<ol class="breadcrumb pull-right">
    <li><a href="<?php echo site_url('admin/userdetails') ?>">Home</a></li>
    <li class="active">Covid Form Details</li>
</ol>
<h1 class="page-header">Covid Form Details</h1>

<div class="panel panel-default">
    <div class="panel-heading">
        <!-- <h3 class="panel-title">Mcq Exam</h3> -->
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

            <div class="col-md-12 col-sm-12 col-12"> 
                <div class="form-group">
                    <label class="col-sm-3 col-form-label" for="field-1">First Name </label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" readOnly
                            value="<?php echo set_value('firstName', $item->fname) ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12"> 
                <div class="form-group">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" readOnly
                            value="<?php echo set_value('lastName', $item->lname) ?>">
                        </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12">           
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Company Name</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="company" placeholder="Company Name" readOnly
                            value="<?php echo set_value('company', $item->company) ?>">
                    </div>
                    </div>    
            </div>
            <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group">
                    <label class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="phoneNo" placeholder="Phone Number" readOnly
                            value="<?php echo set_value('phoneNo', $item->phoneNo) ?>">
                    </div>
                </div>
              </div> 
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" readOnly
                            value="<?php echo set_value('email', $item->email) ?>">
                    </div>
                </div>
              </div> 
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="col-sm-10 col-form-label">Have you travelled overseas to any country within the last 14 days?</label>
                    <div class="col-sm-2">
                        <input type="email" class="form-control" name="traveledRecently" readOnly
                            value="<?php echo set_value('traveledRecently', $item->traveledRecently) ?>">
                    </div>
                </div>
              </div>
              <?php if ($item->traveledRecently === 'Yes'): ?>
                <div class="col-md-12 col-sm-12 col-12" id="from-div">
                    <div class="form-group">
                        <label class="col-sm-7 col-form-label">From where and what date did you return?</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="returnedFrom" placeholder="Returned From" readOnly
                                value="<?php echo set_value('returnedFrom', $item->returnedFrom) ?>">
                        
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="returnedDate" readOnly
                                value="<?php echo set_value('returnedDate', $item->returnedDate) ?>">
                        
                        </div>
                    </div>
                </div>
              <?php endif ?>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="col-sm-10 col-form-label">Have you had close/casual contact with someone confirmed to have 
COVID-19 within the last 14 days?</label>
                    <div class="col-sm-2">
                        <input type="email" class="form-control" name="covidContact" readOnly
                            value="<?php echo set_value('covidContact', $item->covidContact) ?>">
                        
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label class="col-sm-10 col-form-label">Do you feel unwell, or have flu-like symptoms including:</label>
                    
                    <div class="col-sm-2">                        
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-9">
                        <ul>
                            <li>Cough</li>
                            <li>Sore throat</li>
                            <li>Shortness of breath</li>
                            <li>Fever</li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <input type="email" class="form-control" name="symptoms" readOnly
                            value="<?php echo set_value('symptoms', $item->symptoms) ?>">
                    </div>
                </div>
            </div>

        </form>

    </div>
</div>

