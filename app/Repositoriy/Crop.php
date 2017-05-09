<?php namespace App\Repositoriy;

class Crop{
    public static function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
        list($w_i, $h_i, $type) = getimagesize($file_input);
        if (!$w_i || !$h_i) {
            echo '';
            return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom'.$ext;
            $img = $func($file_input);
        } else {
            echo '';
            return;
        }
        if ($percent) {
            $w_o *= $w_i / 100;
            $h_o *= $h_i / 100;
        }
        if (!$h_o) $h_o = $w_o/($w_i/$h_i);
        if (!$w_o) $w_o = $h_o/($h_i/$w_i);
        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
        if ($type == 2) {
            imagejpeg($img_o,$file_output,100);
        } else {
            $func = 'image'.$ext;
            $func($img_o,$file_output);
        }
        imagedestroy($img_o);
    }
    
    public static function crop($file_input, $file_output, $crop = 'square',$percent = false) {
        list($w_i, $h_i, $type) = getimagesize($file_input);
        if (!$w_i || !$h_i) {
            echo '';
            return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom'.$ext;
            $img = $func($file_input);
        } else {
            echo '';
            return;
        }
        if ($crop == 'square') {
            $min = $w_i;
            if ($w_i > $h_i) $min = $h_i;
            $w_o = $h_o = $min;
        } else {
            list($x_o, $y_o, $w_o, $h_o) = $crop;
            if ($percent) {
                $w_o *= $w_i / 100;
                $h_o *= $h_i / 100;
                $x_o *= $w_i / 100;
                $y_o *= $h_i / 100;
            }
            if ($w_o < 0) $w_o += $w_i;
            $w_o -= $x_o;
            if ($h_o < 0) $h_o += $h_i;
            $h_o -= $y_o;
        }
        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
        if ($type == 2) {
            imagejpeg($img_o,$file_output,100);

        } else {
            $func = 'image'.$ext;
            $func($img_o,$file_output);
        }
        imagedestroy($img_o);
    }


    private static function prov($per){
        if (isset($per)) {
            $per = stripslashes($per);
            $per = htmlspecialchars($per);
            $per = addslashes($per);
        }
        return $per;
    }

    public static function input($crop, $filename, $img, $directory){
        $width = self::prov($crop[4]);
        $natural_width = self::prov($crop[5]);
        
        if($width == $natural_width){
            $koef = 1;
        }else{
            $koef = $natural_width/$width;
        }
        
        $x1 = self::prov($crop[0])*$koef;
        $y1 = self::prov($crop[1])*$koef;
        $x2 = self::prov($crop[2])*$koef;
        $y2 = self::prov($crop[3])*$koef;

        self::crop($img, $directory.$filename, array($x1, $y1, $x2, $y2));
        
        return $filename;
    }
}

?>