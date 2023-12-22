<?php
include 'header.php';
include 'conn.php';
if (isset($_SESSION['id'])) {
?>
    <div style="margin-left: 800px;">
    <h2 style="margin-left: 50px;">Date Wise</h2><br>
        <form action="" method="post">
            <label for="s_date">STARTING DATE:</label>
            <input type="date" id="s_date" name="s_date" required><br> <br>
            <label for="e_date">ENDING DATE :</label>
            <input type="date" id="e_date" style="margin-left: 7px;" name="e_date" required><br><br>
            <input type="submit" style="margin-left: 150px;" name="confirm" value="submit"><br>
        </form>
</div>
    <!-- <hr> -->

    <div style="margin-left: 400px; margin-top:-200px;">
    <h2 style="margin-left: 50px;">Head Wise</h2><br>
        <form action="" method="post">
            <label for="head master">HEAD: </label>
            
            <?php
             
            echo "<select name='head'>";
            echo "<option>Select</option>";
            $sql = "SELECT * FROM head_master";
             $head = mysqli_query($conn, $sql);
            for ($i=1; $i < mysqli_num_rows($head); $i++) { 
                $row = mysqli_fetch_array($head);
                echo "<option value='" . $row['id'] . "'>" . $row['head'] . "</option>" . "<br />";
            
            }
            // foreach ($head as $value) {
            //     echo "<option value='" . $value['id'] . "'>" . $value['head'] . "</option>" . "<br />";
            // }
            echo "</select>";
            ?>
            <br><br>
            <input type="submit" style="margin-left: 50px; margin-top:25px;" name="submit" value="submit"><br>
        </form>
    </div>


    <?php
    if (isset($_POST['confirm'])) {
        // if($_POST['s_date'] && $_POST['e_date']){
        $s_date = $_POST['s_date'];
        $e_date = $_POST['e_date'];
        $query = "select * from incexp where date between '$s_date' and '$e_date'  order by date desc";
        $result = mysqli_query($conn, $query);
    ?>

        <div class="container"><br>
            <h1 class="text-info text-center">Date Wise Report</h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <tr class="table-dark">
                    <th> Sr No.</th>
                    <th> Head</th>
                    <th> Date</th>
                    <th>Income Amount</th>
                    <th>Expediture Amount</th>
                    <th>less amount</th>
                </tr>

                <?php

                $sr = 1;
                $itotal = 0;
                $etotal = 0;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $sr ?>
                        </td>
                        <td>
                            <?php echo $data['head'] ?>
                        </td>
                        <td>
                            <?php echo $data['date'] ?>
                        </td>
                        <td>
                            <?php
                            switch($data['I'])
                            {
                            case 'I':
                                echo  $data['amount'];
                                $itotal += $data['amount'];
                                break;
                            default: echo "_";
                            }
                            
                    ?>
                        </td>
                        <td>
                            <?php
                             switch($data['I'])
                             {
                             case 'E':
                                 echo  $data['amount'];
                                 $etotal += $data['amount'];
                                 break;
                             default: echo "_";
                             
                             }?>
                        </td>
                    </tr>
                <?php
                    $sr++;
                }
                ?>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td align="center"><?php echo "I Total: ", $itotal; ?></td>
                    <td align="center"><?php echo "E Total: ", $etotal; ?></td>
                    <td align="center"><?php echo $total = $itotal - $etotal; ?></td>
                </tr>
            </table>
    <?php
    
   
        
}
    if (isset($_POST['submit'])) {
        $head = $_POST['head'];
        $query = "select * from incexp where id = '$head' order by date desc";
        $result = mysqli_query($conn, $query);
    ?>

        <div class="container"><br>
            <h1 class="text-info text-center">head wise </h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <tr class="table-dark">
                    <th> Sr No.</th>
                    <!-- <th> Head</th> -->
                    <th> Date</th>
                    <th>Income Amount</th>
                    <th>Expediture Amount</th>
                    <th>less amount</th>
                </tr>

                <?php

                $sr = 1;
                $itotal = 0;
                $etotal = 0;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $sr ?>
                        </td>
                        <td>
                            <?php echo $data['date'] ?>
                        </td>
                        <td>
                            <?php
                            if ($data['I'] == 'I') {
                                echo  $data['amount'];
                                $itotal += $data['amount'];
                            } 
                            else{
                                echo "_";
                            }?>
                        </td>
                        <td>
                            <?php
                            if ($data['I'] == 'E') {
                                echo $data['amount'];
                                $etotal += $data['amount'];
                            } 
                            else{
                                echo "_";
                            }?>
                        </td>
                    </tr>
                <?php
                    $sr++;
                }
                ?>
                <tr>
                    <!-- <td> </td> -->
                    <td> </td>
                    <td> </td>
                    <td align="center"><?php echo "I Total: ", $itotal; ?></td>
                    <td align="center"><?php echo "E Total: ", $etotal; ?></td>
                    <td align="center"><?php echo $total = $itotal - $etotal; ?></td>
                </tr>
            </table>
    <?php

    }

    exit();
} else {
    header('location:index.php');
} ?>