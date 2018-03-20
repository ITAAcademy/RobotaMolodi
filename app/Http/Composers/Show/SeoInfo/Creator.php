<?php


namespace App\Http\Composers\Show\SeoInfo;


abstract class Creator implements CreatorContract
{
    abstract public function createSeoInfo($src);

    protected function toPlainText($data){
        return preg_replace("/&#?[a-z0-9]+;/i"," ", filter_var( $data , FILTER_SANITIZE_STRING , FILTER_SANITIZE_URL));
    }
}