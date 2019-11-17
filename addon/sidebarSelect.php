<?php  
 switch($_SESSION['account_type']){
    case "CV":
   // header('Location: client_viewer_home.php');
    break;
    case "CA":
   // header('Location: client_admin_home.php');
    break;
    case "SU":
   // header('Location: system_user_home.php');
    break;
    case "SA":
    //header('Location: system_admin_home.php');
    include('html/sidebarSA.html');
    break;
}
?>