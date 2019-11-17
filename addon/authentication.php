<?php
session_start();
$page_name=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1);
//echo $page_name;
if(!isset($_SESSION['email']) ){
    //echo "<script type='text/javascript'>alert('Please Log In!')</script>";
    $_SESSION['login_alert']="True";
    header('Location: index.php');
}

// Page Access Control
$CV=array('','client_viewer_home.php','logout.php','access_denied.php','index.php');
$CA=array('','client_admin_home.php','logout.php','access_denied.php','index.php');
$SU=array('','system_user_home.php','logout.php','access_denied.php','index.php');
$SA=array('','system_admin_home.php','logout.php','access_denied.php','add_client_viewer.php',
            'index.php','add_project.php','view_project.php','add_product.php','add_dn_cn.php','add_supplier.php');
switch($_SESSION['account_type']){
    case "CV":
    if(!array_search($page_name,$CV)){
       
        header("Location: access_denied.php");
    }
    break;
    case "CA":
    if(!array_search($page_name,$CA)){
        header("Location: access_denied.php");
    }
    break;
    case "SU":
    if(!array_search($page_name,$SU)){
        header("Location: access_denied.php");
    }
    break;
    case "SA":
    if(!array_search($page_name,$SA)){
        header("Location: access_denied.php");
    }
    break;
}
?>