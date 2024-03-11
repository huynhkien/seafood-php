<?php
if(!isset($_GET['id_content']) || $_GET['id_content']== null){
    echo "<script>window.location = '404.php'</script>";
}else{
    $id = $_GET['id_content'];
}
?>

            <div class="container__content">
                <div class="content--title" style="background-color: #1599db;"><h2 style="padding: 10px 20px;">BÀI VIẾT</h2>
                </div>
                <div class="content--text">
                    <?php
                   
                     $get_content_details = $ct->getcontentbyid($id);
                     if($get_content_details){
                         while($result_content= $get_content_details->fetch_assoc()){
            
                    ?>
                    <div class="text__write">
                        <img src="/admin/uploads/<?php echo $result_content['image'] ?>" width="450px" alt="">
                        <span class="desc--text">
                            <h3><?php echo $result_content['title_content'] ?></h3>
                            <p><?php echo $fm->down_the_line($result_content['desc_content'])?></p>
                            <small>Author: <?php echo $result_content['author'] ?></small>
                            <p>Type: <?php  if($result_content['type_content']==0){
                                        echo 'Product introduction';
                                       }elseif($result_content['type_content']==1){
                                        echo 'News';
                                       }else{
                                        echo 'Share knowledge';
                                       }
                            ?></p>
                            <p>Date_Write: <?php echo $result_content['date_write'] ?></p>
                        </span>
                    </div>
                    <?php
                    }
                }
                    ?>
                    <hr>
                    
                </div>
            </div>    