<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../classes/cart.php');

?>
<?php
class order{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function create_order($id_user){
        $sID = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid='$sID'";
        $get_cart = $this->db->select($query);
    
        if ($get_cart) {
            $query_order = "INSERT INTO tbl_order (id_user, id_cart, name_product, quantity, price, image)
                            SELECT '$id_user', id_cart, name_product, quantity, price, image
                            FROM tbl_cart
                            WHERE sid='$sID'";
    
            $insert_payment = $this->db->insert($query_order);
    

        }

    return $insert_payment;
    }
      

    public function show_order(){
        $query=" SELECT
                 co.*,
                 u.id_login,
                 u.name_login,
                 u.phone,
                 u.email,
                 u.address
            FROM
                tbl_order co
            JOIN
                tbl_user u ON co.id_user = u.id_login";
        $show_user= $this->db->select($query);
        return $show_user;  
    }
    public function confirm_order($id_order,$id_user,$name_user,$data){
        $status = mysqli_real_escape_string($this->db->link,$data['status']);
        $date = mysqli_real_escape_string($this->db->link,$data['date']);
        $order_id=$id_order;
        $user_id=$id_user;
        $user_name=$name_user;
        if(empty($status) && empty($date)){
            $alert="<div class='error'>Vui lòng xác nhận đơn hàng</div>";
        }else{
        $query="INSERT INTO tbl_delivery(id_order, id_user,name_user ,status_delivery, receive_date)
                VALUES('$order_id','$user_id','$user_name','$status','$date')";
        $result= $this->db->insert($query);
        $alert="<div class='success'>Đơn hàng sẽ được tiến hành vận chuyển</div>";

        }
        return $alert;


}
     public function check_order($id) {
    $query = "SELECT * 
              FROM tbl_order
              JOIN tbl_delivery ON tbl_order.id_order = tbl_delivery.id_order
              WHERE tbl_order.id_user = $id";

    $result = $this->db->select($query);
    return $result;
}
public function info_status_order(){
    $query = "SELECT *
              FROM tbl_order
              INNER JOIN tbl_delivery ON tbl_order.id_order = tbl_delivery.id_order";
    $result = $this->db->select($query);
    return $result;
}
public function delete_status_order($id){
    $query="DELETE  FROM tbl_order
                         
                         WHERE id_order='$id'";
    $result = $this->db->delete($query);
    if($result){
        $alert="<div class='success'>Thông tin trạng thái đơn hàng đã được xóa!!!</div>";
}
return $alert;
       
}
      public function update_status_order($id){
        $text="Đã nhận hàng";   
        $query= "update tbl_delivery set
                 status_delivery='$text'
                 where id_delivery='$id' ";
        $result = $this->db->update($query);
        return $result;

}
}