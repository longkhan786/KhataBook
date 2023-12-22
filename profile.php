<?php
include "header.php";
include "conn.php";
if (isset($_SESSION['id'])) {
    $stud_id = $_SESSION['id'];
?>
    <center>
        <i class="fa fa-user" style="font-size: 150px;"></i><br><br>
        <div class="container">
            <h1 class="text-info text-center">User Details</h1>
            <table class="table table-striped table-bordered text-center table-hover">
                <tr>
                    <th> ID </th>
                    <th>NAME</th>
                    <th> FATHER NAME</th>
                    <th> G-MAIL</th>
                    <th> GENDER</th>
                    <th> HOBBY</th>
                    <th>EDIT PROFILE</th>
                </tr>

                <?php
                $sql = "SELECT * FROM stud_info where stud_id = '$stud_id'";
                $result = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $data['stud_id'] ?>
                        </td>
                        <td>
                            <?php echo $data['stud_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['father_name'] ?>
                        </td>
                        <td>
                            <?php echo $data['email'] ?>
                        </td>
                        <td>
                            <?php echo $data['gender'] ?>
                        </td>
                        <td>
                            <?php echo $data['hobby'] ?>
                        </td>
                        <td>
                            <button class="btn btn-dark">
                                <a href="update_profile.php?stud_id=<?php echo $data['stud_id']; ?>" class="text-white">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php
                } ?>
            </table>
    </center>
<?php
    exit();
} else {
    header('location:index.php');
}
?>
?>