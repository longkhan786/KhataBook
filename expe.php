<?php
include 'header.php';
include 'conn.php';

if (isset($_SESSION['id'])) {
?>
    <form action="" method="post">
        <center>
            <label for="head master">Head: </label>
            <?php
            echo "<select name='head'>";
            echo "<option>-select-</option>";
            $sql = "SELECT * FROM head_master";
            $head = mysqli_query($conn, $sql);
            foreach ($head as $value) {
                echo "<option value='" . $value['id'] . "'>" . $value['head'] . "</option>" . "<br />";
            }
            echo "</select>";
            ?>
            <a href="head.php"><input type="button" value="+"></a>
            <br><br>
            <label>Amount:</label>
            <input type="text" name="amount" required><br><br>
            <label for="date">date:</label>
            <input type="date" id="date" name="date" required>
            <br>
            <br>
            <input type="submit" name="confirm" value="submit">
        </center>
    </form>


    <!-- table  -->
    <div class="container">
        <div class="">
            <br>
            <h1 class="text-info text-center">Expenditure</h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <tr>
                    <th> ID</th>
                    <th>HEAD</th>
                    <th> AMOUNT</th>
                    <th> DATE</th>
                    <th> DELETE</th>
                    <th> UPDATE</th>
                </tr>
                <?php
                $data = "SELECT * FROM expe left join head_master on expe.head_id=head_master.id";
                $result = mysqli_query($conn, $data);
                ?>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $data['exp_id'] ?>
                        </td>
                        <td>
                            <?php echo $data['head'] ?>
                        </td>
                        <td>
                            <?php echo $data['amount'] ?>
                        </td>
                        <td>
                            <?php echo $data['date'] ?>
                        </td>
                        <td>
                            <button class="btn btn-dark">
                                <a href="delete.php?exp_id=<?php echo $data['exp_id']; ?>" class="text-white">
                                    <i class="fa fa-trash"></i>
                                    <!-- delete -->
                                </a>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-dark">
                                <a href="update_exp.php?exp_id=<?php echo $data['exp_id']; ?>" class="text-white">
                                <i class="fa fa-edit"></i>
                                </a>

                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        <?php
        if (isset($_POST['confirm'])) {
            $head_id = $_POST['head'];
            $amount = $_POST['amount'];
            $date = $_POST['date'];
            $q = "INSERT into expe (head_id,amount,date) 
            values('$head_id','$amount','$date')";
            $query = mysqli_query($conn, $q);
            header("location:expe.php");
        }
        exit();
    } else {
        header('location:index.php'); // redirect to login page if user details is not set in sessions
    }
?>