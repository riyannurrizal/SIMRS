<?php
    function icrypt($strData)
    {
        $strData = "-$strData";
        $Code = "1234567890";
        $result = "";
        for ($i = 1; $i <= strlen($strData)-1; $i++) {
            $lokasi = (($i) % strlen($Code)) ;
            $result = $result . chr(ord(substr($strData, $i, 1)) ^ ord(substr($Code, $lokasi, 1))); 
        }
        return $result;
    }
    // $StrToEncrypt="";
    // echo icrypt($StrToEncrypt);
?>