<?php
/**
 * Filename: class.Character.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 09:15
 */

namespace eCMS\EveAPI;


class Character {
    static function getCharacterList($EveAPI) {
        if(!isset($EveAPI))
            return false;
        else {
            $charList = $EveAPI->fetchData('/account/Characters.xml.aspx');

            if(isset($charList->error))
                return $charList->error;
            else
                return $charList->result->rowset;
        }
    }

    static function getCharacterSheet($EveAPI, $charID) {
        if(!isset($EveAPI) || !isset($charID))
            return false;
        else
            return $EveAPI->fetchData('/char/CharacterSheet.xml.aspx', $data['characterId'] = $charID);
    }

    static function saveCharacter($EveAPI, $charID) {
        if(!isset($EveAPI) || !isset($charID))
            return false;
        else {
            $charInfo = self::getCharacterList($EveAPI, $charID);
            if(empty($charInfo))
                return false;
            else {
                /** Add database connection for saving character information */
            }
        }
    }
}
