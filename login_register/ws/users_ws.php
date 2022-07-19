<?php
    require_once('../class/class.users.php');
    $USER = new Users();

    $operation = -1;
    if(isset($_POST["op"]))
    {
        $operation = $_POST["op"];
    }
    else if(isset($_GET["op"]))
    {
        $operation = $_GET["op"];
    }

    switch ($operation)
    {
        case 1: //check if email exist
            {
                $email = "XXX";

                if(isset($_GET['email']) && $_GET['email'] != "")
                {
                    $email = $_GET['email'];
                }

                $result = $USER->Email_Exist($email);

               
            }
        break;

       

        case 2: //login
            {
                $validatedUserid = 0;
                $validatedRank = 0;
                $userName = (isset($_GET['uname']) && $_GET['uname'] != "") ? $_GET['uname'] : "";
                $userPass = (isset($_GET['upass']) && $_GET['upass'] != "") ? $_GET['upass'] : "";

                $result = $USER->Validate_User($userName, $userPass);

                if(isset($result[0]["user_id"])){
                    
                   $validatedUserid = $result[0]["user_id"];
                    $validatedRank = $result[0]["user_type"];
                }

                if ($validatedRank == "doctor")
                {

                    session_start();
                    $_SESSION['id_doctor'] = $validatedUserid;
                    $_SESSION['user_type'] = $validatedRank;
                   

                    // header("location: ./doctors/Dr_profile.php");
                    // exit;
                    $result = 1;
                }
                else if ($validatedRank == "patient")
                {


                    session_start();
                    $_SESSION['id_patient'] = $validatedUserid;
                    $_SESSION['user_type'] = $validatedRank;
                   
                    $newpatient = $USER->checkIfnewPatient($validatedUserid);

                    if(!$newpatient){
                    $result = 20;
                    }
                    else {
                    $result = 2;
                    }

                    
                }
                else if ($validatedRank == "admin")
                {


                    session_start();
                    $_SESSION['id'] = $validatedUserid;
                    $_SESSION['user_type'] = $validatedRank;
                    

                    // header("location: ./patients/view_patient_profile.php");
                    // exit;
                    $result = 3;
                }
                else
                {
                    
                    $result = 0;
                }
            }
                

               
        break;

        case 3: //exit
            {
                session_start();

                session_destroy();

                $result = 1;
            }
        break;

       

            case 4: //check if uname exist
                {
                    $userName = "XXX";
    
                    if(isset($_GET['uname']) && $_GET['uname'] != "")
                    {
                        $userName = $_GET['uname'];
                    }
    
                    $result = $USER->Uname_Exist($userName);
                }
                break;

            case 5: //Create account
                {
                    try{
                        if( isset($_GET["uname"]) && isset($_GET["email"]) && isset($_GET["pwd"]) )
                        {
                            $email = $_GET["email"];
                            $pwd = $_GET["pwd"];
                            $name = $_GET["uname"];

                            $pwd = password_hash($pwd,PASSWORD_DEFAULT);
                            
                            $result= $USER->addUser($name,$email,$pwd);
                        }
                       }
                       catch(Exception $ex)
                       {
                           
                       }
                }
                 break;

                
        default:
        {
            $result =  -1;
        }
        break;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($result);



?>