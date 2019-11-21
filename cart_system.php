<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
$quotation_id = 'CLI' . strval($_SESSION['id']) . date('Y') . date('m') . strval($_SESSION['order_num']);
echo $quotation_id;

$table_name = 'sale' . session_id();
echo $table_name;
$table_exists = "true";
try {
    $test = $connect->query("SELECT * FROM {$table_name} WHERE 1");
} catch (PDOException $e) {
    $table_exists = "false";
}
if ($table_exists == "false") {
    $createTable = $connect->exec("CREATE TABLE {$table_name} (
        `product_material_item_code` varchar(20) NOT NULL,
        `product_name` varchar(255) NOT NULL,
        `product_brand_new_selling_rate` int(11) NOT NULL,
        `quantity` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
      ALTER TABLE {$table_name}
  ADD PRIMARY KEY (`product_material_item_code`);
COMMIT;");
    $table_data_num=0;
} else {
    $table_data_num=5;
    echo $table_data_num;
}
if (isset($_POST['order']) ) {
    $project_query = "INSERT INTO `quotation_register`(`quotation_id`, `user_id`, `total_price`) VALUES 
    (:quotationid,:userid,:price)";
    $error = "";
    try {
        $project_result = $connect->prepare($project_query);
        $project_result->execute(array(':quotationid'=>$quotation_id,':userid'=>$_SESSION['id'],':price'=>$_POST['total'] ));
        echo $_SESSION['order_num']++;
        $query = $connect->query( " UPDATE `client_register` SET `order_num`={$_SESSION['order_num']} WHERE `client_id`={$_SESSION['id']}");
        /*$table_data_num=0;
        $query = $connect->query("DELETE FROM {$table_name}");*/
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        $error = "y";
    }
    if ($error != "y") {
        echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
    }

    

}





if (isset($_GET['action']) && $_GET['action'] == 'add') {
    echo 'add : ' . $_GET['id'];
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `product_register` WHERE `product_material_item_code`='$id'");
    if ($query->rowCount() != 0) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $name = $result['product_name'];
        $id = $result['product_material_item_code'];
        $price = $result['product_brand_new_selling_rate'];
        $quantity = 1;

        $project_query = "INSERT INTO {$table_name} (product_name,product_material_item_code,product_brand_new_selling_rate,quantity)
            VALUES (:name,:productitem,:productbrand,:quantity)";
        try {
            $project_result = $connect->prepare($project_query);
            $project_result->execute(array(
                ':name' => $name,
                ':productitem' => $id,
                ':productbrand' => $price,
                ':quantity' => $quantity
            ));
        } catch (PDOException $e) { }
    } else {
        echo "invalid id";
    }
} else if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    echo 'remove : ' . $_GET['id'];
    $id = $_GET['id'];
    $query = $connect->query("DELETE FROM {$table_name} WHERE `product_material_item_code`='$id'");
} else if (isset($_POST['update'])) {
    echo 'upadate : ';
    foreach ($_POST as $key => $value) {
        try {
            $query = $connect->query("UPDATE {$table_name} SET `quantity`={$value} WHERE `product_material_item_code`='$key'");
        } catch (PDOException $e) { }
    }
} else if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    echo 'clear';
    $table_data_num=0;
    $query = $connect->query("DELETE FROM {$table_name}");
} else if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
    $query = $connect->query("DROP TABLE  {$table_name}");
    header('Location: system_admin_home.php');
}




?>
<style>
    .content-center {
        width: 50%;
        float: left;
    }

    .show-table {

        padding-left: 20px;
    }

    .content-right {
        width: 50%;
        float: left;
    }

    input[type=number] {
        width: 60px;
        text-align: center;
    }

    body {
        font-family: Verdana;
        font-size: 12px;
        color: #444;
    }
</style>


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

            <div class="content-center">
                <div class="show-table">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Add</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Selling Rate</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $connect->query("SELECT * FROM `product_register` WHERE 1");
                                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                    <tr>
                                        <td><a href="cart_system.php?action=add&id=<?php echo $result['product_material_item_code']; ?>">
                                                <i class="fas fa-plus fa-2x"></i>
                                            </a> </td>
                                        <td><?php echo $result['product_material_item_code']; ?></td>
                                        <td><?php echo $result['product_name']; ?></td>
                                        <td><?php echo $result['product_brand_new_selling_rate']; ?></td>
                                    </tr>
                                <?php
                                } ?>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="content-right">
                <?php if($table_data_num>0){ ?>
                <form action="cart_system.php" method="post">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Remove Item</th>
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
                            $quantity_list = [];
                            $query = $connect->query("SELECT * FROM {$table_name} WHERE 1 ORDER BY product_name ASC ");
                            $item_num = 0;
                            while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                //$_POST[$result['product_material_item_code']]
                                $total += $result['product_brand_new_selling_rate'] * $result['quantity'];
                               // array_push($quantity_list, $result['quantity']);
                                $item_num++;
                                ?>
                                <tr>
                                    <td><a href="cart_system.php?action=remove&id=<?php echo $result['product_material_item_code']; ?>">
                                            <i class="fas fa-trash fa"></i>
                                        </a> </td>
                                    <td><?php echo $result['product_material_item_code']; ?></td>
                                    <td><?php echo $result['product_name']; ?></td>
                                    <td><?php echo $result['product_brand_new_selling_rate']; ?></td>
                                    <td>
                                        <input type="number" min="1" name="<?php echo $result['product_material_item_code']; ?>" value="<?php echo $result['quantity']; ?>">
                                    </td>
                                    <td><?php echo $result['product_brand_new_selling_rate'] * $result['quantity']; ?></td>
                                </tr>

                            <?php
                            } ?>
                            <tr>
                                <td colspan="4"></td>
                                <td>Total</td>
                                <td><?php echo $total; ?></td>
                                <td>
                                        <input type="number" name="total" value="<?php echo $total; ?>" readonly>
                                    </td>

                        </tbody>
                    </table>
                    <?php print_r($_POST) ?>
                    <?php echo $item_num; ?>
                    <input type="submit" name="update" value="Update">
                    <a href="cart_system.php?action=clear"><input type="button" value="Clear all"></a>
                    <a href="cart_system.php?action=cancel"><input type="button" value="Cancel"></a>
                    <input type="submit" value="Order" name="order">
                </form>
                        <?php }
                        else{
                            echo "Cart Empty.. Add products";
                        }
                        ?>

            </div>
        </div>
    </div>


</body>

</html>