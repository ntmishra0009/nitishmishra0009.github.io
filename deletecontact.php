<!DOCTYPE html>
<html>
    <head>
        <title>Delete Contact-Contact App</title>
    </head>

<body>
<?php

    include('components/config.php');

    if(!isset($_SESSION['user']))
    {
        echo "<script>location.href='index.php'</script>";   
    }

    $id=$_GET['q'];

    $file=$_GET['f'];

    if(isset($_GET['q'])&&isset($_GET['f']))
    {
        $sql="DELETE FROM mycontacts WHERE userId=$id";

        if($conn->query($sql)===TRUE)
        {   
            //it will delete your file from project folder
            unlink($file);

            echo '<script>swal({
                    title:"Delete:",
                    text:"Contact Deleted Successfully",
                    icon: "success",
              })
              .then((value) =>
                  {
                    window.location="dashboard.php";
                  })
                </script>';
        }

        else
        {
            echo '<script>swal({
                title:"Error:",
                text:"Something went wrong'.$conn->error.'",
                icon: "error",
              })
                .then((value) =>
                  {
                    window.location="dashboard.php";
                  })
                </script>';
        }
    }

?>
</body>
</html>