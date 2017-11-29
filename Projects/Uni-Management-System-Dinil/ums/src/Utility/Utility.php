<?php
namespace App\Utility;
class Utility
{
    public static function debug($data = "")
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public static function dd($data = "")
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }

    public static function errorMsz($errors = array()){
        if(!empty($errors)){
            $output = "<div style='color: #ac2925'>";
            $output .="<div>";
            $output .="Please fix these following errors.<br>";
            $output .="</div>";
            $output .="<div>";
            $output .="<ul style='list-style: disc'>";
            foreach($errors as $keay => $error){
                $output .="<li>" . htmlentities($error) . "</li>";
            }
            $output .="</ul>";
            $output .="</div>";
            $output .="</div>";

            return $output;
        }
    }
    public static function error($errors){
        if(!empty($errors)){
            $output = "<span style='color: #ac2925'>$errors</span><br>";
            return $output;
        }
    }
    public static function textShorten($text, $limit= 350){
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ') );
        $text = $text . "...";
        return $text;
    }
}