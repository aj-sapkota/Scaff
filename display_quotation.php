<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
if(isset($_GET['id'])){
    $quotation_id=$_GET['id'];
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
                <hr>
                Quotation Id =<?php echo $quotation_id;?>
                <hr>
                Time Stamp = <?php echo $_GET['timestamp']?>
          
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
                            $total = 0;
                            $query = $connect->query("SELECT * FROM quotation_items WHERE quotation_id = '$quotation_id'");
                            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                //$_POST[$result['product_material_item_code']]
                                $total += $result['product_brand_new_selling_rate'] * $result['quantity'];
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
                                <td>Total</td>
                                <td><?php echo $total; ?></td>

                        </tbody>
                    </table>
            </div>

        </div>
    </div>
    </div>

  
</body>

</html>