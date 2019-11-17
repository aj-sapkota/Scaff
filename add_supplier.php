<?php
require('addon/authentication.php');

?>
<!Doctype html>
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
        <form>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <h3> Add Supplier</h3>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter ID" name="supplier_id" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Name" name="supplier_name"
                            required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Address"
                            name="supplier_address" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-globe"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier URL" name="supplier_url">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-portrait"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Contact Person"
                            name="supplier_contact_person" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-3 col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Contact Tel1"
                            name="supplier_contact_tel1">
                    </div>
                </div>
                <div class="col my-col col-lg-3 col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Contact Tel2"
                            name="supplier_contact_tel2" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-fax"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter  Supplier Contact Fax"
                            name="supplier_contact_fax" required autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8">
                    <div class="input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Supplier Email"
                            name="supplier_email">
                    </div>
                </div>
            </div>
            <div class="row my-row">
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="submit" class="btn btn-success ">Sign Up</button>
                </div>
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="reset" class="btn btn-primary ">Reset</button>
                </div>
                <div class="col  my-col col-lg-2 col-sm-2">
                    <button type="button" class="cancelbtn btn btn-danger">Cancel</button>

                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    
</body>

</html>