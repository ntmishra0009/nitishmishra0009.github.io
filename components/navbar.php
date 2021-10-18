
<!-- Signup Php code start here -->

<?php

    include('components/config.php');
    if(isset($_POST['create']))
    {

      $name=$_POST['fullname'];
      $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $pass=$_POST['pass'];
      $conf_pass=$_POST['conf_pass'];

      if($pass==$conf_pass)
      {   
          $errList=array();
          $errList=signupvalid();

          $encpass=md5($pass);
          
          if(!count($errList))
          {   

              $sql="SELECT * FROM auth WHERE email='$email'";

              $result=$conn->query($sql);
        
              if($result->num_rows < 1)

              {
                  $query="INSERT INTO auth(photo,fullname,email,mobile,pass,created)
                
                  VALUES('$path','$name','$email',$mobile,'$encpass',now())";
          
                  if($conn->query($query))
                  {   
                      move_uploaded_file($_FILES['profile_img']['tmp_name'],$path);

                      echo "<script>swal('Your account has been created successfully')</script>";
                  }
                  else
                  {
                    echo "Error: ".$conn->error;
                  }
              }

              else
              {
                echo "<script>swal('This email is already registered with us! Try with new email.')</script>";
              }
          }

      }
      else
      {
        echo "<script>swal('Password did not match to confirm password.')</script>";
      }
    }

?>

<!-- Signup php code ends here -->


<!-- Signin php code start here -->
 
<?php
  
  if(isset($_POST['signin']))
  {

      $email=$_POST['email'];
      $pass=$_POST['pass'];
      $errList=array();
      $errList=signinvalid();

    if(!count($errList))
    {

      $sql="SELECT * FROM auth WHERE email='$email'";

      $result=$conn->query($sql);

      if($result->num_rows>0)
      {
          while($row=$result->fetch_assoc())
          {   

              $encpass=md5($pass);
              if($row['pass']==$encpass)
              {   
                  $_SESSION['user']=$row;

                  echo "<script>swal('Login Successfully')
                  .then((value) =>
                  {
                    window.location='dashboard.php';
                  })
                  </script>";

                  // if(!empty($_POST['saveme']))
                  // {
                  //     setcookie('email',$row['email'],time()+(86400*30));
                  // }

                  
              }

              else

              {
                  echo "<script>swal('Password is wrong')</script>";
              }
          }
      }
      else
      {
          echo "<script>alert('You are not registered with us.')</script>";
      }
    }
  }
?>
<!-- signin php code end here -->

<nav class="navbar navbar-expand-lg navbar-dark bg-my-nav">
  <div class="container-fluid">
    <img src="images/icon.svg" alt="" width="50" height="44">
    <a class="navbar-brand f-logo" href="index.php">Contact.<b>+</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">About Us</a>
        </li>

        <li class="nav-item dropdown" <?php 
        
          if(isset($_SESSION['user']))
          {
            echo "style='display:block'";
          }

          else
          {
            echo "style='display:none'";
          }
        
        ?>>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Activity
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
          </ul>
        </li>
      </ul>
            <!-- Button trigger modal -->
                <input type="button" class="btn btn-info text-light"
                
                <?php

                    if(isset($_SESSION['user']))
                    {
                      echo "value='Logout' onclick='logout()'";
                    }

                    else
                    {
                      echo 'value=" Login / Signup" data-bs-toggle="modal" data-bs-target="#exampleModal"';
                    }
                ?>
                >
                   
            <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-my-nav">
                        <div class="modal-header">
                           <img src="images/logosign.png" alt="" width="50" height="48"><br>
                            <h5 class="modal-title text-light" id="exampleModalLabel">User Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- login and signup pop start here -->

                        <div class="modal-body">
                          <!-- login start -->
                          <form action="" method="POST" id="loginbox">
                            <h5 class="text-light text-center mb3">Login Here</h5><br>
                            <div class="form-label mb-2">Enter your email<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="Email" name="email" class="inpt mb-3" placeholder="Enter your email">
                            <?php

                                if(isset($errList['emailErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['emailErr']."</span>";
                                }
                            ?>
                            <div class="form-label mb-2">Enter your password<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="password" name="pass" class="inpt mb-3" placeholder="Enter your password">
                            <?php

                                if(isset($errList['passErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['passErr']."</span>";
                                }

                            ?>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="saveme" id="flexCheckDefault">
                              <label class="form-check-label text-danger mb-2" for="flexCheckDefault">
                                <b>Remember my info</b>
                              </label>
                            </div>
                                
                            <button class="btn-grad" type="submit" name="signin">Login</button><br>
                            <button class="btn-grad btn-grad-1" type="button" id="signbtn">Signup</button>
                            <span class="form-label mb-2" style="color:white">Don't have an account? Click the button.!</span>
                          </form>
                          <!-- login end -->

                          <!-- signup start -->
                          <form action="" method="POST" enctype="multipart/form-data" id="signbox" style="display:none">
                            <h5 class="text-light text-center mb3">Signup Here</h5><br>
                            
                            <div class="form-label mb-2">Select your profilr picture<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="file" class="inpt mb-3" name="profile_img" > 
                            <?php

                                if(isset($errList['fileErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['fileErr']."</span>";
                                }

                            ?>
                            <div class="form-label mb-2">Full Name<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="text" class="inpt mb-3" placeholder="Enter your name" name="fullname">
                            <?php

                                if(isset($errList['nameErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['nameErr']."</span>";
                                }

                            ?>
                            <div class="form-label mb-2">Email<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="Email" class="inpt mb-3" placeholder="Enter your email" name="email">
                            <?php

                                if(isset($errList['emailErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['emailErr']."</span>";
                                }
                            ?>
                            <div class="form-label mb-2">Mobile<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="tel" class="inpt mb-3" placeholder="Enter your mobile" name="mobile">
                            <?php

                                if(isset($errList['mobErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['mobErr']."</span>";
                                }

                            ?>
                            <div class="form-label mb-2">Password<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="password" class="inpt mb-3" placeholder="Enter your password" name="pass">
                            <?php

                                if(isset($errList['passErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['passErr']."</span>";
                                }

                            ?>
                            <div class="form-label mb-2">Confirm password<sup style="color:red; font-size:20px;">*</sup></div>
                            <input type="password" class="inpt mb-3" placeholder="confirm your password" name="conf_pass">

                            <?php

                                if(isset($errList['ConfPassErr']))
                                {
                                    echo "<span class='text-danger'>".$errList['ConfPassErr']."</span>";
                                }

                            ?>
                            <button class="btn-grad" type="submit" name="create">Signup</button>
                            <br>
                            <button class="btn-grad btn-grad-1" type="button" id="loginbtn">Login</button>
                            <span class="form-label mb-2" style="color:white">Already an account? Click the button.!</span>
                          </form>
                            <!-- signup end -->
                          
                          <!-- login and signup pop end here -->
                        </div>
                        <script>
                          document.getElementById('signbtn').onclick=function()
                          {
                            document.getElementById('signbox').style.display="block";
                            document.getElementById('loginbox').style.display="none";
                          }

                          document.getElementById('loginbtn').onclick=function()
                          { 
                            document.getElementById('loginbox').style.display="block";
                            document.getElementById('signbox').style.display="none";
                          }

                          function logout()
                          {
                            location.href="components/logout.php";
                          }
                        </script>
                        <div class="modal-footer">
                        
                        </div>
                    </div>
                </div>
                </div>
            <!-- Modal ends -->
    </div>
  </div>
</nav>

