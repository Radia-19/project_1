<?php
    include('connect.php'); 
    if(isset($_GET['sign-btn'])){
        $name1 = $_GET['name1'];
        $name2 = $_GET['name2'];
        $sign_email = $_GET['sign-email'];
        $sign_password = $_GET['sign-password'];
    }

    class signup_info{
    private $conn;

       public function add_data($data){
        $name1 = $data['name1'];
        $name2 = $data['name2'];
        $sign_email = $data['sign-email'];
        $sign_pass = $data['sign-pass'];

           $query = "INSERT INTO signup_info(name1,name2,sign-email,sign-pass) VALUE ('$name1','$name2',$sign_email','$sign_pass')";

           if(mysqli_query($this->conn, $query)){
               return "Information Added Sucessfully";
           }
       }

        public function signup_info($data){
        $name1 = $data['name1'];
        $name2 = $data['name2'];
        $sign_email = $data['sign-email'];
        $sign_pass = MD5($data['sign-pass']); 

        $query = "SELECT * FROM signup_info WHERE sign_email='$sign_email' && sign_pass='$sign_pass'";    
        if(mysqli_query($this->conn, $query)){
            $signup_info = msqli_query($this->conn, $query);
            if($signup_info){
                header("location:index.html");
                $signup_data = mysqli_fetch_assoc($signup_info);
               
            }
        }
       }


  }



?>
