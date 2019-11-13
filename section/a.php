<?php
    $arr=$_FILES;
    $info=$_REQUEST;
    $ext=explode(".",$info['filename'][1]);
    $fileName=$info['filename'];
    $baseDir="./".date("Y/m/d",time());
//    var_dump($baseDir);die;
    if(!is_dir($baseDir)){
        mkdir($baseDir,0,777);
    }
    $filePath=$baseDir."/".$fileName;
//    var_dump($filePath);die;
    $tmpName=$arr['data']['tmp_name'];
    $content=file_get_contents($tmpName);
    file_put_contents($filePath,$content,FILE_APPEND);
    $filePath=ltrim($filePath,'.');
    $filePath="/lianxi/11.12".$filePath;
//    var_dump($filePath);die;
    $arrReturn=array(
        'error'=>0,
        'data'=>array(
            'path'=>$filePath,
        ),
    );
    echo json_encode($arrReturn);
?>