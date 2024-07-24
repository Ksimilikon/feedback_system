<?php
class Debug 
{
    public const LINE_BREAK = '<br>';
    public static function log($var, $numLine) : void {
        echo self::LINE_BREAK . $var . ' Line: ' . $numLine . self::LINE_BREAK;
    }
}
