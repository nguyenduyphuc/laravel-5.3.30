<?php
namespace App\Http\Helpers;

use App\Category;

trait BladeHelper
{
    /**
     * Assign default value when it doesn't have value and filter all the request value
     * --------------------------------------------------------------------------------
     * @param $request
     * @param $default
     * @return mixed
     */

    public  static function stripUnicode($str){
        if (!$str) {
            return false;
        }
        $unicode = array(
            'a'=>'á|à|ạ|ả|á|ã|â|ấ|ầ|ậ|ẩ|ẫ|ă|ẵ|ặ|ắ|ằ',
            'A'=>'Á|À|Â|Ä|Ă|Ā|Ã|Å|Ą|Ạ|Ă|Ẳ|Ằ|Ắ|Ặ|Ẵ|Ấ|Ầ|Ẩ|Ậ|Ẫ',
            'AE'=>'Æ',
            'd'=>'đ',
            'D'=>'Đ',
            'E'=>'É|È|Ė|Ễ|Ế|Ề|Ệ|Ể|Ẻ|Ẹ|Ê|Ë|Ě|Ē|Ę|Ə',
            'e'=>'é|è|ẻ|ẹ|ẽ|ê|ế|ề|ể|ệ|ễ',
            'i'=>'í|ì|i|î|ï|ī|į|ỉ|ị|ĩ',
            'I'=>'|Í|Ị|Ì|Ỉ|Ĩ|',
            'o'=>'ó|ò|ỏ|ọ|ó|ồ|ố|ô|ộ|ổ|ö|õ|ő|ø|ơ|œ|ơ|ờ|ở|ợ|ỡ|ớ|ộ',
            'O'=>'Ó|Ò|Ô|Ö|Õ|Ő|Ø|Ơ',
            'u'=>'ú|ù|ủ|ụ|û|ü|ŭ|ū|ů|ų|ű|ư|ừ|ử|ữ|ự|ứ|ũ',
            'U'=>'Ú|Ù|Û|Ü|Ŭ|Ū|Ů|Ų|Ű|Ư|Ụ|Ứ|Ừ|Ử|Ự|Ữ',
            'y'=>'ý|ý|ỵ|ỷ|ỹ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỵ|Ỹ',
            '-'=>'/|',
            ''=>')|/|&|,|+|(|-|.',
            );
        foreach ($unicode as $khongdau => $codau) {
            $arr=explode("|", $codau);
            $str=str_replace($arr, $khongdau, $str);
        }
        return $str;
    }
    public static function convert_lang($str){
        $str=trim($str);
        if ($str=="") {
            return "";
        }
        $str=str_replace('"', '', $str);
        $str=str_replace("'", '', $str);
        $str=self::stripUnicode($str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        $str=str_replace(' ', '-', $str);
        $str=str_replace('--', '-', $str);
        $str=str_replace('---', '-', $str);
        return $str;
    }

    public static function get_id($str){
        $id=explode('-', $str)[0];
        return $id;
    }

    public function getCategories()
    {
        return Category::where('parent',0)->get();
    }


}