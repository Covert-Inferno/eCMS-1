<?php
/*
 *
 * Smarty plugin
 * --------------------------------------------------------------
 * File:    function.multi_in_array.php
 * Type:    function
 * Name:    multi_in_array
 * Purpose: Search for $needle in a multidimensional array
 * --------------------------------------------------------------
 */

function smarty_function_multi_in_array($params, &$smarty)
{
    foreach ($params['array'] AS $item)
    {
        if (!is_array($item))
        {
            if ($item == $params['value'])
            {
                return true;
            }
            continue;
        }

        if (in_array($params['value'], $item))
        {
            return true;
        }
        else if (smarty_function_multi_in_array($params['value'], $item))
        {
            return true;
        }
    }
    return false;
}