<?php
require('addon/authentication.php');
?>
<!Doctype html>
<html>

<?php include('html/head.html') ; ?>

<body>
    <!--
    <div class="container my-container text-center">
        <form>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-6 mx-auto">
                    <h3> Access Denied</h3>
                    <img src="img/accessdenied.png">
                </div>
            </div>
            <div class="row my-row">
                <div class="col my-col col-lg-6 col-md-8 mx-auto">
                       
                    <input type="button"  class="btn btn-primary " value="Home" onclick="location='index.php'">
                </div>
            </div>
            
        </form>
    </div>
    !-->

    <div class="container-fluid buddy">
                <div class="mainback">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-sm-9 col-md-7 col-lg-5 mx-auto">
                                <div class="card card-signin ">
                                    <div class="card-body">
                                    <h2 class="text-danger text-center text-uppercase">access denied</h2>
                                    <h6 class="text-danger text-center">You are not authorized to access this page</h6>
                                    <div class="imgcontainer">
                                    <img src="img/accessdenied.png">
                                    </div>
                                    <input type="button"  class="btn btn-lg btn-primary btn-block text-uppercase" value="Home" onclick="location='index.php'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</body>

</html>