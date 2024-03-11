<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class product{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function insert_product($data,$files){
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $category = mysqli_real_escape_string($this->db->link,$data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);
        $Type = mysqli_real_escape_string($this->db->link,$data['select']);
       //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];

        $div = explode(',',$file_name);
        $file_ext= strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $category==""|| $product_desc==""|| $Type=="" ||$price=="" || $file_name==""){
            $alert="<div class='error'>Thông tin không được trống</div>";
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = " insert into tbl_product(name_product, id_cat, desc_product, type, price, image) 
            values('$productName','$category','$product_desc','$Type','$price','$unique_image') ";
            $result =$this->db->insert($query);    
            if($result){
                $alert="<div class='success'>Thêm sản phẩm thành công</div>";
               
            }
                
            }
            return $alert;
          
          
        }


     public function show_product() {
         $query = " select tbl_product.*,tbl_catalog.name_cat
                   from tbl_product 
                   inner join tbl_catalog on tbl_product.id_cat = tbl_catalog.id_cat
                   order by tbl_product.id_product desc
                  ";
         $result =$this->db->select($query);   
         return $result;
     }
     public function getproductbyid($id){
         $query = " select * from tbl_product where id_product='$id' ";
         $result =$this->db->select($query);   
         return $result;
     }
  public function update_product($data,$files,$id){
    $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
    $category = mysqli_real_escape_string($this->db->link,$data['category']);
    $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
    $price = mysqli_real_escape_string($this->db->link,$data['price']);
    $Type = mysqli_real_escape_string($this->db->link,$data['select']);

   //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
    $permited = array('jpg','jpeg','png','gif');
    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_temp=$_FILES['image']['tmp_name'];

    $div = explode(',',$file_name);
    $file_ext= strtolower(end($div));
    $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;
    if($productName=="" || $category==""|| $product_desc==""|| $price=="" ||$Type==""){
        $alert = "<div class='error'>Một trong các trường bị trống !!</div>";
        return $alert;
    }else{
        if(!empty($file_name)){
            //Nếu người dùng chọn ảnh
          if($file_size > 200048){
            $alert= "<div class='error'>Kích thước ảnh quá lớn</div>";
            return $alert;
        }elseif(!in_array($file_ext, $permited) === false){
            $alert= "<div class='error'>Bạn có thể upload:-".implode(', ',$permited)."</div>";
           return $alert;
        }
        move_uploaded_file($file_temp,$uploaded_image);
        $query = " update tbl_product set 
                   name_product='$productName' ,
                   id_cat='$category',
                   desc_product='$product_desc',
                   type=$Type,
                   price='$price',
                   image='$unique_image' 
                  
                   where id_product='$id' ";
    
    }else{
        //Nếu người dùng không chọn ảnh
            $query = " update tbl_product set 
            name_product='$productName' ,
            id_cat='$category' ,
            desc_product='$product_desc' ,
            type=$Type,
            price='$price' 
           
            where id_product='$id' ";
    }
          $result =$this->db->update($query);
          if($result){
              $alert= "<div class='success'>Cập nhập sản phẩm thành công</div>";
          }
                     
      
      }
      return $alert;
     }
  public function delete_product($id){
      $id = $this->fm->validation($id);
      $id = mysqli_real_escape_string($this->db->link,$id);
          $query = "delete from tbl_product where id_product = '$id'";
          $result = $this->db->delete($query);
              $alert="<div class='success'> Sản phẩm đã được xóa thành công</div>";
              return $alert;
          }
          

    public function getproduct_feathered(){
        $query = " select * from tbl_product where type ='0' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct(){
        $limit_product =5;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $pagination_product = ($trang -1 )* 5;
        $query = " select tbl_product.*,tbl_catalog.name_cat
        from tbl_product 
        inner join tbl_catalog on tbl_product.id_cat = tbl_catalog.id_cat
        order by tbl_product.id_product desc 
        limit $pagination_product, $limit_product ";
        $result = $this->db->select($query);
        return $result;
    }
    
      
    public function getproduct_SAVE(){
        $query = " select * from tbl_product where type ='2' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = " select tbl_product.*,tbl_catalog.name_cat
        from tbl_product 
        inner join tbl_catalog on tbl_product.id_cat = tbl_catalog.id_cat
        where tbl_product.id_product = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
      
    }

?>