<?php
    class Category{
        public $id;
        public $category;

        public function __construct($id='', $category='') {
            if($id!='' && $category!=''){
                $this->id = $id;
                $this->category = $category;
            }
        }

        //get all categories
        public static function getAllCategories($conn){
            $sql = "select * from categories";
            $stmt = $conn->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); //Trả về 1 đổi tượng
            $stmt->execute(); // Thực hiện câu lệnh sql
            $states = $stmt->fetchAll(); // Lấy ra cái đối tượng
            return $states;
        }
        // get category by name
        public static function getCategory($category, $conn){
            $sql = "select * from categories where category=:category";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); //Trả về 1 đổi tượng
            $stmt->execute(); // Thực hiện câu lệnh sql
            $states = $stmt->fetch(); // Lấy ra cái đối tượng
            return $states;
        }
        // get category by name
        public static function getCategories($categories, $conn){
            $placeholders = implode(',', array_fill(0, count($categories), '?'));
            $sql = "SELECT * FROM categories WHERE category IN ($placeholders)";
            $stmt = $conn->prepare($sql);
            foreach ($categories as $index => $category) {
                $stmt->bindValue($index + 1, $category, PDO::PARAM_STR);
            }
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
            $stmt->execute();
            $states = $stmt->fetchAll();
            return $states;
        }
        // public static function getCategories($categories, $conn){
        //     $categoriesStr = "'" . implode("','", $categories) . "'";
        //     $sql = "select * from categories where category in (:categories)";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->bindValue(':categories', $categoriesStr, PDO::PARAM_STR);
        //     $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category'); //Trả về 1 đổi tượng
        //     $stmt->execute(); // Thực hiện câu lệnh sql
        //     $states = $stmt->fetchAll(); // Lấy ra cái đối tượng
        //     return $states;
        // }
    }
?>