


<?php 

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak.");
}


?>

 <div class="inner-banner-area">
                <div class="container">
                    <div class="inner-banner-wrapper">
                        <p>Aradığın Ürünün ve Hizmetin İsmini Girin...</p>
                        <form action="arama-detay" method="POST">

                        <div class="banner-search-area input-group">
                         <input class="form-control" required=""minlength="3"name="searchkeyword" placeholder="anahtar kelimeyi Gir . . ." type="text">
                            <span class="input-group-addon">
                                   <button type="submit"name="searchsayfa">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                            </span>
                         </div>
                        </form>
                        </div>
                    </div>
                </div>
        