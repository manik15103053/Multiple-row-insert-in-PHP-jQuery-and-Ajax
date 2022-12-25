<?php 

    session_start();

    $conn = mysqli_connect("localhost",'root','', 'php_multiple_data');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($name == "" || $email == "" || $phone == ""){
        echo "<span style='color:red'>Please Input The Filed Name</span>";
    }else{
        foreach($name as $key=>$names){
            $s_name = $names;
            $s_email = $email[$key];
            $s_phone = $phone[$key];

            $query = "INSERT INTO tbl_multiple_insert_data(name,email,phone) VALUES ('$s_name','$s_email','$s_phone')";
            $result = mysqli_query($conn, $query);


        }

        if($result){
            $_SESSION['status'] = "Data Inserted Successfully.";
            header("location:index.php");
        }else{
            $_SESSION['status'] = "Data Inserted Faild.";
            header("location:index.php");
        }
    }


?>