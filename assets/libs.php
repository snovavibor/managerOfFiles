<?php
/**
 * формирование массива с расширениями файлов для icons
 */
$iconDir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/resources';

    if(is_dir($iconDir)){
    if( $handler = opendir($iconDir) ){
        while( false !==$iconFile = readdir($handler)){
            if($iconFile != '.' && $iconFile != '..'){
                $imgIcons[] = cutOfPath($iconFile,'.');
                
            }
            
        }
        $_SESSION['imgIcons'] = $imgIcons;
            closedir($handler);
    }
}




