<?php

include "register_self.php";

/* Get username */
$uname = $_POST['uname'];

/* Query */
$query = "select count(*) as cntUser from clients where Username='".$uname."'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

return $count;

?>