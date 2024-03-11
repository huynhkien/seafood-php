<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
class cart{
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function add_to_cart($quantity, $id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sID = session_id();
        // $check_cart = "select * from tbl_cart where id_product ='$id' and sid='$sID'";

        $query = "select * from tbl_product where id_product = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $image = $result['image'];
        $name_product = $result['name_product'];
        $price = $result['price'] * $quantity;
        $query_insert = " insert into tbl_cart(id_product, quantity, sid, image, price, name_product) values('$id','$quantity','$sID','$image','$price','$name_product') ";
        $result_insert =$this->db->insert($query_insert);    
        if($result_insert){
            header('Location:index.php?user=cart');
        }else{
         
           header('Location:404.php');
        }
    
      
    }
    public function get_product_cart(){
        if (isset($_SESSION['user_id'])) {
        $sID = session_id();
        $query= "select * from tbl_cart where sid ='$sID'";
        $result =$this->db->select($query);
        if($result==""){
            return 0;
        }
    
    }else{
        $sID = session_id();
        $query= "select * from tbl_cart where sid ='$sID'";
        $result =$this->db->select($query);
        if($result==""){
            return 0;
        }
    
    }
    return $result; 
    }
    public function update_quantity_cart($quantity,$id_cart){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id_cart = mysqli_real_escape_string($this->db->link, $id_cart);
        
        $query = "update tbl_cart set 
                   quantity='$quantity' 
                   where id_cart='$id_cart' ";
        $result = $this->db->update($query);            
            $alert = "<div class='success'>Product quantity update successfullly</div>";
        return $alert;
    }
    public function delete_cart($id_cart){
        $id_cart = mysqli_real_escape_string($this->db->link,$id_cart);
            $query = "delete from tbl_cart where id_cart = '$id_cart'";
            $result = $this->db->delete($query);
            header('Location:index.php?user=cart');
           
       }
       public function get_id_cart($id_cart){
        $query= "select * from tbl_cart where id_cart ='$id_cart'";
        $result =$this->db->select($query);
        return $result;
    } public function get_sid_cart(){
        $sid = session_id();
        $query= "select * from tbl_cart where sid ='$sid'";
        $result =$this->db->select($query);
        return $result;
    }
    
  }

?>