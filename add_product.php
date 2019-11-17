
<?php
require('addon/authentication.php');
require('addon/dbConnect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['product_name'];
    $productitem = $_POST['product_material_item_code'];
    $productbrand = $_POST['product_brand_new_selling_rate'];
    $productsecondhand = $_POST['product_second_hand_selling_rate'];
    $productloss = $_POST['product_loss_rate'];
    $productrepair = $_POST['product_repair_rate'];
    $productcleaning = $_POST['product_cleaning_rate'];
    $productdailyrent = $_POST['product_daily_rental_rate'];
    $productweeklyrent = $_POST['product_weekly_rental_rate'];
    $productmonthlyrent = $_POST['product_monthly_rental_rate'];
    $productdailyhire = $_POST['product_daily_hire_charge'];
    $productweeklyhire= $_POST['product_weekly_hire_charge'];
    $productmonthlyhire = $_POST['product_monthly_hire_charge'];
    $productrecorded = $_POST['product_recorded_by'];
    $supplier = $_POST['supplier_name'];
    $remark = $_POST['remarks'];

    // Insert the values in table
    $project_query ="INSERT INTO 
                product_register (product_name,product_material_item_code,product_brand_new_selling_rate,
                    product_second_hand_selling_rate,product_loss_rate,product_repair_rate,product_cleaning_rate,
                    product_daily_rental_rate,product_weekly_rental_rate,product_monthly_rental_rate, 
                    product_daily_hire_charge,product_weekly_hire_charge,product_monthly_hire_charge,product_recorded_by,
                    supplier_name,remarks)
                VALUES (:name,:productitem,:productbrand,:productsecondhand,:productloss,:productrepair,:productcleaning,
                    :productdailyrent,:productweeklyrent,:productmonthlyrent,:productdailyhire,:productweeklyhire,
                    :productmonthlyhire,:productrecorded,:supplier,:remark)";
    $error = "";
    try {
        $project_result = $connect->prepare($project_query);
        $project_result->execute(array(
            ':name' => $name,
            ':productitem' => $productitem,
            ':productbrand' => $productbrand,
            ':productsecondhand' => $productsecondhand,
            ':productloss' => $productloss,
            ':productrepair' => $productrepair,
            ':productcleaning' => $productcleaning,
            ':productdailyrent' => $productdailyrent,
            ':productweeklyrent' => $productweeklyrent,
            ':productmonthlyrent' => $productmonthlyrent,
            ':productdailyhire' => $productdailyhire,
            ':productweeklyhire' => $productweeklyhire,
            ':productmonthlyhire' => $productmonthlyhire,
            ':productrecorded' => $productrecorded,
            ':supplier' => $supplier,
            ':remark' => $remark
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
            <form method="post" action="add_product.php">
        <table align="center">
            <tr>
                <td>
                    <h1>Add Product</h1>
                </td>
            </tr>
            <tr>
                <td><b> Product Name:</b></td>
                <td><input type="text" placeholder="Enter Product Name" name="product_name" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><b> Product Material Item Code </b></td>
                <td><input type="text" placeholder="Enter Product Material Item Code" name="product_material_item_code" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Product Brand-New Selling Rate</b></td>
                <td><input type="text" placeholder="Enter Product Brand-New Selling Rate" name="product_brand_new_selling_rate" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b>Product Second-Hand Selling Rate </b></td>
                <td><input type="text" placeholder="Enter Product Second-Hand Selling Rate" name="product_second_hand_selling_rate"> </td>
            </tr>
            <tr>
                <td><b> Product Loss Rate</b></td>
                <td><input type="text" placeholder="Enter Product Loss Rate" name="product_loss_rate" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b> Product Repair Rate</b></td>
                <td><input type="text" placeholder="Enter Product Repair Rate" name="product_repair_rate"> </td>
            </tr>

            <tr>
                <td><b> Product Cleaning Rate </b></td>
                <td><input type="text" placeholder="Enter Product Cleaning Rate" name="product_cleaning_rate" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b> Product Daily  Rentel Rate</b></td>
                <td><input type="text" placeholder="Enter  Product Daily Rental Rate" name="product_daily_rental_rate" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b>Product Weekly Rentel Rate:</b></td>
                <td><input type="text" placeholder="Enter Product Weekly Rentel Rate" name="product_weekly_rental_rate"> </td>
            </tr>
            <tr>
                <td><b>Product Monthly Rentel Rate:</b></td>
                <td><input type="text" placeholder="Enter Product Monthly Rentel Rate" name="product_monthly_rental_rate"> </td>
            </tr>
            <tr>
                <td><b>Product Daily Hire Charge:</b></td>
                <td><input type="text" placeholder="Enter Product Daily Hire Charge" name="product_daily_hire_charge"> </td>
            </tr>
            <tr>
                <td><b>Product Weekly Hire Charge:</b></td>
                <td><input type="text" placeholder="Enter Product Weekly Hire Charge" name="product_weekly_hire_charge"> </td>
            </tr>
            <tr>
                <td><b>Product Monthly Hire Charge:</b></td>
                <td><input type="text" placeholder="Enter Product Monthly Hire Charge" name="product_monthly_hire_charge"> </td>
            </tr>
            <tr>
                <td><b>Product Recorded BY:</b></td>
                <td><input type="number" placeholder="Enter Product Recorded By" name="product_recorded_by"> </td>
            </tr>
            <tr>
                <td><b>Supplier Name:</b></td>
                <td><input type="text" placeholder="Enter Supplier Name" name="supplier_name"> </td>
            </tr>
            <tr>
                <td><b>Remarks:</b></td>
                <td><input type="text" placeholder="Enter Any Remarks" name="remarks"> </td>
            </tr>

            <tr>
                <td align="center"><input type="submit" name="submit" value="Add"></td>
                <td align="center"><input type="reset" name="reset" value="Reset"></td>
                <td align="center"><input type="button" value="cancel" onclick="location='index.php'" /></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </form>
           
            </div>

        </div>
    </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
