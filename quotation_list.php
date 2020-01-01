<?php
require('addon/authentication.php');
require('addon/dbConnect.php');


if (isset($_GET['action']) && $_GET['action'] == "view_quotation") {
    $query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} AND system_user_approved=0 ORDER BY timestamp DESC");
    $action = "display_quotation.php?id=";
    $icon="fas fa-eye fa";
    $title="View Quotation";
    $header="View";
} 

else if (isset($_GET['action']) && $_GET['action'] == "approve_quotation") {
    if ($_SESSION['account_type'] == "SA" || $_SESSION['account_type'] == "SU") {
        $query = $connect->query("SELECT * FROM quotation_register WHERE system_user_approved=0 ORDER BY timestamp DESC");
        $action = "approve_quotation.php";
    } else {
        header("Location: access_denied.php");
    }
    //$result = $query->fetch(PDO::FETCH_ASSOC);
    $header="Approve";
    $action = "approve_quotation.php?id=";
    $icon="fas fa-check fa";
    $title="Aproove Quotation";
}

else if (isset($_GET['action']) && $_GET['action'] == "confirm_order") {
    $query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} AND `status`='SYSTEM APPROVED' ORDER BY timestamp DESC");
    //$action = "confirm_order.php";
    $action = "confirm_order.php?id=";
    $icon="fas fa-check fa";
    $title="Confirm Order";
    $header="Confirm";

} 

else if (isset($_GET['action']) && $_GET['action'] == "confirm_payment") {
    if ($_SESSION['account_type'] == "SA" || $_SESSION['account_type'] == "SU") {
        $query = $connect->query("SELECT * FROM quotation_register WHERE`status`='ORDER CONFIRMED' ORDER BY timestamp DESC");
       // $action = "confirm_payment.php";
        $action = "confirm_payment.php?id=";
        $icon="fas fa-dollar-sign fa";
        $title="Confirm Payment";
        $header="Confirm";
        
    } else {
        header("Location: access_denied.php");
    }
} 

else {// Display All
    if ($_SESSION['account_type'] == "SA" || $_SESSION['account_type'] == "SU") {
        $query = $connect->query("SELECT * FROM quotation_register WHERE 1");
    } else {
        $query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} ORDER BY timestamp DESC ");
    }
    $action = "display_quotation.php?id=";
    $icon="fas fa-eye fa";
    $title="View Quotation";
    $header="View";
}
?>


<!DOCTYPE html>
<html>

<?php include('html/head.html'); ?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include('addon/sidebarSelect.php'); ?>

        <!-- Page Content  -->
        <div id="content">
            <?php include('html/navbar.html'); ?>
            <div class="container my-container text-center">
                <div style="overflow-x:auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Quotation ID</th>
                                <th>TimeStamp</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th><?php echo $header;?></th>
                                <?php /*if ($_SESSION['account_type'] == "SA" || $_SESSION['account_type'] == "SU") {
                                    echo "<th> Approve </th>";
                                } else {
                                    echo "<th>Action </th>";
                                } */?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><a title ="View" href="<?php echo "display_quotation.php?id=" . $result['quotation_id'] . "&timestamp=" . $result['timestamp'] ?>"><?php echo $result['quotation_id']; ?></a></td>
                                    <td><?php echo $result['timestamp']; ?></td>
                                    <td><?php echo $result['total_price']; ?></td>
                                    <td><?php echo $result['status']; ?></td>
                                    <td><a title="<?php echo $title; ?>"href="<?php echo $action.$result['quotation_id'] ?>">
                                                <i class="<?php echo $icon; ?>"></i>
                                                </a> 
                                            </td>
                                    <?php /*
                                     // Check whether the system user is logged in 
                                        if ($_SESSION['account_type'] == "SA" || $_SESSION['account_type'] == "SU") { 
                                                if ($result['system_user_approved'] == 0){?>
                                            <td><a title="Approve Quotation "href="<?php echo "approve_quotation.php?id=" . $result['quotation_id'] ?>">
                                                <i class="fas fa-check fa"></i>
                                                </a> 
                                            </td>
                                                <?php }else if ($result['system_user_approved'] == 0){?>
                                            <td><a title="Approve Quotation "href="<?php echo "approve_quotation.php?id=" . $result['quotation_id'] ?>">
                                                <i class="fas fa-check fa"></i>
                                                </a> 
                                            </td>
                                                <?php } else{?>
                                                    <td><i class="fas fa-ban fa"></a>
                                                    </td>
                                        <?php }} else {
                                                if ($result['system_user_approved'] == 0) {
                                                    ?>
                                                <td><a title="View Quotation" href="<?php echo "display_quotation.php?id=" . $result['quotation_id'] . "&timestamp=" . $result['timestamp'] ?>">
                                                            <i class="fas fa-eye fa"></i></a>
                                                </td>

                                        <?php } else if ($result['client_admin_approved'] == 0) { ?>
                                            <td><a title="Confirm Order " href="<?php echo "confirm_order.php?id=" . $result['quotation_id'] . "&timestamp=" . $result['timestamp'] ?>">
                                                    <i class="fas fa-check fa"></i></a>
                                            </td>
                                        <?php
                                                } else { ?>
                                                    <td><i class="fas fa-ban fa"></a>
                                                    </td>
                                         <?php  } ?>
                                </tr>

                        <?php
                            }*/
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