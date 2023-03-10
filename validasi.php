<?php 
// session_start();
include_once 'controllers/c_login.php';

if ($_SESSION['role'] == "admin") {

  } else if ($_SESSION['role'] == "kasir" ){

} else if ($_SESSION['role'] == "owner" ){
    
  } else {
    echo '<script>document.location.href="../../index.php"</script>';
  }
?>