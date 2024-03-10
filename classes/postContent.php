<?php
    class PostContent{
        public $id;
        public $content;

        public function __construct($content='') {
            $this->content = $content;
        }
        //Phương thức kiểm tra nhập dữ liệu
        protected function validate(){
            $rs = $this->content != '';
            return $rs;
        }
        // add post 
        public function addPostContent($conn){
            if($this->validate()){  
                //Tạo câu lệnh insert chống SQL injection
                $sql = "
                    insert into postcontent(content)
                    values(:content);
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
                $stmt->execute();

                return $conn->lastInsertId();
            }else{
                return null;
            }
        }
    }
?>