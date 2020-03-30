<?php
    class Account {
        private $errorArray;
        private $con;
        public function  __construct($con)
        {
            $this->con = $con;
            $this -> errorArray = array();

        }
        public function register($un, $fn,$ln,$em,$em2, $pw,$pw2){
            $this -> validateUsername($un);
            $this -> validateFirstName($fn);
            $this -> validateLastName($ln);
            $this -> validateEmails($em,$em2);
            $this -> validatePasswords($pw,$pw2);

            if(empty($this->errorArray)){
                //insert into db
                return insertUserDetails($un,$fn,$ln,$em,$pw);
            }else{
                return false;
            }
        }
        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error ="";

            }
            return "<span class='errorMessage'>$error</span>";
        }


        public function insertUserDetails($un, $fn, $ln, $em, $pw){
            $encryptedPw = md5 ($pw);
            $profilePic = "assets/images/profile-pics/profile_pic.jpg";
            $date = date("Y-n-d");
            $result = mysql_query($this->con,"INSERT INTO users VALUE("","$un","$fn","$ln","$em","$encryptedPw","$date","$profilePic")");
            return $result;
        }
        private function validateUsername($un){
            if (strlen($un) > 25 || strlen($un) < 5){
                array_push($this->errorArray,Constants::$userNameCharacter);
                return;
            }
            //TODO : check if username exists
        }
        private function validateFirstName($fn){
            if (strlen($fn) > 25 || strlen($fn) < 2){
                array_push($this->errorArray,Constants::$firstNameCharacter);
                return;
            }
        }
        private function validateLastName($ln){
            if (strlen($ln) > 25 || strlen($ln) < 2){
                array_push($this->errorArray,Constants::$lastNameCharacter);
                return;
            }

        }
        private function validateEmails($em, $em2){
            if ($em != $em2){
                array_push($this-> errorArray, Constants::$emailDoNotMatch);
                return;
            }
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                array_push($this-> errorArray, Constants::$emailInvalid);
                return;
            }
            //TODO:  Check that username hasn't already been used

        }
        private function validatePasswords($pw, $pw2){
            if($pw != $pw2){
                array_push($this->errorArray,Constants::$passwordsDoNotMatch);
                return;
            }
            if(preg_match('/[^A-Za-z0-9]/',$pw)){
                array_push($this->errorArray,Constants::$passwordsNotAlphanumeric);
                return;
            }
            if (strlen($pw) > 30 || strlen($pw) < 6){
                array_push($this->errorArray,Constants::$passwordsCharacter);
                return;
            }
        }


    }