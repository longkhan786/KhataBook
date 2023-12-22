<?php
    include 'conn.php';

    // if($_GET['flg'] == 1)
    // {
    //     $tblName = "income";
    //     $inc_id=$_GET['inc_id'];
    // }


    // income table delete data
    if($_GET['inc_id']){
    $inc_id=$_GET['inc_id'];
    $q="DELETE FROM income WHERE inc_id=$inc_id";
    $alt = "ALTER TABLE income AUTO_INCREMENT = 1";
    $query=mysqli_query($conn,$q);
    mysqli_query($conn,$alt);
    header('location:income.php');
    }

    // expediture table delete data
    if($_GET['exp_id']){
        $exp_id=$_GET['exp_id'];
        $q="DELETE FROM expe WHERE exp_id=$exp_id";
        $query=mysqli_query($conn,$q);
        $alt = "ALTER TABLE expe AUTO_INCREMENT = 1";
        mysqli_query($conn,$alt);
        header('location:expe.php');
    }

    // head master table delete date
    if($_GET['id']){
        $id=$_GET['id'];
        $q="DELETE FROM head_master WHERE id=$id";
        $query=mysqli_query($conn,$q);
        $alt = "ALTER TABLE head_master AUTO_INCREMENT = 1";
        mysqli_query($conn,$alt);
        header('location:head.php');
    }
    
?>
