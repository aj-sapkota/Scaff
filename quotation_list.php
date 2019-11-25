<?php
require('addon/authentication.php');
require('addon/dbConnect.php');

if(isset($_GET['action']) && $_GET['action']=="view_quotation"){
    $query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} AND system_user_approved=0");
    $action="view_quotation";


}
else if(isset($_GET['action']) && $_GET['action']=="approve_quotation"){
if($_SESSION['account_type']=="SA" || $_SESSION['account_type']=="SU"){
    $query = $connect->query("SELECT * FROM quotation_register WHERE system_user_approved=0");
    $action="approve_quotation";
}else{
    header("Location: access_denied.php");
}
//$result = $query->fetch(PDO::FETCH_ASSOC);

}else if(isset($_GET['action']) && $_GET['action']=="confirm_order"){

$query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} AND client_admin_approved=0 ORDER BY timestamp DESC");
$action="confirm_order";
}else if(isset($_GET['action']) && $_GET['action']=="confirm_payment"){
    if($_SESSION['account_type']=="SA" || $_SESSION['account_type']=="SU"){
        $query = $connect->query("SELECT * FROM quotation_register WHERE client_admin_approved!=0 AND payment_amount=0");
        $action="confirm_payment";
    }else{
        header("Location: access_denied.php");
    }
    
}else{
    if($_SESSION['account_type']=="SA" || $_SESSION['account_type']=="SU"){
        $query = $connect->query("SELECT * FROM quotation_register WHERE 1");}
        else{
            $query = $connect->query("SELECT * FROM quotation_register WHERE user_id ={$_SESSION['id']} ORDER BY timestamp DESC ");

        }
        $action="view_all";

}
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
                <th>Quotation ID</th>
                <th>TimeStamp</th>
                <th>Total Price</th>
                <th>Status</th>
                <?php if($_SESSION['account_type']=="SA" || $_SESSION['account_type']=="SU"){ ?>
                    <th> Approve </th>
                    <?php }else {
                        ?>
                        <th>Action</a>
                    </th>

                    <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><a href="<?php echo "display_quotation.php?id=".$result['quotation_id']."&timestamp=".$result['timestamp'] ?>"><?php echo $result['quotation_id']; ?></a></td>
                    <td><?php echo $result['timestamp']; ?></td>
                    <td><?php echo $result['total_price']; ?></td>
                    <td><?php echo $result['status']; ?></td>
                    <?php if($_SESSION['account_type']=="SA" || $_SESSION['account_type']=="SU"){ ?>
                    <td><a href="<?php echo "approve_quotation.php?id=".$result['quotation_id'] ?>">
                                            <i class="fas fa-check fa"></i>
                                        </a> </td>
                    <?php }else {
                        if($result['system_user_approved']==0){
                        ?>
                        <td><a href="<?php echo "display_quotation.php?id=".$result['quotation_id']."&timestamp=".$result['timestamp'] ?>"><i class="fas fa-eye fa"></i></a>
                    </td>

                        <?php }else if($result['client_admin_approved']==0){ ?>
                        <td><a href="<?php echo "confirm_order.php?id=".$result['quotation_id']."&timestamp=".$result['timestamp'] ?>"><i class="fas fa-check fa"></i></a>
                    </td>
                    <?php
                    }else{
                    
                    ?>
                     <td><i class="fas fa-ban fa"></a>
                    </td>
                    <?php
                    }?>
                </tr>

            <?php
            } }?>

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