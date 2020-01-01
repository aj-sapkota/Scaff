
<?php 
require('addon/authentication.php');
require('addon/dbConnect.php');
include('validation.php');
if (isset($_POST['submit'])) {

   // Fetching the form data
   $name = $_POST['client_name'];
   $email = $_POST['client_email'];
   $Tel1 = $_POST['client_contact_Tel1'];
   $Tel2 = $_POST['client_contact_Tel2'];
   $contact_person_1 = $_POST['client_contact_person_1'];
   $contact_person_2 = $_POST['client_contact_person_2'];
   $Fax1 = $_POST['client_contact_Fax1'];
   $Fax2 = $_POST['client_contact_Fax2'];
   $address = $_POST['client_address'];
   $remarks = $_POST['remarks'];
   $client_recorded =  $_SESSION['id'];
   $password = $_POST['password'];
   $repeatpsw = $_POST['confirm-password'];
   $account_type=$_POST['account_type'];

   //Checking for used email ID
   $query = $connect->query("select * from client_register where client_email='$email'");
   $rowcount = $query->rowCount();
   if ($rowcount > 0) {
      $emailErr = "Already used email!";
      echo $emailErr;
   }else {
      if ($password == $repeatpsw) {
         $hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
         // Insert the values in table
         $register_query = "INSERT INTO client_register(client_name,client_email,client_contact_Tel1,client_contact_Tel2, client_contact_person_1,
         client_contact_person_2,client_contact_Fax1,client_contact_Fax2,client_address,remarks,
    client_recorded_by,password,account_type) VALUES(:name,:email,:Tel1,:Tel2,:contact_person_1,:contact_person_2,:Fax1,:Fax2,:address,:remarks,
    :client_recorded,:hash,:account_type)";
    $error="";
         try {
            $register_result = $connect->prepare($register_query);
            $register_result->execute(array(
               ':name' => $name,
               ':email' => $email,
               ':Tel1' => $Tel1,
               ':Tel2' => $Tel2,
               ':contact_person_1' => $contact_person_1,
               ':contact_person_2' => $contact_person_2,
               ':Fax1' => $Fax1,
               ':Fax2' => $Fax2,
               ':address' => $address,
               ':remarks' => $remarks,
               ':client_recorded' => $client_recorded,
               ':hash' => $hash,
               ':account_type'=>$account_type
            ));
         } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
            $error="y";
         }
         if($error!="y"){
            echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
         }
      } else {
         $passwordErr = "Unmatched Password";
      }
   }
}?>

<body>

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
     <form method="post" action="add_users.php">
     
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <h3> Add Users</h3>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                    <input type="text" class="form-control" placeholder="Enter name" name="client_name" required autocomplete="off" autofocus>
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                    <input type="text" class="form-control" placeholder="Enter Address" name="client_address"
                        required autocomplete="off">
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                    <input type="email" class="form-control" placeholder="Enter email" name="client_email" required autocomplete="off">
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-unlock"></i>
                                </div>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" required autocomplete="off">
                </div>
                </div>
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-unlock"></i>
                                </div>
                    <input type="password" class="form-control" placeholder="Confirm Password"
                        name="confirm-password" required autocomplete="off">
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Contact Telephone 1"
                        name="client_contact_Tel1">
                </div>
                </div>
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-phone-volume"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Contact Telephone 2"
                        name="client_contact_Tel2">
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Enter Contact Person 1"
                        name="client_contact_person_1">
                </div>
                </div>
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Enter Contact Person 2"
                        name="client_contact_person_2">
                </div>
            </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-fax"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Enter Contact Fax 1"
                        name="client_contact_Fax1">
                </div>
                </div>
                <div class="col my-col col-lg-3 col-md-4">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-fax"></i>
                                </div>
                    <input class="form-control" type="text" placeholder="Enter Contact Fax 2"
                        name="client_contact_Fax2">
                </div>
                </div>
            </div>

        


            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    Account Type
                                </div>
                                <select class="form-control" name="account_type">
                    <?php foreach($options as $key=>$value){
                         echo "<option value='".$key."'>".$value."</option>";
                    }
                ?>
                </select>
                </div>
                </div>
            </div>





            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                        <div class="input-group">
                                <div class="input-group-prepend input-group-text">
                                    <i class="fas fa-registered"></i>
                                </div>
                    <textarea class="form-control" placeholder="Remarks" name="remarks"></textarea>
                </div>
                </div>
            </div>
         
            <div class="row my-row">
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="submit" class="btn btn-success"name="submit">Sign Up</button>
                </div>
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="reset" class="btn btn-primary ">Reset</button>
                </div>
                <div class="col  my-col col-lg-2 col-sm-2">
                        <button type="button" class="cancelbtn btn btn-danger" onclick="location='index.php'">Cancel</button>
                </div>
            </div>
       
             </form>

            </div>

        </div>
    </div>
    </div>

 
</body>

</html>