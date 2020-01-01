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
$CA=array('','client_admin_home.php','logout.php','access_denied.php','index.php','sess_cart_system.php','cart_system.php','quotation_list.php','display_quotation.php','confirm_order.php');
$SU=array('','system_user_home.php','logout.php','access_denied.php','index.php');
$SA=array('','system_admin_home.php','logout.php','access_denied.php','add_users.php',
            'index.php','add_project.php','display_project.php','add_product.php','add_dn.php','add_supplier.php','quotation_list.php',
            'approve_quotation.php','confirm_payment.php','display_quotation.php');
$YM=array('','yard_manager_home.php','logout.php','access_denied.php','index.php','add_dn.php','dn_list.php');
/* null element added at each array because while searching for element in the array, if the desired data is present as first element,
     the array search function will return 0 ( index of first element) which will be treated as false
*/
//$account_types=array('CV','CA','SU','SA','YM','PM');

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
    }else{
        $options=["SU"=>"System User","CA"=>"Client Admin","CV"=>"Client Viewer","YM"=>"Yard Manager","PM"=>"Project Manager"];
    }
    break;
    case "YM":
        if(!array_search($page_name,$YM)){
            header("Location: access_denied.php");
        }
    break;
    default:
    header("Location: access_denied.php");
}

?>