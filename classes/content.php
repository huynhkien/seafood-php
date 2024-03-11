<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php
class content{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function add_to_content($data,$files){
        $title_content = mysqli_real_escape_string($this->db->link,$data['title_content']);
        $name_admin = mysqli_real_escape_string($this->db->link,$data['author']);
        $desc_content = mysqli_real_escape_string($this->db->link,$data['desc_content']);
        $date_write = mysqli_real_escape_string($this->db->link,$data['date_write']);
        $type_content = mysqli_real_escape_string($this->db->link,$data['select']);
       //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];

        $div = explode(',',$file_name);
        $file_ext= strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($title_content=="" || $name_admin==""|| $desc_content==""|| $type_content=="" ||$date_write=="" || $file_name==""){
            $alert = "<div class='error'> Một trong các trường bị trống !!</div>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "insert into tbl_content(author, desc_content, image, title_content, date_write, type_content) 
            values('$name_admin','$desc_content','$unique_image', '$title_content','$date_write', '$type_content') ";
            $result =$this->db->insert($query);    
            if($result){
                $alert= "<div class='success'>Thêm thành công bài viết</div>";
            }else{
             
                $alert= "<div class='error'>Thêm bài viết không thành công!!!</div>";
                
            }
            return $alert;
          
        }


    }
    public function show_content() {
        $query = " select * from tbl_content
                  order by id_content desc
                 ";
        $result =$this->db->select($query);   
        return $result;
    }
    public function getcontentbyid($id){
        $query = " select * from tbl_content where id_content='$id' ";
        $result =$this->db->select($query);   
        return $result;
    }
    public function update_content($data,$files,$id){
        $title_content = mysqli_real_escape_string($this->db->link,$data['title_content']);
        $name_admin = mysqli_real_escape_string($this->db->link,$data['author']);
        $desc_content = mysqli_real_escape_string($this->db->link,$data['desc_content']);
        $date_write = mysqli_real_escape_string($this->db->link,$data['date_write']);
        $type_content = mysqli_real_escape_string($this->db->link,$data['select']);
       //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];
    
        $div = explode(',',$file_name);
        $file_ext= strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        if($title_content=="" || $name_admin==""|| $desc_content==""|| $type_content=="" ||$date_write==""){
            $alert="<div class='error'>Thông tin không được trống</div>";
          
        }else{
            if(!empty($file_name)){
                //Nếu người dùng chọn ảnh
              if($file_size > 200048){
                $alert="<div class='error'>Hình ảnh có kích thước quá lớn!!!</div>";
               
            }elseif(!in_array($file_ext, $permited) === false){
                $alert= "<div class='error'>Bạn chỉ có thể upload:-".implode(', ',$permited)."</div>";
              
            }
            move_uploaded_file($file_temp,$uploaded_image);
            $query = " update tbl_content set 
                       author='$name_admin', 
                       desc_content='$desc_content', 
                       image='$unique_image', 
                       title_content= '$title_content', 
                       date_write = '$date_write', 
                       type_content = '$type_content'
                      
                       where id_content='$id' ";
        
        }else{
            //Nếu người dùng không chọn ảnh
                 $query = " update tbl_content set 
                 author='$name_admin', 
                 desc_content='$desc_content', 
                title_content= '$title_content', 
                 date_write = '$date_write', 
                 type_content = '$type_content'
                
                 where id_content='$id' ";
        }
              $result =$this->db->update($query);
              if($result){
                  $alert= "<div class='success'>Update content successfully</div>";
              }else{
                  $alert= "<div class='error'>Update content not successfully</div>";
                    
          
          }
              
         }
         return $alert;   
        }
        public function delete_content($id){
            $id = $this->fm->validation($id);
            $id = mysqli_real_escape_string($this->db->link,$id);
                $query = "delete from tbl_content where id_content = '$id'";
                $result = $this->db->delete($query);
                if($result){
                    $alert="<div class='success'> Delete content successfully</div>";
                }else{
                    $alert="<div class='error'> Delete content not be successfully</div>";
                 
                }
                return $alert;
           }
      public function getcontent(){
        $limit_content =4;
        if(!isset($_GET['trang'])){
            $trang=1;
        }else{
            $trang=$_GET['trang'];
        }
        $pagination_content = ($trang -1 )* 4;
        $query = " select * from tbl_content order by id_content desc limit $pagination_content,  $limit_content ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcontent_hot(){
        $query = " select * from tbl_content where type_content ='3' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_content(){
        $query = " select * from tbl_content ";
        $result = $this->db->select($query);
        return $result;
    }
  }

?>