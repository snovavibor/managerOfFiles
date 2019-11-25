<?php

?>
            <div class="wrap-form">
            
            <form action="" method="POST">
                <input type="hidden" name="nowPath" value="<?php echo $item ?>">
                <button><img src="/assets/images/resources/folder.png" alt=""></button>
                <p><?= pathinfo($item)['filename'] ?></p>
                
            </form>
            
            </div>