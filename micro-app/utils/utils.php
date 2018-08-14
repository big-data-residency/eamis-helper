<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 12:04
 */

/**
 * @param string $key
 * @param mixed $default
 *
 * @return mixed
 */
function env($key, $default = false)
{
    $value = getenv($key);

    if ($value === false) {
        return $default;
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;
        case 'false':
        case '(false)':
            return false;
    }

    return $value;
}

function setEnv($key, $value)
{
    $_SERVER[$key] = $value;
}