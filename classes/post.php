<?php
    class Post{
        public $id;
        public $postContentID;
        public $postTitle;
        public $postImg;
        public $stateID;
        public $userID;
        public $date;

        public function __construct($postTitle, $postContentID, $postImg, $stateID, $userID, $date) {
            $this->postTitle = $postTitle;
            $this->postContentID = $postContentID;
            $this->postImg = $postImg;
            $this->stateID = $stateID;
            $this->userID = $userID;
            $this->date = $date;
        }
        //Phương thức kiểm tra nhập dữ liệu
        protected function validate(){
            $rs = $this->postContentID != '' && $this->postTitle != '' && 
                $this->stateID && $this-> userID;
            return $rs;
        }
        // add post 
        public function addPost($conn){
            if($this->validate()){  
                //Tạo câu lệnh insert chống SQL injection
                $sql = "
                    insert into posts(postTitle, postContentID, postImg, stateID, userID, date)
                    values(:postTitle, :postContentID, :postImg, :stateID, :userID, :date);
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':postTitle', $this->postTitle, PDO::PARAM_STR);
                $stmt->bindValue(':postContentID', $this->postContentID, PDO::PARAM_STR);
                $stmt->bindValue(':postImg', $this->postImg, PDO::PARAM_STR);
                $stmt->bindValue(':stateID', $this->stateID, PDO::PARAM_STR);
                $stmt->bindValue(':userID', $this->userID, PDO::PARAM_STR);
                $stmt->bindValue(':date', $this->date, PDO::PARAM_STR);
                $stmt->execute();

                return $conn->lastInsertId();
            }else{
                return null;
            }
        }
        
    }
?>