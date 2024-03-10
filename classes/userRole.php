<?php
    class UserRole{
        public $userID;
        public $roleID;

        public function __construct($userID, $roleID) {
            $this->userID = $userID;
            $this->roleID = $roleID;
        }

        
    }

?>