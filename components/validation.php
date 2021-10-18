<?php
    
    function signupvalid()
    {   
        $errors=array();

        // For profile image validaion code starts here

        global $path,$dir;

        $dir='components/uploads/profile/';

        $path=$dir.$_FILES['profile_img']['name'];

        $ext = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);

        if($_FILES['profile_img']['size']==null)
        {
            $errors['fileErr']="<br>Profile image is mandatory";
        }

        elseif($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='svg' ||$ext=='SVG')
        {
            if(!file_exists($path))
                {

                    if($_FILES['profile_img']['size']<!2000000)
                    {   
                        $errors['fileErr']="<br>The limit of file is exiceed. The Allowed size is 2 MB";
                    }
                }

                else
                {
                    $errors['fileErr']="<br>This file is already uploaded.";
                }
        }

        else
        {
            $errors['fileErr']="<br>This ".$ext." file type is not allowed.";
        }

        // For profile image validaion code ends here

        // For name validaion code starts here

        if(strlen($_POST['fullname'])=="")
        {
            $errors['nameErr']="<br>Name should not be empty.";
        }
        elseif(!preg_match("#^[A-Za-z ]*$#",$_POST['fullname']))
        {
            $errors['nameErr']="<br>Name can't like this.";
        }
        elseif(strlen($_POST['fullname'])<=2)
        {
            $errors['nameErr']="<br>Name can't be less than 2 characters.";
        }

        elseif(strlen($_POST['fullname'])>50)
        {
            $errors['nameErr']="<br>Name can't be more than 50 characters.";
        }
              
        // For name validaion code ends here

        // For email validaion code starts here

            if(!$_POST['email'])
            {
                $errors['emailErr']="<br>Email could not be empty.";
            }

            elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $errors['emailErr']="<br>Invalid email format.";
            }
            elseif(strlen($_POST['email'])<=10)
            {
                $errors['emailErr']="<br>Email can't be less than 10 characters.";
            }

            elseif(strlen($_POST['email'])>100)
            {
                $errors['emailErr']="<br>Email can't be more than 100 characters.";
            }
            
        // For email validaion code ends here

        // For mobile validaion code starts here
            
            if(!$_POST['mobile'])
            {
                $errors['mobErr']="<br>Mobile number should not be empty.";
            }
            
            elseif(!preg_match("#^[6-9]{1}[0-9]*$#",$_POST['mobile']))
            {
                $errors['mobErr']="<br>Not a valid mobile number.";
            }

            elseif(!strlen($_POST['email'])==10)
            {
                $errors['mobErr']="<br>Mobile can't be more than 10 characters.";
            }

        // For mobile validaion code ends here

        // For password validaion code starts here

            if(!$_POST['pass'])
            {
                $errors['passErr']="<br>Password should not be empty.";
            }
            
            elseif(!preg_match("#[0-9]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 Number!";
            }

            elseif(!preg_match("#[A-Z]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 Capital Letter!";
            }

            elseif(!preg_match("#[a-z]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 small Letter!";
            }

            elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+--]/',$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 special characters!";
            }
            elseif(strlen($_POST['pass'])<=6)
            {
                $errors['passErr']="<br>Password can't be less than 6 characters.";
            }

            elseif(strlen($_POST['pass'])>=15)
            {
                $errors['passErr']="<br>Password can't be more than 15 characters.";
            }

        // For password validaion code ends here

        // for confirm password code starts here
            if(!$_POST['conf_pass'])
            {
                $errors['ConfPassErr']="Password should not be empty.";
            }

        //for confirm password ends here
        return $errors;
    }

    function signinvalid()
    {
        $errors=array();
        // For email validaion code starts here

        if(!$_POST['email'])
        {
            $errors['emailErr']="<br>Email could not be empty.";
        }

        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errors['emailErr']="<br>Invalid email format.";
        }
        elseif(strlen($_POST['email'])<=10)
        {
            $errors['emailErr']="<br>Email can't be less than 10 characters.";
        }

        elseif(strlen($_POST['email'])>100)
        {
            $errors['emailErr']="<br>Email can't be more than 100 characters.";
        }
        
    // For email validaion code ends here

        // For password validaion code starts here

            if(!$_POST['pass'])
            {
                $errors['passErr']="<br>Password should not be empty.";
            }
            
            elseif(!preg_match("#[0-9]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 Number!";
            }

            elseif(!preg_match("#[A-Z]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 Capital Letter!";
            }

            elseif(!preg_match("#[a-z]+#",$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 small Letter!";
            }

            elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+--]/',$_POST['pass']))
            {
                $errors['passErr']="<br>Your Password Must Contain At Least 1 special characters!";
            }
            elseif(strlen($_POST['pass'])<=6)
            {
                $errors['passErr']="<br>Password can't be less than 6 characters.";
            }

            elseif(strlen($_POST['pass'])>=15)
            {
                $errors['passErr']="<br>Password can't be more than 15 characters.";
            }

        // For password validaion code ends here
        return $errors;
    }
              
?>
