<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
//print_r($_SESSION);


$table_name = 'sale' . session_id();
$order_id='CLI'.strtoupper(substr($_SESSION['name'],0,4)).date('Y').date('m').strval(1);
//to cut

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
    echo "table created";
} else {
    echo "table present";
}

// upto cut

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    echo 'add : ' . $_GET['id'];
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `product_register` WHERE `product_material_item_code`='$id'");
    if ($query->rowCount() != 0) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
       // to cut
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
        } catch (PDOException $e) {
        }
            
        // upto cut
       /* $_SESSION['cart'] += ['product_name'=>$result['product_name'],'product_material_item_code'=>$result['product_material_item_code'],
                            'product_brand_new_selling_rate'=>$result['product_brand_new_selling_rate'],'quantity'=>1];
                            print_r( $_SESSION['cart']);
        array_push($_SESSION['cart'],array( 'product_name'=>$result['product_name'],'product_material_item_code'=>$result['product_material_item_code'],
        'product_brand_new_selling_rate'=>$result['product_brand_new_selling_rate'],'quantity'=>1));*/
        $_SESSION['cart']['product_name']['name']=$result['product_name'];
        $_SESSION['cart']['product_name']['product_material_item_code']=$result['product_material_item_code'];
        $_SESSION['cart']['product_name']['product_brand_new_selling_rate']=$result['product_brand_new_selling_rate'];
        $_SESSION['cart']['product_name']['quantity']=1;
        print_r( $_SESSION['cart']);
        echo sizeof( $_SESSION['cart']);
    } else {
        echo "invalid id";
    }
}else if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    echo 'remove : ' . $_GET['id'];
    $id = $_GET['id'];
    $query = $connect->query("DELETE FROM {$table_name} WHERE `product_material_item_code`='$id'");
}else if(isset($_POST['update'])){
    echo 'upadate : ';
    /*foreach($quantity_list as $a){
    $query = $connect->query("UPDATE {$table_name}
    SET quantity=$a
    WHERE 1;");
   /* foreach($quantity_list){

    }*/
}else if(isset($_GET['action'])&& $_GET['action']=='clear'){
    echo 'clear';
    $query = $connect->query("DELETE FROM {$table_name}");

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
    input[type=number]{
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
                                        <td><a href="sess_cart_system.php?action=add&id=<?php echo $result['product_material_item_code']; ?>">
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
                <form action="sess_cart_system.php" method="post">
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
                        $total=0;
                        $quantity_list=[];
                        $query = $connect->query("SELECT * FROM {$table_name} WHERE 1");
                        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                            $total+=$result['product_brand_new_selling_rate']*$result['quantity'];
                            array_push($quantity_list,$result['quantity']);
                            ?>
                            <tr>
                                <td><a href="sess_cart_system.php?action=remove&id=<?php echo $result['product_material_item_code']; ?>">
                                        <i class="fas fa-trash fa-2x"></i>
                                    </a> </td>
                                <td><?php echo $result['product_material_item_code']; ?></td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['product_brand_new_selling_rate']; ?></td>
                                <td>
                                <input type="number" min="1" name="<?php echo $result['product_material_item_code'];?>" value="<?php echo $result['quantity']; ?>">
                                </td>
                                <td><?php echo $result['product_brand_new_selling_rate']*$result['quantity']; ?></td>
                            </tr>

                        <?php
                        } ?>
                        <tr>
                            <td colspan="4"></td>
                            <td>Total</td>
                            <td><?php echo $total; ?></td>

                    </tbody>
                </table>
                <?php print_r($quantity_list)?>
                <input type="submit" name="update" value="Update">
                <a href="sess_cart_system.php?action=clear"><input type="button" value="Clear all"></a>
                </form>

            </div>
        </div>
    </div>


</body>

</html>