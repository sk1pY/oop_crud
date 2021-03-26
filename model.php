<?php
class Model{
    private $server = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $db = 'oop_crud';
    private $conn;

     public function __construct()
     {
         try {
                $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
         }catch (Exception $e){
                echo 'connected error' . $e->getMessage();
         }
     }

     public function insert(){
         if(isset($_POST['submit'])){
             if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])){
                 if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $query = "INSERT INTO crud (name,mobile,email,address) VALUES ('$name','$mobile','$email','$address')";
                        if($sql = $this->conn->query($query)){
                            echo 'success';
                        }else{
                            echo 'failed';

                        }
                 }else{
                     echo 'emty data';
                 }
             }
         }
     }
     public function fetch(){
         $data = null;

         $query = "SELECT * FROM crud";
         if($res = $this->conn->query($query)){
             while ($rows = mysqli_fetch_assoc($res)){
                 $data[] = $rows;
             }
             return $data;
         }
     }
     public function delete($id){
         $query = "DELETE FROM crud where id ='$id'";
         if($res = $this->conn->query($query)){
             return true;
         }else{
                return false;
             }
     }
}