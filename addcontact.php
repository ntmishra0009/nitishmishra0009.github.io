<!DOCTYPE html>
<html lang="en">
<head>

        <?php include('components/head.php'); ?>

        <title>Add Contact-Contact App</title>
</head>
<body>
        <?php include('components/navbar.php'); ?>
        
        <div class="container">
                <h2 class="text-center text-primary mt-3">Add Contact Here</h2>
                <hr class="text-danger">
                <div class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
                        <a class="btn btn-primary" href="addcontact.php">Add Contact</a>
                </div>
                <hr class="text-danger">
                <form class="s-form" action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                                <label class="form-label">Profile Picture</label>
                                <input type="File" name="myFile" class="form-control">
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="userName" class="form-control" placeholder="Enter name">
                        </div>
                        
                        <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                <input type="email" name="userEmail[]" class="form-control" placeholder="name@example.com">
                                <button class="btn btn-success" type="button" id="addEmail">+</button>
                                </div>
                        </div>
                        
                        <div id="emailAll">
                        <!-- This is not empty please don't delete it. Here is use of Jquery code -->
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <div class="input-group">
                                <input type="tel" name="userMobile[]" class="form-control" placeholder="xxxxxxxxxx">
                                <button class="btn btn-success" type="button" id="addMobile">+</button>
                                </div>
                        </div>

                        <div id="mobileAll">
                        <!-- This is not empty please don't delete it. Here is use of Jquery code -->
                        </div>

                        <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="userAddress" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                                <button class="btn btn-primary" type="submit" name="submit">Add Contact</button>
                                <button class="btn btn-danger" type="reset" name="reset">Clear</button>
                        </div>
                </form>
        </div>
        <?php include('components/footer.php'); ?>

        <?php include('components/script.php'); ?>

        <!-- This is my custom script for to add multiple email input fields-->

        <script src="js/addMoreEmail.js"></script>

        <!-- This is my custom script for to add multiple mobile input fields-->

        <script src="js/addMoreMobile.js"></script>
        

</body>
</html>

<?php   
        

        if(!isset($_SESSION['user']))
        {
                echo "<script>location.href='index.php'</script>";   
        }

        if(isset($_POST['submit']))
        {
                $name=$_POST['userName'];
                $address=$_POST['userAddress'];
                $emails=implode(",",$_POST['userEmail']);
                $mobiles=implode(",",$_POST['userMobile']);

                if(isset($_SESSION['user']))
                {
                        $authEmail=$_SESSION['user']['email'];
                }

                $dir='components/uploads/contacts/';

                $temp=explode(".",$_FILES['myFile']['name']);

                $newFileName="IMG-".round(microtime(true)).'.'.end($temp);

                $path=$dir.$newFileName;

                $sql="INSERT INTO mycontacts(userName,userEmail,userProfile,userMobile,userAddress,authEmail,created)
                
                VALUES('$name','$emails','$path','$mobiles','$address','$authEmail',now());";

                if($conn->query($sql))
                {   
                        move_uploaded_file($_FILES['myFile']['tmp_name'],$path);

                        echo "<script>swal('Contact added successfully')</script>";
                }

                else
                {
                        echo "<script>swal('Something went wrong')</script>";
                }
        }
    
?>