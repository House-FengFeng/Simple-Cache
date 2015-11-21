<?php

// Name file: Example.php
// Version: 1.0.0.0
// Author: Jkey C Phong

include 'Cache.php';

/* Example */
$Object = New Cache('Cache/','25000','Jkey C Phong');
        // Cache/       : Đường dẫn đến thư mục cache
        // 25000        : Thời gian cache, tính bằng giây
        // Jkey C Phong : Tên file
$ReadCache = $Object->__ReadCache();
if ($ReadCache == 0) {
        $Object->__WriteCache('Xin chào'); // Nội dung cần cache
        if ($Object == 0) {
                Echo 'Không thể mở file!';
        }
}
else {
        echo $ReadCache;
}
/* Example */

?>
