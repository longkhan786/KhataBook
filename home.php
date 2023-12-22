<?php
include 'header.php';
if (isset($_SESSION['id'])) {
foreach($asso_arr as $x => $x_value) {
  echo "<a href='".$x_value."'>". $x ."</a>";
  echo "<br>";
}
?>
<?php
exit();
}
else{
header('location:index.php'); // redirect to login page if user details is not set in sessions
}
?>
</div>
</body>
</html>