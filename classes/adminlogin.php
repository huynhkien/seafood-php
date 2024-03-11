<?php
$filepath = realpath(dirname(__FILE__));
 include ($filepath.'/../lib/database.php');
include ($filepath.'/../helpers/format.php') ;


?>
<?php
class adminlogin{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function login_admin($adminUser, $adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass =$this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

        if(empty($adminUser) || empty($adminPass)){
            $alert = "<span class='error'>User and Pass must be not empty</span>";
            return $alert;
        }else{
            $query = "select * from tbl_admin where name_admin = '$adminUser' and pass_admin= '$adminPass' limit 1";
            $result =$this->db->select($query);    
            
            if ($result) {
                session_start();
                $_SESSION['adminUser'] = $adminUser; // Đặt phiên đăng nhập
                header("Location: index.php");
                exit();
            }else{
                $alert = "User and Pass not match";
                return $alert;
            }      
        }

    }
}
?>