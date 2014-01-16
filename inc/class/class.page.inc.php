<?php
/**
 * Filename: class.page.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 17:21
 */

namespace eCMS\Page;


use eCMS\database\db;

class page {

    public static function getPage($name) {
        if(isset($name)) {
            /*$db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    tblPage_title,
                    tblPage_content
                FROM
                    tblPage
                WHERE
                    tblPage_name = lower(:pname)'
            );
            $stmt->bind_param('pname', $name);
            $stmt->execute();
            $page = $stmt->fetch_assoc();
            if ($page == false) {
                return false;
            } else {
                return $page;
            }*/

        } else {
            return false;
        }
    }

    public static function createPage($pageInformation) {
        if(isset($pageInformation) && !empty($pageInformation)) {
            $file = './www/templates/pages/' . $pageInformation['name'] . '.tpl';
            $title = $pageInformation['title'];
            $content = "<div id=\"contenttop\">
                            <div id=\"contenttopic\">
                                <img src=\"./media/img/content_point.png\" border=\"0\" width=\"15\" height=\"9\" alt=\"\" /> <b>German Kings " . $title . "</b>
                            </div>
                        </div>
                        <div id=\"contentmid\">
                            <div id=\"contentframe\">
                                <div class=\"text\">
                                    " . $pageInformation['content'];
            file_put_contents($file, $content);
        }
    }
} 