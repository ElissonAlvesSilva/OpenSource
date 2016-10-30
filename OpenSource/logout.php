<?php @ob_start();session_start();?>
<?php
if(isset($_SESSION['Usuario']))

{

    session_destroy();

    header("location: Login.php");

    exit();

}
