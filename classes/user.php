<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
include_once ($filepath.'/../classes/cart.php');


?>
<?php
class user{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function register($data){
      $username = mysqli_real_escape_string($this->db->link,$data['username']);
      $email = mysqli_real_escape_string($this->db->link,$data['email']);
      $password= mysqli_real_escape_string($this->db->link,$data['password']);
      $phone= mysqli_real_escape_string($this->db->link,$data['phone']);
      $address= mysqli_real_escape_string($this->db->link,$data['address']);
      if(empty($username)|| empty($email)|| empty($password) || empty($phone)|| empty($address)){
         $alert = "<span class='error'>One key field is missing</span>";
       
  }else{
    $check_email = "select * from tbl_user where email='$email' limit 1" ;
    $result_email=$this->db->select($check_email);
    if($result_email){
      $alert =  "<span class='error'>Email already exists</span>";
    }else{
      $query ="insert into tbl_user(name_login, pass_login, address, email, phone) 
      values('$username','$password','$address','$email' ,'$phone') ";
      $result_user=$this->db->insert($query);
      if($result_user){
        $alert =  "<span class='success'>Insert email successfully</span>";

      }else{
        $alert =  "<span class='error'>Insert Email not successfully</span>";

      }
    }
  }
  return $alert;
}
public function check_password($data){
          $user_login =mysqli_real_escape_string($this->db->link,$data['email']);
          $pass_login =mysqli_real_escape_string($this->db->link, $data['password']);
          if(empty($user_login) || empty($pass_login)){
            $alert = "<span class='error'>Please enter username and password</span>";
        }
        else{
          $check_login= "select * from tbl_user where email='$user_login' and pass_login='$pass_login' ";
                  $result_login=$this->db->select($check_login);
          if($result_login){
            $value=$result_login->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $value['id_login'];
              header("Location:index.php?user=cart");
              exit();
                

            
        }else{
          $alert = "<span class='error'>User and Pass not match</span>";
        }
}
return $alert;
}
            public function get_info_id($id){
              $query= "SELECT * FROM tbl_user where id_login= $id";
              $result=$this->db->select($query);
              return $result;
  }
              public function show_user(){
                $query="SELECT * FROM tbl_user";
                $result=$this->db->select($query);
                return $result;
              }
              public function update_user($id,$data){
                $name_cus=mysqli_real_escape_string($this->db->link,$data['name']);
                $pass_cus=mysqli_real_escape_string($this->db->link,$data['pass']);
                $address=mysqli_real_escape_string($this->db->link,$data['address']);
                $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
                $email=mysqli_real_escape_string($this->db->link,$data['email']);
                $id_user=$id;
                if(empty($name_cus) || empty($address) || empty($phone) || empty($email) || empty($id_user)){
                  $alert= "<div class='error'>Một trong các trường bị trống</div>";
                
                }else{
                  $query="UPDATE tbl_user SET
                          name_login='$name_cus',
                          pass_login='$pass_cus',
                          address = '$address',
                          phone= '$phone',
                          email = '$email'
                          WHERE id_login='$id'";
                    $result=$this->db->insert($query);
                    $alert = "<div class='success'>Cập nhập thông tin khách hàng thành công</div>";
                }
                return $alert;

}
 public function delete_user($id){
  $query="DELETE FROM tbl_user WHERE id_login = '$id'";
  $result=$this->db->delete($query);
  $alert= "<div class='success'>Xóa khách hàng thành công</div>";
  return $alert;
}
}
?>