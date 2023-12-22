<?php
include "conn.php";
include "header.php";
if (isset($_GET['exp_id'])) {
    $id = $_GET['exp_id'];
    $data = "SELECT * FROM expe where exp_id = $id";
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
            //$data1 = "SELECT * FROM income left join head_master on income.head_id=head_master.id";
           
           
           
            $data2 = "select * from expe where exp_id = '$id'";
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
    echo $query1 = "update expe set head_id = $id, amount = '$amount', date = '$date' where exp_id = '$pr_id'";
    // exit();
    mysqli_query($conn, $query1);
    header("Location: expe.php");
}
exit();
?>