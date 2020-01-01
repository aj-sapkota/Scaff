<?php 
require('addon/authentication.php');
require('addon/dbConnect.php');
$query = $connect->query("SELECT * FROM quotation_register WHERE `status`='PACKING' ORDER BY timestamp DESC");

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
                                <th>Add Delivery</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $result['quotation_id']; ?></td>
                                    <td><?php echo $result['timestamp']; ?></td>
                                    <td><?php echo $result['total_price']; ?></td>
                                    <td><?php echo $result['status']; ?></td>
                                    <td><a title="Add" href="<?php echo "add_dn.php?id=".$result['quotation_id'] ?>">
                                                <i class="fas fa-plus"></i>
                                                </a> 
                                            </td>
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