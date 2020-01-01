<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
$approved=0;
if(isset($_GET['id'])){
    $quotation_id=$_GET['id'];

$query1 = $connect->query("SELECT * FROM quotation_register WHERE quotation_id = '$quotation_id' AND `status`='ORDER CONFIRMED' ORDER BY timestamp DESC");
if($query1->rowCount()==0){
    $approved=1;
}
$result1 = $query1->fetch(PDO::FETCH_ASSOC);
$payment_amount=$result1['total_price']*(1-$result1['discount_rate']*0.01);

if(isset($_POST['confirm'])){
    if($result1['payment_amount']==0){
        echo "pressed";
    $query = $connect->query(" UPDATE `quotation_register` SET `payment_advance_confirm`={$_SESSION['id']},`status`='PACKING',`payment_amount`={$_POST['amount']} WHERE quotation_id='$quotation_id'
    ");
    echo "<script type='text/javascript'>alert('Payment Confirmed !')</script>";
    $approved=1;
}
}
}else{
    header("Location: index.php");
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
                <?php if($approved==0){ ?>
                <hr>
                Quotation Id =<?php echo $quotation_id;?>
                <hr>          
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Selling Rate($)</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                             $query = $connect->query("SELECT * FROM quotation_items WHERE quotation_id = '$quotation_id'");
                           
                            
                            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                //$_POST[$result['product_material_item_code']]
                               // array_push($quantity_list, $result['quantity']);
                                ?>
                                <tr>
                                    <td><?php echo $result['product_material_item_code']; ?></td>
                                    <td><?php echo $result['product_name']; ?></td>
                                    <td><?php echo $result['product_brand_new_selling_rate']; ?></td>
                                    <td>
                                        <?php echo $result['quantity']; ?>
                                    </td>
                                    <td><?php echo $result['product_brand_new_selling_rate'] * $result['quantity']; ?></td>
                                </tr>
                            <?php
                            } ?>
                            <tr>
                                <td colspan="3"></td>
                                <td>Sub-Total</td>
                                <td><?php echo $result1['total_price']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>Discount percentage</td>
                                <td><?php echo $result1['discount_rate']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total</td>
                                <td><?php 
                                echo $payment_amount; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    Advance Payment=<?php echo $result1['payment_advance']; ?>
                    <form action="<?php echo "confirm_payment.php?id=".$quotation_id ?>" method="post">
                    <input type="number" name="amount" step="0.01" min="0" placeholder="Amount Paid">        
                    <input type="submit" name="confirm" value="Confirm">
                    </form>
                        <?php }else{
                            echo "Advance amount has been paid.. your order is being packed !!";
                            }?>
            </div>

        </div>
    </div>
    </div>

  
</body>

</html>