<?php

namespace App\Libraries;

class Imageloader
{
    function __construct()
    {
    }
    public function fCheckImage($url){
        
        $isExists = file_exists("public/".$url);
        
        if($isExists && $url !==''){
            return base_url($url);
        }else{
            return base_url('assets/image/noimage.jpg');
        }
      //  dd($isExists);
    }
}
