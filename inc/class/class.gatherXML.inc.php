<?php
/**
 * Filename: class.gatherXML.inc.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 16:55
 */

namespace eCMS\EveAPI;


class gatherXML {

    static function getXML($url, $data = NULL) {
        /** Using cURL to ensure openssl doesn't need to be activated on the server,
         * in case the user has no permission/possibility to activate it */
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if($data != NULL) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

}
