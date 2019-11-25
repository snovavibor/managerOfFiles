<?php
session_start();
require_once __DIR__.'/assets/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/assets/libs.php';

include 'assets/views/_header.php';



$startPath = $_SERVER['DOCUMENT_ROOT'];

if(!empty($_POST['nowPath'])){
    
    $catalog = $_POST['nowPath'];
}else{
    
    $catalog =  cutOfPath($startPath,'/');
}

$tot = [];
?>

<div class="container">
    <div class="row">
    <div class="back">
        <form action="" method="POST">
        <input type="hidden" name="nowPath" value="<?php echo cutOfPath($catalog, '/') ?>">
        <button><img src="<?php echo'/assets/images/interface/back.png' ?>" alt=""></button>
        </form>
        </div>
        <div class="screenManager">
        
            <?php
            
            
if(is_dir($catalog)){
     if( $dh = opendir($catalog) ){
       
        while( false !==$file = readdir($dh)){
           
            if($file != '.' && $file !='..'){
                $pt = FolderOrFile($file, $catalog);
                //сортировка массива директории в начало, файлы в конец
                if(strrpos($pt,'*')){
                    array_unshift($tot, $pt);
                }else{
                    $tot[] = FolderOrFile($file, $catalog);
                }               
                              
            }
                                                          
        }
        
        closedir($dh);
        renderResource($tot);
        
     }
}
?>
        </div>
        
        <div class="screenPreview"></div>
    </div>
</div>
<?php






include 'assets/views/_footer.php';
