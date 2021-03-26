<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>OOP crud</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="text-center">
                <h1>PHP OOP CRUD</h1>
                <hr style="height: 1px;color:black;background-color: black;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <?php
            include "model.php";
            $model = new model();
            $id = $_REQUEST['id'];
            $row = $model->edit($id);

            if(isset($_POST['submit'])){
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])){
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                        $data['id'] = $id;
                        $data['name'] = $_POST['name'];
                        $data['mobile'] = $_POST['mobile'];
                        $data['email'] = $_POST['email'];
                        $data['address'] = $_POST['address'];

                        $update = $model->update($data);
                        if($update){
                            echo 'UPDATED';
                            header('location:  /records.php');
                        }else{
                            echo 'NE UPDATED';
                        }

                    }else{
                        echo 'emty data';
                    }
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name = 'name' value="<?php echo $row['name']?>">
                </div>
                <div class="mt-3 form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name = 'email' value="<?php echo $row['email']?>">
                </div>
                <div class="mt-3 form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" name = 'mobile' value="<?php echo $row['mobile']?>">
                </div>
                <div class="mt-3 form-group">
                    <label for="">Address</label>
                    <textarea name="address" id="" cols="30" rows="3" class="form-control" ><?php echo $row['address']?></textarea>
                </div>
                <div class="mt-3 form-group">
                    <button type="submit" name="submit" " class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</htm
