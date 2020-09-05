<header id="header" class="fixed has-border">
   <a href="<?php echo site_url() ?>" class="logo">
        <div class="col-md-1 col-sm-1 col-1">
            <img src="<?php echo base_url() ?>cdn/<?php echo config('logo') ?>" alt="<?php echo config('title') ?> - Logo">
        </div>
        <div class="col-md-11 col-sm-11 col-11">
            <h2 class="ihsa-form-title font-weight-bold py-3 text-center">Visitor Health Declaration Form for coronavirus disease 2019 (COVID-19)</h2>
        </div>
    </a>
    <a href="#" class="mob-menu"><i class="fa fa-bars"></i></a>    
</header>
<div class="container pt80 pb100" style="background-color:white">
<?php $msg=$this->session->flashdata('message');
if ( isset($msg)  && $msg !='' ) { ?>
    <div class="form-group">
        <div class="alert alert-success">
            <?php echo $msg ?>
        </div>
    </div>
    <?php } ?>
    <?php if (validation_errors()) : ?>
        <div class="form-group">
            <div class="alert alert-danger">
                <?php echo validation_errors() ?>
            </div>
        </div>
    <?php endif ?>
    <form  method="post"  id="covidform" action="<?php echo base_url()?>home/save" method="post">  
          <div class="ihsa-form-wrapper my-8 py-8 bg-white" style="background-color:white">
          <div class="row">
          
<!--          
          <div class="col-md-12 col-sm-12 col-12">
            <h2 class="ihsa-form-title font-weight-bold py-3 text-center">Visitor Health Declaration Form for coronavirus disease 2019 (COVID-19)</h2>
            </div> -->
              
              <div class="col-md-12 col-sm-12 col-12">          
                <p >In line with the advice of government health authorities and to prevent the spread of coronavirus disease 2019 (COVID-19), we are asking all visitors to complete this Health Declaration Form as a condition of entry to our building, to implement necessary safety measures to prevent infections.</p>
            </div>

            <div class="col-md-12 col-sm-12 col-12 pb30">          
                <p >Apologies for any delay this may cause you and thank you in advance for your cooperation.</p>
            </div>
         
         
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">First Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Last Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                </div>
              </div>              
              <div class="col-md-12 col-sm-12 col-12">
                <div class="mb-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="company" placeholder="Company Name">
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
              <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone Number<span class="required">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="phoneNo" placeholder="Phone Number">
                    </div>
                </div>
              </div> 
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email Address<span class="required">*</span></label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>
              </div> 
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
                    <label class="col-sm-10 col-form-label">Have you travelled overseas to any country within the last 14 days?</label>
                    <div class="col-sm-2">
                        <select name="traveledRecently" class="form-control" onchange="showFromDiv(this.value)">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12 hide" id="from-div">
                <div class="form-group row">
                    <label class="col-sm-7 col-form-label">From where and what date did you return?<span class="required">*</span></label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="returnedFrom" placeholder="Returned From">
                    
                    </div>
                    <div class="col-sm-2">
                    <input type="date" class="form-control" name="returnedDate">
                    
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
                    <label class="col-sm-10 col-form-label">Have you had close/casual contact with someone confirmed to have 
COVID-19 within the last 14 days?</label>
                    <div class="col-sm-2">
                        <select name="covidContact" class="form-control">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
                    <label class="col-sm-10 col-form-label">Do you feel unwell, or have flu-like symptoms including:</label>
                    
                    <div class="col-sm-2">
                        <!-- <select name="traveled" class="form-control">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select> -->
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group row">
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
                    <!-- <label class="col-sm-10 col-form-label">Do you feel unwell, or have flu-like symptoms including:</label> -->
                    <div class="col-sm-2">
                        <select name="symptoms" class="form-control">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                        <div class="col-md-2 col-sm-12 col-12">
                        </div>
                        <div class="col-md-3 col-sm-12 col-12 mb-3">
                            <button type="reset" class="btn btn-primary btn-lg btn-block ihsa-gray-btn ihsa-custom-btn btn-small">clear</button>
                        </div>
                        <div class="col-md-2 col-sm-12 col-12">
                        </div>
                        <div class="col-md-3 col-sm-12 col-12 mb-3">
                            <button type="submit"
                                class="btn btn-primary btn-lg btn-block ihsa-custom-btn btn-small">Submit Form</button>
                        </div>
                        <div class="col-md-2 col-sm-12 col-12">
                        </div>
                    </div>

            </div>
        </div>
    </form>
</div>
<footer id="footer" class="fixed">

    <div class="footer-links pull-center">
       Solution Partner - <?php echo config('copyright') ?> &trade;
    </div>
    
</footer>
<script type="text/javascript">    
    var showFromDiv = function(ans) {
        if(ans==='Yes'){
            $('#from-div').removeClass('hide');
        }else{
            $('#from-div').addClass('hide');
        }            
    }
</script>