<?php
include 'header.php';
include 'conn.php';
include 'head_oops.php';
if (isset($_SESSION['id'])) {
?>
    <form action="" method="POST">
        <center>
            head : <input type="text" name="head" required><br><br>
            <input type="submit" name="confirm" value="submit">
        </center>
    </form>

    <!-- table  -->
    <div class="container">
        <div class="">
            <br>
            <h1 class="text-info text-center">Expediture</h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <tr>
                    <th> head</th>
                    <th> delete</th>
                    <th> update</th>
                </tr>
                <?php
                $data = "SELECT * FROM head_master";
                $result = mysqli_query($conn, $data);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $data['head']; ?>
                        </td>
                        <td>
                            <button class="btn btn-dark">
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="text-white">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-dark">
                                <a href="head_oops.php?id=<?php echo $data['id']; ?>" class="text-white"><i class="fa fa-edit"></i>
                                </a>

                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <?php
                ob_start();
                if (isset($_POST['confirm'])) {
                    $head = $_POST['head'];
                    echo $query = "INSERT into head_master(head) values('$head')";
                    mysqli_query($conn, $query);
                    header("Location: income.php");
                }
                ?>
            <?php
        } else {
            header('location:index.php'); // redirect to login page if user details is not set in sessions
        }
            ?>