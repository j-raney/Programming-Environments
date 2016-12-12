<?php

/* 
Plugin Name: Project Skelify
Plugin URI: http://plugin.skeletonmemes.pw/
Description: With this plugin, your WordPress website will be guaranteed to be spookier!
Version: 1.0.0
Author: Jack Raney
Author URI: http://author.skeletonmemes.pw/
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

function skelepuns($text)
{
    $filtered = $text;
    
    $replacee = array("humorous", "funny", "phone",  "mistake", "error");
    $pun = array("humerus", "humerus", "bone", "boner", "boner");
    
    $badwords = array("shit", "fuck", "ass", "damn", "hell");
    
    $filtered = str_replace($replacee, $pun, $filtered);
    $filtered = str_replace($badwords, '(My bones are weak)', $filtered);
     
    return $filtered;
}
add_filter('the_content', 'skelepuns');