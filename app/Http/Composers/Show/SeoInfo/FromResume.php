<?php
/**
 * Created by PhpStorm.
 * User: zakat
 * Date: 20.03.2018
 * Time: 23:47
 */

namespace App\Http\Composers\Show\SeoInfo;

use App\Http\Composers\Show\SeoInfo\Creator as Creator;
use App\Models\SeoInfo;

class FromResume extends Creator
{
    public function createSeoInfo($src)
    {
        $obj = new SeoInfo([
                'title' => $src->position,
                'description' => $src->description]
        );

        $this->formatTitle($obj);
        $this->formatDescription($obj);

        return $obj;
    }

    private function formatTitle($src){
        $src->title = 'Robota Molodi / Vacancy / ' . $src->title;
    }

    private function formatDescription($src){
        $src->description = $this->toPlainText($src->description);
    }
}