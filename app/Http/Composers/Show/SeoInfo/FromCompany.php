<?php
/**
 * Created by PhpStorm.
 * User: zakat
 * Date: 20.03.2018
 * Time: 23:48
 */

namespace App\Http\Composers\Show\SeoInfo;

use App\Http\Composers\Show\SeoInfo\Creator as Creator;
use App\Models\SeoInfo;

class FromCompany extends Creator
{
    public function createSeoInfo($src)
    {
        $obj = new SeoInfo([
                'title' => $src->company_name,
                'description' => $src->description]
        );

        $this->formatTitle($obj);
        $this->formatDescription($obj);

        return $obj;
    }

    private function formatTitle($src){
        $src->title = 'Robota Molodi / Company / ' . $src->title;
    }

    private function formatDescription($src){
        $src->description = $this->toPlainText($src->description);
    }
}