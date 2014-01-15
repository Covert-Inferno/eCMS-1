<?php
/**
 * Filename: class.news.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 12:31
 */

namespace eCMS\Administration\News;


class news {

    static function saveNews() {

    }

    static function editNews($newsID) {

    }

    static function deleteNews($newsID) {

    }

    static function previewNews() {

    }

    static function fetchNews() {
        #return array('Test1' => 'Hallo 1', 'Test2' => 'Hallo 2', 'Test3' => 'Hallo 3');
        return array(0 => array('title' => 'German Kings Reloaded - Neue Internetpr&auml;senz', 'from' => 'Hawk Misado', 'time' => '15.01.2014 um 15:11 Uhr', 'news' => 'German Kings haben eine neue Webseite. Sieht cool aus, oder?'), 1 => array('title' => 'German Kings Reloaded - Neue Internetpr&auml;senz, die 2.', 'from' => 'Hawk Misado', 'time' => '15.01.2014 um 15:11 Uhr', 'news' => 'German Kings haben eine neue Webseite. Sieht cool aus, oder?'));
    }
} 