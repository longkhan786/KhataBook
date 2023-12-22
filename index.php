<?php
include 'conn.php';
?>
<style>
    <?php
    include 'style.css';
    ?>
</style>
<?php
//change 'valid_username' and 'valid_password' to your desired "correct" username and password
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM stud_info WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['password'] === $password) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $row['stud_id'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    } else {
        header("Location: index.php?error=Incorect User name or password");
        exit();
    }
}

?>
<div class="container order" style="margin-left:540px;">
    <div class="facebook-page order">
        <form action="" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="link">
                <button type="submit" class="login">Login</button>
            </div>
            <hr>
            <div class="button">
                <a href="sign_up.php">Create new account</a>
            </div>
        </form>
    </div>
</div>
</form>
</body>

</html>