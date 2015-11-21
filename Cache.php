<?php

/* Thay đổi lại khu vực nếu bạn không phải ở Hồ Chí Minh */
setlocale(LC_TIME, 'vn_VN');
date_default_timezone_set('Asia/Ho_Chi_Minh');
/* Thay đổi lại khu vực nếu bạn không phải ở Hồ Chí Minh */

Class Cache
{
        Private $Cache_Time = NULL;
        Private $Cache_File = NULL;
 
        Function __construct($Path, $Time, $Data)
        {
                if (!isset($Path, $Time) or ($Path && $Time && $Data) == '') {
                        exit();
                }
                $this->Cache_Time = $Time;
                $this->Cache_File = $Path . md5($Data);
        }
 
        Public Function __ReadCache()
        {
                if (file_exists($this->Cache_File) && time() - $this->Cache_Time < filemtime($this->Cache_File)) {
                        $Text = '<!-- The file is created at ' . date('H:i', filemtime($this->Cache_File)) . " --> \n";
                        $Open = fopen($this->Cache_File, 'r');
                        $Js   = fread($Open, filesize($this->Cache_File)) . '<br />' . $Text;
                        fclose($Open);
                }
                else {
                        $Js = 0;
                }
                return $Js;
        }
 
        Public Function __WriteCache($Data)
        {
                if (file_exists($this->Cache_File)) {
                        $Open = fopen($this->Cache_File, 'w');
                        fwrite($Open, $Data);
                        fclose($Open);
                }
                else {
                        return 0;
                }
        }
}
?>
