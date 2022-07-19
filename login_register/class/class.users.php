<?php
    include_once('../../DAL/DAL.class.php');
    class Users
    {
        private $database;

        function __construct()
        {
            $this->database = new DAL();
        }

        function __destruct()
        {
        }

        public function Email_Exist($email)
        {
            $sql = "SELECT * FROM users WHERE users.email = '".$email."'";

            try
            {
                $result = $this->database->GetData($sql);
            }
            catch(Exception $e)
            {
                throw new Exception();
            }
            
            if($result != null)
            {
                return true;
            }

	        return false;  
        }

        public function Validate_User($uname, $upass)
        {
            $sql = "SELECT * FROM users WHERE users.username = '$uname'";

            try
            {
                $result = $this->database->GetData($sql);
               $password_hashed=$result[0]['password'];
                if(Password_verify($upass,$password_hashed)){
                 return $result;
					
				}
            }
            catch(Exception $e)
            {
                throw new Exception();
            }
           
           
        }

        public function Get_All_Users($keyword)
        {
            $sql = "SELECT id AS U_id, first_name AS fname, last_name AS lname, email AS email, user_name AS username, user_password AS password  FROM users";

            if($keyword != "")
            {
              $sql.= " WHERE first_name like '%".$keyword."%'";
            }

            try
            {
                $result = $this->database->GetData($sql);
            }
            catch(Exception $e)
            {
                throw new Exception();
            }

            return $result;
        }

        public function Uname_Exist($uname)
        {
            $sql = "SELECT * FROM users WHERE users.username = '".$uname."'";

            try
            {
                $result = $this->database->GetData($sql);
            }
            catch(Exception $e)
            {
                throw new Exception();
            }
            
            if($result != null)
            {
                return true;
            }

	        return false;  
        }

        public function addUser($nme, $eml, $pd)
        {
            $sql= "INSERT INTO users (user_id, username, email, users.password, user_type, users.status) VALUES (NULL, '".$nme."',  '".$eml."',  '".$pd."', 'patient',1)";
            try
            {
                $result = $this->database->executeQuery($sql);
                
                return $result;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

        }

        public function deleteUserByID($ItemsList)
	{

         $sql = "DELETE FROM users WHERE id = -1 ";

               foreach($ItemsList as $item)
                   {
                       if($item == "")
                        {
                         break;
                        }

                       $sql .= " OR id = ".$item;
                        
                      }
            try
            {
                $result = $this->database->executeQuery($sql);
                
                return $result;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
		
	}

        public function checkIfnewPatient($uID)
        {
            $sql = "SELECT * FROM patients WHERE patients.p_user_id = '".$uID."'";

            try
            {
                $result = $this->database->GetData($sql);
                 return $result;
            }
            catch(Exception $e)
            {
                throw new Exception();
            }
            
        }
    }

?>