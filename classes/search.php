<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
     class search{
        private $db;
        private $fm;
    
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
    
        }
        function search_key($search){
            $search_key = mysqli_real_escape_string($this->db->link,$search);
            $query = "select * from tbl_product where name_product like '$search_key%'    ";
            $result=$this->db->select($query);  
       
            return $result;
    }
}

?>