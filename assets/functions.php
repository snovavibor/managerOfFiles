<?php


/**
*@param string
*обрезает путь на один уровень
*/
function cutOfPath($path,$des)
{
    $temp = substr( $path, 0, strripos($path, $des));
    return $temp;
}

/*
*добавляет метку к директориям для сортировки в массиве
*/
function folderOrFile($file, $catalog)
{
    
    if(filetype($catalog.'/'.$file)== 'dir'){
   
         return  $catalog.'/'.$file.'*';
        
    }else{

        return  $catalog.'/'.$file;                
    }
            
}

/**
 * определяет расширение файла
 * @param string , int
 */
function chek_FormatFile($file, $offset)
{
    return $format = substr(strrchr($file, "."), 1);
}



function renderResource($arr)
{
   
    foreach($arr as $item){
        if(strrpos($item,'*')){
            $item = substr($item ,0 , strripos($item,'*') );
           include 'assets/views/_folder.php'; 
        }else{
            include 'assets/views/_files.php';
        }       
        
    }
}



/**
 * получает icon файла 
 */
function getIconFile($item)
{
    
   if( in_array(chek_FormatFile($item, '.') , $_SESSION['imgIcons']) ){
        
        return chek_FormatFile($item, '.');
    }else{
        return 'uncknow';
    }
    
}
