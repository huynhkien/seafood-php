<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class pagination{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function pagination_product(){
        $limit_product =4;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $pagination_product = ($trang -1 )* 4;
        $query = " select * from tbl_product order by id_product desc limit $pagination_product, $limit_product ";
        $result = $this->db->select($query);
        return $result;
    }
}
?>