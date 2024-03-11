<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php
class category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function insert_category($catName){
        $catName = $this->fm->validation($catName);
        

        $catName = mysqli_real_escape_string($this->db->link,$catName);

        if(empty($catName)){
            $alert= "<div class='error'>Vui lòng điền đầy đủ thông tin!!</div>";
            return $alert;
        }else{
            $query = " insert into tbl_catalog(name_cat) values('$catName') ";
            $result =$this->db->insert($query);    
            $alert= "<div class='success'>Thêm danh mục sản phẩm thành công</div>";
          
        }
        return $alert;

    }
    public function show_category() {
        $query = " select * from tbl_catalog order by id_cat desc  ";
        $result =$this->db->select($query);   
        return $result;
    }
    public function getcatbyid($id){
        $query = " select * from tbl_catalog where id_cat='$id' ";
        $result =$this->db->select($query);   
        return $result;

    }
    public function update_category($catName,$id){
        $catName = $this->fm->validation($catName);
        

        $catName = mysqli_real_escape_string($this->db->link,$catName);
        $id = mysqli_real_escape_string($this->db->link,$id);
            $query = " update tbl_catalog set name_cat='$catName' where id_cat='$id' ";
            $result =$this->db->update($query); 

            $alert= "<div class='success'>Cập nhật thành công danh mục</div>";
    
            return $alert;

          
        }
    public function delete_category($id){
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link,$id);
          $query = "delete from tbl_catalog where id_cat = '$id'";
          $result = $this->db->delete($query);
          $alert="<div class='success'> Xóa danh mục sản phẩm thành công</div>";
             return $alert;
            }



}
?>