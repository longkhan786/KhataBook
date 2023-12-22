<?php
include 'conn.php';
$name = $_POST['name'];
$fathername = $_POST['fathername'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$hobby = $_POST['hobby'];
$password = $_POST['password'];
$chk = "";
foreach ($hobby as $value) {
     $chk .= $value . ",";
}
// data preview
echo $name . "<br>";
echo $fathername . "<br>";
echo $email . " <br>";
echo $gender . "<br>";
echo $chk . "<br>";
echo $password . " <br>";
?>

<!-- confirm details -->
<form action="" method="post">
    <input type="hidden" name="name" value="<?php echo $name ?>">
    <input type="hidden" name="fathername" value="<?php echo $fathername ?>">
    <input type="hidden" name="email" value="<?php echo $email ?>">
    <input type="hidden" name="gender" value="<?php echo $gender ?>">
    <input type="hidden" name="hobby[]" value="<?php echo $chk ?>">
    <input type="hidden" name="password" value="<?php echo $password ?>">
    <input type="submit" name="confirm" value="Confirm Details">
    <input type="button" name="return" value="Return" onClick="javascript: window.history.back()" ;>
</form>

<?php
// insert data in database
if (isset($_POST['confirm'])) {
    $query = "INSERT into stud_info (stud_name,father_name,email,gender,hobby,password) 
    values('$name','$fathername','$email','$gender','$chk','$password')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>