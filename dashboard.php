<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('components/head.php'); ?>
    <title>Dashboard</title>
</head>
<body>

        <?php include('components/navbar.php'); ?>
        
        <div class="container">
            <h2 class="text-center text-primary mt-3">Welcome in contact app</h2>
            <hr class="text-danger">
            <div class="d-flex justify-content-around">
                <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
                <a class="btn btn-primary" href="addcontact.php">Add Contact</a>
            </div>
            <hr class="text-danger">

            <!-- Contact List Started -->

            <div class="manual-card">
                <div class="row">

                <?php

                    if(isset($_SESSION['user']))
                    {
                            $authEmail=$_SESSION['user']['email'];
                    }

                    $sql="SELECT * FROM mycontacts WHERE authEmail='$authEmail'";

                    $result=$conn->query($sql);

                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            $mobArray=explode(",",$row['userMobile']);
                            $emArray=explode(",",$row['userEmail']);
                            echo '
                                <div class="col-md-2">
                                    <div class="card">
                                        <img src="'.$row['userProfile'].'" class="card-img-top userProfile" alt="...">
                                        <div class="card-body d-flex flex-column align-itmes-center">
                                            <h5 class="card-title text-center text-danger">'.$row['userName'].'</h5>
                                            <p class="card-text text-center" style="font-weight:bold;">'.$mobArray[0].'</p>
                                            <button  class="button_customize btn btn-primary" data-modal="modalOne'.$row['userId'].'" >More Info..</button>
                                            <div id="modalOne'.$row['userId'].'" class="modal_Customize">
                                                <div class="modal_content_customize">
                                                    <div class="customize-form">
                                                    <form action="/">
                                                        <a class="close_customize">&times;</a>
                                                        <h4 class="text-center mb-3 pop_c">Contact Details</h4>
                                                        <hr>
                                    <p class="mb-2" style="font-weight:bold; font-size:17px;">Name: <span style="font-weight:normal;">'.$row['userName'].'</span></p>';
                                                        

                                                        $mcount=1;
                                                        foreach($mobArray as $oneMobile)
                                                        {
                                                            echo "<p><b>Mobile Number ".$mcount." :</b>
                                                            
                                                            <a class='text-decoration-none' href='tel:".$oneMobile."'>".$oneMobile."</a>

                                                            </p>";
                                                            $mcount++;
                                                        }

                                                        $ecount=1;
                                                        foreach($emArray as $oneEmail)
                                                        {
                                                            echo "<p><b>Email ".$ecount." :</b>
                                                            
                                                            <a class='text-decoration-none' href='mailto:".$oneEmail."'>".$oneEmail."</a>

                                                            </p>";
                                                            $ecount++;
                                                        }
                                                        echo '
                                    <p class="mb-2" style="font-weight:bold; font-size:17px;">Address: <span style="font-weight:normal;">'.$row['userAddress'].'</span></p>';

                                                        if($row['updated']!=null)
                                                        {
                                                            $date1=date_create($row['updated']);
                                                            echo "<i>Contact Updated on <b>".date_format($date1,'d-M-Y h:i A')."</b></i>";
                                                        }

                                                        $date=date_create($row['created']);
                                                        echo "<i>Contact Created on <b>".date_format($date,'d-M-Y h:i A')."</b></i>";
                                                        
                                                        echo '

                                                    <hr>

                                                    <a href="editcontact.php?q='.$row['userId'].'&f='.$row['userProfile'].'" class="text-decoration-none btn btn-primary">Edit</a>
                                                    <a href="deletecontact.php?q='.$row['userId'].'&f='.$row['userProfile'].'" class="text-decoration-none btn btn-danger">Delete</a>
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>    
                                        </div>
                                    </div>
                                </div>';
                        }
                    }

                    else
                    {
                        echo "<h2 class='text-center text-danger'>No Contact Found</h2>";
                    }
                ?>
                </div>
            </div>
            <!-- Contact List Ended -->
            
        </div>
        
        <?php include('components/script.php'); ?>

        <script src="js/showmodal.js"></script>
</body>
</html>
<?php           
                if(!isset($_SESSION['user']))
                {
                    echo "<script>location.href='index.php'</script>";   
                }
    
    
?>