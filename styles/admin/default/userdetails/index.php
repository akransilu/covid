<!-- <ol class="breadcrumb pull-right">
    <li><a href="<?php //echo site_url('admin/dashboard') ?>">Home</a></li>
</ol> -->
<h1 class="page-header">User Details</h1>


<div class="panel panel-default">

    <div class="panel-body">

        <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" id="payment_form">


            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">Phone Number</label>

                <div class="col-sm-3">
                    <input type="text" id="phoneNo" name="phoneNo" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">From</label>

                <div class="col-sm-3">
                    <input type="date" id="fdate" name="fdate" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="field-1">To</label>

                <div class="col-sm-3">
                    <input type="date" id="tdate" name="tdate" class="form-control" />
                </div>
            </div>            
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-lime" value="1" name="submit"><i
                            class="fa fa-check-circle"></i> Search </button>

                </div>
            </div>


        </form>

    </div>
</div>

<div class="section-container section-with-top-border">
    <?php $msg=$this->session->flashdata('message');
if ( isset($msg)  && $msg !='' ) { ?>
    <div class="form-group">
        <div class="alert alert-success">
            <?php echo $msg ?>
        </div>
    </div>
    <?php } ?>



    <div class="panel pagination-inverse m-b-0 clearfix">

        <table id="d1" class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th> First Name</th>
                    <th> Last Name</th>
                    <!-- <th> Company Name</th> -->
                    <th> Phone Number</th>
                    <!-- <th> Email Address</th> -->
                    <th> Traveled</th>
                    <!-- <th> Traveled From</th>
                    <th> Date Returned</th> -->
                    <th> Exposed Covid</th>
                    <th> Symptoms</th>               
                    <th> Risk</th>                    
                    <th> Submitted At</th>              
                    <th> View</th>
                </tr>
            </thead>

        </table>

        <a href="#" class="btn btn-lime btn-rounded" onclick="loadCSV()">
            <i class="fa fa-excel" aria-hidden="true"></i>
            Export To CSV
        </a>  

    </div>

</div>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    loadDetails();
});

$("#payment_form").submit(function(event) {
    event.preventDefault();
    loadDetails ();

});

function getData () {
     
    // var fName = $("#fName").val();
    var phoneNo = $("#phoneNo").val();
    var fdate = $("#fdate").val();
    var tdate = $("#tdate").val();
   
    var wCols = " 1=1 ";
    // if(tid != '' && tid !='0')
    //     wCols += " and c.Teacher_ID="+tid;
    if (phoneNo != '' && phoneNo != '0')
        wCols += " and phoneNo=" + phoneNo;
    if (fdate != '')
        wCols += " and createdDate >='" + fdate + "'";
    if (tdate != '')
        wCols += " and createdDate <='" + tdate + "'";
    
    var obj = {
        where: wCols
    };
    return obj;
}

function loadDetails() {
    var obj = getData ();

    var dataTable = $('#d1').DataTable({
        "destroy": true,
        "pageLength": 10,
        "serverSide": true,
        "processing": true,

        "ajax": {
            url: "userdetails/getDetails",
            type: "POST",
            data: obj
        },        
        columns: [{
                data: "fname"
            },
            {
                data: "lname"
            },            
            // {
            //     data: "company"
            // },
            {
                data: "phoneNo"
            },
            // {
            //     data: "email"
            // },
            {
                data: "traveledRecently"
            },
            // {
            //     data: "returnedFrom"
            // },
            // {
            //     data: "returnedDate"
            // },
            {
                data: "covidContact"
            },
            {
                data: "symptoms"
            },            
            {
                data: "risk"
            },
            {
                data: "createdDate"
            },
            {
                data: "operation"
            }
        ],
        "createdRow": function( row, data, dataIndex ) {
            if ( data['risk'] == "3" ) {        
                $(row).addClass('high-risk');     
            }
            if ( data['risk'] == "2" ) {        
                $(row).addClass('mid-risk');     
            }
            if ( data['risk'] == "1" ) {        
                $(row).addClass('low-risk');     
            }    

        }

    });
}


function loadCSV() {
    var obj = getData ();
    document.cookie = "filter=" + (obj.where || "")+ "; path=/";
   
    var site_url = "<?php echo site_url() ?>";
    var page = site_url + "admin/exportcsv/exportdetails" ;
    window.location = page;   
}

function confirmDelete() {
    return confirm('Are you sure you want to delete this record?');
}
</script>