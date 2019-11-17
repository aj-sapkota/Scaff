<?php

require('addon/dbConnect.php');
require('addon/authentication.php');

if (isset($_POST['submit'])) {
    $txnumber = $_POST['tx_number'];
    $txtype = $_POST['tx_type'];
    $txdate = $_POST['tx_date'];
    $txproduct = $_POST['tx_product'];
    $txquantity = $_POST['tx_quantity'];
    $txtrucktype = $_POST['tx_truck_type'];
    $txtruckplate = $_POST['tx_truck_plate_number'];
    $txtruckrate = $_POST['tx_truck_rate'];
    $txrecordedby = $_POST['tx_recorded_by'];
    $txremark = $_POST['remark'];

    // Insert the values in table
    $project_query = "INSERT INTO dn_cn_register (tx_number,tx_type,tx_date,tx_product,tx_quantity,tx_truck_type,tx_truck_plate_number,tx_truck_rate,tx_recorded_by,remark) VALUES (:txnumber,:txtype,:txdate,:txproduct,:txquantity,:txtrucktype,:txtruckplate,:txtruckrate,:txrecordedby,:txremark)";
    $error = "";
    try {
        $project_result = $connect->prepare($project_query);
        $project_result->execute(array(
            ':txnumber' => $txnumber,
            ':txtype' => $txtype,
            ':txdate' => $txdate,
            ':txproduct' => $txproduct,
            ':txquantity' => $txquantity,
            ':txtrucktype' => $txtrucktype,
            ':txtruckplate' => $txtruckplate,
            ':txtruckrate' => $txtruckrate,
            ':txrecordedby' => $txrecordedby,
            ':txremark' => $txremark
        ));
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        $error = "y";
    }
    if ($error != "y") {
        echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
    }
}
?>


<!DOCTYPE html>
<html>

<?php include('html/head.html') ; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
       <?php include('addon/sidebarSelect.php');?>

        <!-- Page Content  -->
        <div id="content">
        <?php include('html/navbar.html');?>
            
            <div class="container my-container text-center">
        <form method="post" action="add_dn_cn.php">
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <h3> Add DN/CN</h3>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Tx Number" name="tx_number" required autocomplete="off"  >
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Tx Type" name="tx_type" required autocomplete="off"  >
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
    
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker"
                         data-target="#datetimepicker5" placeholder="Enter Tx Date" name="tx_date" required autocomplete="off"  />
                        
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-globe"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Tx Product" name="tx_product" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                    <div class="col my-col col-lg-3 col-md-4">
                            <div class="input-group">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="fas fa-unlock"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Tx Quantity" name="tx_quantity" required autocomplete="off"   >
                    </div>
                    </div>
                    <div class="col my-col col-lg-3 col-md-4">
                            <div class="input-group">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="fas fa-unlock"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter  Tx Truck Rate" name="tx_truck_rate" required autocomplete="off"  >
                    </div>
                </div>
                </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-portrait"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Tx Truck Type" name="tx_truck_type" require autocomplete="off">
                    </div>
                </div>
            </div>
            
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-fax"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Tx Truck Plate Number" name="tx_truck_plate_number" required autocomplete="off"  >
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="number" class="form-control" placeholder="Enter Tx Recorded By" name="tx_recorded_by">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                    <div class="col my-col col-lg-6 col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter Any Remarks" name="remark">
                        </div>
                    </div>
                </div>
            <div class="row my-row">
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="submit" class="btn btn-success " name="submit">Add</button>
                </div>
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="reset" class="btn btn-primary ">Reset</button>
                </div>
               
            </div>
        </form>
    </div>
</body>

            </div>

        </div>
    </div>
    </div>

   
</body>

</html>