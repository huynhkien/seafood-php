<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php
class contact{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function add_to_contact($data){
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        $contact = mysqli_real_escape_string($this->db->link,$data['contact']);

        if(empty($name) || empty($address)|| empty($email) || empty($contact||empty($phone))){
            $alert = "<div class='error'> Một trong các trường bị trống !!</div>";
            return $alert;
        }else{
            $contact_insert = "insert into tbl_contact(name, email,address,phone, contact) 
            values('$name','$email','$address','$phone' ,'$contact') ";
            $result =$this->db->insert($contact_insert);    
           
                $alert= "<div class='success'>Bạn đã gửi tin nhắn thành công cho shop</div>";
            
          
        }
        return $alert;


    }

  }

?>