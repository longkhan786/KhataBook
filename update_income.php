<?php
include "conn.php";
include "header.php";
if (isset($_GET['inc_id'])) {
    $id = $_GET['inc_id'];
    $data = "SELECT * FROM income where inc_id = $id";
    $result = mysqli_query($conn, $data);
    $q = mysqli_fetch_array($result);
?>
    <center>
        <form action="" method="post">
            <input type="hidden" name="in_id" value="<?= $id; ?>">

            <label for="head master">HEAD: </label>
            <?php
            echo "<select name='head'>";
            echo "<option>Select</option>";

            $data2 = "select * from income where inc_id = '$id'";
            $result2 = mysqli_query($conn,$data2);
            $q2 = mysqli_fetch_array($result2);

            $data1 = "SELECT * FROM head_master"; 
            $result1 = mysqli_query($conn, $data1);
            foreach ($result1 as $value) {
                if ($q['head_id'] == $value['id']) {
                    echo "<option value='" . $value['id'] . "' selected>" . $value['head'] . "</option>" . "<br />";
                } else {
                    echo "<option value='" . $value['id'] . "'>" . $value['head'] . "</option>" . "<br />";
                }
            }
            echo "</select> <br> <br>";
            ?>

            <label for="amount">amount : </label>
            <input type="text" name="amount" value="<?php echo $q['amount']; ?>"><br><br>
            <label for="date">date : </label>
            <input type="date" name="date" value="<?php echo $q['date']; ?>"><br><br>
            <input type="submit" name="confirm">
        </form>
    </center>
<?php
}
ob_start();
if (isset($_POST['confirm'])) {
    
    $id = $_POST['head'];
    $pr_id = $_POST['in_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    echo $query1 = "update income set head_id = $id, amount = '$amount', date = '$date' where inc_id = '$pr_id'";
    // exit();
    mysqli_query($conn, $query1);
    header("Location: income.php");
}
exit();
?>