<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
$query = $connect->query("SELECT * FROM `project_register` WHERE 1");
//$result = $query->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<?php include('html/head.html');?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
       <?php include('addon/sidebarSelect.php');?>

        <!-- Page Content  -->
        <div id="content">
        <?php include('html/navbar.html');?>
            <div class="container my-container text-center">
    <div style="overflow-x:auto;">
    <table class="table table-hover" >
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Project Title</th>
                <th>Contract Number</th>
                <th>Site Location</th>
                <th>Mail Location</th>
                <th>Order Number</th>
                <th>Status</th>
                <th>Recorded By</th>
                <th>Remarks</th>
                <th>Tx Truck Rates</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                /*echo '<tr';
     echo '<td>'.$result['project_title'].'</td>';
     $_POST['project_title'];
     $_POST['project_id'];
     $_POST['project_contract_num'];
     $_POST['project_site_location'];
     $_POST['project_mail_location'];
     $_POST['project_order_number'];
     $_POST['project_status'];
     $_POST['project_recorded_by'];
     $_POST['remarks'];
     $_POST['tx_truck_rates'];    
     echo '</tr';*/

                ?>
                <tr>
                    <td><?php echo $result['project_title']; ?></td>
                    <td><?php echo $result['project_id']; ?></td>
                    <td><?php echo $result['project_contract_no']; ?></td>
                    <td><?php echo $result['project_site_location']; ?></td>
                    <td><?php echo $result['project_mail_location']; ?></td>
                    <td><?php echo $result['project_order_no']; ?></td>
                    <td><?php echo $result['project_status']; ?></td>
                    <td><?php echo $result['project_recorded_by']; ?></td>
                    <td><?php echo $result['remarks']; ?></td>
                    <td><?php echo $result['tx_truck_rates']; ?></td>
                </tr>

            <?php
            } ?>

        </tbody>
    </table>
    
        </div>
        <input type="button" value="Home" onclick="location='index.php'" />
            </div>

        </div>
    </div>
    </div>

  
</body>

</html>