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
            $db = db::getInstance();
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
            }
        } else {
            return false;
        }
    }
} 