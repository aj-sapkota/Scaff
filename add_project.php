<?php
require('addon/authentication.php');
require('addon/dbConnect.php');
include('validation.php');
if (isset($_POST['submit'])) {

    // Fetching the form data
    $title = $_POST['project_title'];
    $id = $_POST['project_id'];
    $contract = $_POST['project_contract_num'];
    $site = $_POST['project_site_location'];
    $mail = $_POST['project_mail_location'];
    $order = $_POST['project_order_number'];
    $status = $_POST['project_status'];
    $recorder = $_POST['project_recorded_by'];
    $remarks = $_POST['remarks'];
    $rate = $_POST['tx_truck_rates'];

    // Insert the values in table
    $project_query = "INSERT INTO project_register(
             project_id,project_title,project_contract_no,project_site_location,project_mail_location,
             project_order_no,project_status,project_recorded_by,remarks,tx_truck_rates)
              VALUES(:id,:title,:contract,:site,:mail,:order,:status,:recorder,:remarks,:rate)";
    $error = "";
    try {
        $project_result = $connect->prepare($project_query);
        $project_result->execute(array(
            ':id' => $id,
            ':title' => $title,
            ':contract' => $contract,
            ':site' => $site,
            ':mail' => $mail,
            ':order' => $order,
            ':status' => $status,
            ':recorder' => $recorder,
            ':remarks' => $remarks,
            ':rate' => $rate
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
            <form method="post" action="add_project.php">
        <table align="center">
            <tr>
                <td>
                    <h1>Add Project </h1>
                </td>
            </tr>
            <tr>
                <td><b>Project Title:</b></td>
                <td><input type="text" placeholder="enter project Title" name="project_title" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Project Id</b></td>
                <td><input type="text" placeholder="Enter Id" name="project_id" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><b>Project Contract No</b></td>
                <td><input type="text" placeholder="enter project contract number" name="project_contract_num" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b>Project Site Location</b></td>
                <td><input type="text" placeholder="Enter site Location" name="project_site_location"> </td>
            </tr>
            <tr>
                <td><b> Project Mail Location</b></td>
                <td><input type="text" placeholder="enter Mail Location" name="project_mail_location" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b> Project Order Number</b></td>
                <td><input type="text" placeholder="enter project Order Number" name="project_order_number"> </td>
            </tr>

            <tr>
                <td><b> Project Status</b></td>
                <td><input type="text" placeholder="enter Project Status" name="project_status" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b> Project Recorded by</b></td>
                <td><input type="num" placeholder="enter person" name="project_recorded_by" required autocomplete="off"> </td>
            </tr>
            <tr>
                <td><b>Remarks:</b></td>
                <td><input type="text" placeholder="enter any remarks" name="remarks"> </td>
            </tr>
            <tr>
                <td><b> Tx Truck Rates</b></td>
                <td><input type="num" placeholder="enter Truck Rates" name="tx_truck_rates" required autocomplete="off"> </td>
            </tr>

            <tr>
                <td align="center">
                    <input type="submit" name="submit" value="Add">
                    <input type="reset" name="reset" value="Reset">
                    <input type="button" value="cancel" onclick="location='index.php'" /></td>

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