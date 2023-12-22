<?php
include "conn.php";
include "header.php";
if (isset($_GET['id'])) {
    echo $id = $_GET['id'];
    $data = "SELECT * FROM head_master where id = $id";
    $result = mysqli_query($conn, $data);
    $q = mysqli_fetch_array($result);
?>
    <center>
        <form action="update.php" method="post">
            <label for="head">HEAD : </label>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="text" name="head" value="<?php echo $q['head']; ?>"><br><br>
            <input type="submit" name="confirm">
        </form>
    </center>
<?php
}
ob_start();
if (isset($_POST['confirm'])) {
    $head = $_POST['head'];
    $id = $_POST['id'];
    $query = "update head_master set head = '$head' where id = '$id'";
    mysqli_query($conn, $query);
    header("Location: head.php");
}
exit();
?>