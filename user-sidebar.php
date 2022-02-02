

<?php 

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
    exit("Bu sayfaya rişim yasak.");
}


?>

          
                        <ul class="profile-title">
                            
                                <li><a href="#Products" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> ürünler( 

                                                   <?php
                                                    $urunsay=$db->prepare("SELECT COUNT(kategori_id) as say FROM urun  Where kullanici_id=:id");
                                                    $urunsay->execute(array(
                                                    'id'=>$kullanicicek['kullanici_id']
                                                    ));
                                                    $saycek=$urunsay->fetch(PDO::FETCH_ASSOC);
                                                    echo $saycek['say'];
                                                    ?> )</a>

                                 </li>

                  
                              <li><a href="#Comment" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i> Yorumlar( 

                                            )</a>

                                 </li>    
                                  </ul>                                 