<?php
/**
 * Created by PhpStorm.
 * User: Dominic
 * Date: 07.01.14
 * Time: 09:17
 *
 * This class contains different functions that're used by more than one class.
 * To prevent multiple declarations of a function it's stored in this miscellaneous
 * class as static function and can be called in any other class if necessary.
 */

namespace eCMS\Misc;


class miscellaneous {

    /**
     * This wrapper function for crypt() uses two input methods: If called with one
     * parameter it will create a crypt hash with a random salt encrypted with. This
     * salt will also be added to the end of the hash, so it's possible to use the
     * wrapper function to verify a password entered by the user. If the function is
     * called with two parameters the second parameter will be used as salt to check
     * whether the user input is correct or not.
     *
     * Original post (http://de2.php.net/manual/de/function.crypt.php#105949)
     * by <harry@simans.net> from 27th Sep 2011, who wrote this wrapper function.
     */
    static function hasher($input, $encdata = false) {
        $strength = "08";
        /**
         * If encrypted data is passed, check it against input ($input)
         */
        if ($encdata) {
            if (substr($encdata, 0, 60) == crypt($input, "$2a$" . $strength . "$" . substr($encdata, 60))) {
                return true;
            } else
                return false;
        }
        else {
            /**
             * Make a salt and hash it with the input, and add salt to end
             */
            $salt = "";
            for ($i = 0; $i < 22; $i++) {
                $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
            }
            /**
             * Return 82 char string (60 char hash & 22 char salt)
             */
            return crypt($input, "$2a$" . $strength . "$" . $salt) . $salt;
        }
    }
} 