
    <section class="recipe">
    <div class="recipe__body">
                <div class="body--title"><h2>CHIA SẺ BÀI VIẾT VỀ MỘT SỐ CÔNG THỨC</h2>
                    <p>Tổng hợp các bài viết chuyên sâu và công thức chế biến các loại hải sản phổ biến hiện nay!</p>
                </div>
                <div class="body--items">
                    <?php
                    $content_list = $ct->getcontent();
                    if($content_list){
                        while($result_content = $content_list->fetch_assoc()){
                    ?>
                    <a class="items__text" href="index.php?user=recipe_detail&id_content=<?php echo $result_content['id_content'] ?>" style="text-decoration:none; color:black;">
                        <img src="/admin/uploads/<?php echo $result_content['image'] ?>" width="200px" alt="">
                        <span class="text-content">
                            <h3><?php echo $result_content['title_content'] ?></h3>
                            <p><?php echo $fm->textShorten($result_content['desc_content'],30) ?></p>
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
                    </a>
                    <?php
                    }
                }
                    ?>

                    
                </div>
                <div style="text-align:center;">
                    <?php $content_all = $ct->get_all_content();
                    $content_count = mysqli_num_rows($content_all);;
                    $content_button = ceil($content_count/4);
                    $i=1;
                   for($i=1;$i<=$content_button;$i++){
                    echo '<a style="margin:0 5px;text-decoration:none;background-color:#ccc;padding:5px; " href="index.php?user=recipe&trang='.$i.'">'.$i.'</a>';
                    
                   }
                    ?>
                </div>
     </div>
</section>
