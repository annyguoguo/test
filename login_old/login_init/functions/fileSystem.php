<?php  
function upload($file,$filePath,$fileName,$user){  
    $error = $file['error'];  
    switch ($error){  
        case 0:  
       // 首先需要检测b目录是否存在
            if (!is_dir($filePath."/".$user."/")) mkdir($filePath."/".$user."/"); // 如果不存在则创建
            $fileTemp = $file['tmp_name'];  
            $destination = $filePath."/".$user."/".$fileName;  
            #/www/uploads/  "/www/".
            move_uploaded_file($fileTemp,$destination);  
            return "文件上传成功！";  
        case 1:  
            return "上传附件超过了php.ini中upload_max_filesize选项限制的值！";  
        case 2:  
            return "上传附件的大小超过了form表单MAX_FILE_SIZE选项指定的值！";  
        case 3:  
            return "附件只有部分被上传！";  
        case 4:  
            return "没有选择上传附件！";  
    }  
}  
?>  