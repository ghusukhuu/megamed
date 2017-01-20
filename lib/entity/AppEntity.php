<?php

/**
 * Description of AppEntity
 *
 * @author usukhuu
 */
class AppEntity
{

    public static function getConnection()
    {
        return Doctrine_Manager::connection()->getDbh();
    }

    public static function getOgnoo()
    {
        return date('Y-m-d H:i:s');
    }

    public static function utf8_substr($str, $from, $len)
    {
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' . '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str);
    }

    public static function removeLastChar($string)
    {
        return mb_substr($string, 0, -1);
    }

    public static function getRandomWord($len = 8)
    {
        $word = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    public static function validPassword($password)
    {
        $errors = array();

        if (strlen($password) < 6) {
            $errors[] = 'Багадаа 6 тэмдэгт оруулна уу!';
        }

        if (strlen($password) > 20) {
            $errors[] = 'Ихдээ 20 тэмдэгт оруулна уу!';
        }

        if (!preg_match("#[0-9]+#", $password)) {
            $errors[] = 'Ядаж нэг тоо оруулна уу!';
        }

        if (!preg_match("#[a-z]+#", $password)) {
            $errors[] = 'Ядаж нэг үсэг оруулна уу!';
        }

        if (!preg_match("#[A-Z]+#", $password)) {
            $errors[] = 'Ядаж нэг том үсэг оруулна уу!';
        }

        return $errors;
    }

    public static function yesOrNo($val)
    {
        return $val == 1 ? 'Тийм' : 'Үгүй';
    }

}

?>