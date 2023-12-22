<?php
include "conn.php";
include "header.php";
if (isset($_GET['stud_id'])) {
    $id = $_GET['stud_id'];
    $data = "SELECT * FROM stud_info where stud_id = $id";
    $result = mysqli_query($conn, $data);
    $q = mysqli_fetch_array($result);
?>
    <center>
        <form action="" method="post">
            <input type="hidden" name="in_id" value="<?= $id; ?>">
            <label for="name">NAME : </label>
            <input type="text" name="name" value="<?php echo $q['stud_name']; ?>"><br><br>
            <label for="fathername">father_name : </label>
            <input type="text" name="fathername" value="<?php echo $q['father_name']; ?>"><br><br>
            <label for="email">email : </label>
            <input type="text" name="email" value="<?php echo $q['email']; ?>"><br><br>



            <label for="gender">Gender: </label><br><br>
            <input type="radio" id="gender" name="gender" value="male" <?php if($q['gender']=="male"){ echo "checked";}?>/>Male &nbsp;
            <input type="radio" id="gender" name="gender" value="female" <?php if($q['gender']=="female"){ echo "checked";}?>/>Female <br />
            <br>

            <?php
            $h = "select hobby from stud_info where stud_id = '$id'";
            $re = mysqli_query($conn,$h);
            while ($row = mysqli_fetch_array($re)) {
                $hobby=explode(",",$row['hobby']);
            ?>
            Hobby:<br>
            <input type="checkbox" id="cricket" name="hobby[]" value="cricket"   <?php if(in_array("cricket",$hobby)) echo 'checked="checked"'; ?>  />
            <label for="cricket">Cricket</label> <br>
            <input type="checkbox" id="football" name="hobby[]" value="football"   <?php if(in_array("football",$hobby)) echo 'checked="checked"'; ?> />
            <label for="football">Football</label> <br>
            <input type="checkbox" id="hockey" name="hobby[]" value="hockey"   <?php if(in_array("hockey",$hobby)) echo 'checked="checked"'; ?> />
            <label for="hockey">Hockey</label><br />
<?php
            }
?>
            <input type="submit" name="confirm">
        </form>
    </center>
<?php
}
ob_start();
if (isset($_POST['confirm'])) {
    $pr_id = $_POST['in_id'];
    $name = $_POST['name'];
    $fathername = $_POST['fathername'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];

    $chk = "";
    foreach ($hobby as $value) {
        echo $chk .= $value . ",";
    }

    echo $query1 = "update stud_info set stud_name = '$name', father_name = '$fathername',gender = '$gender', email = '$email', hobby = '$chk' where stud_id = '$pr_id'";
    mysqli_query($conn, $query1);
    header("Location: profile.php");
}
exit();
?>