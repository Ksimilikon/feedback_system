<?php
if(!class_exists('MyError')){
class MyError{
    private $numError;
    private $text;
    const PART_PATH = '../Errors/';
    function __construct($numError){
        $this->getError($numError);
    }
    public function getError($numError){
        $file = self::PART_PATH . $numError . '.txt';
        if(file_exists($file)){
            $this->numError=$numError;
            $this->text = file_get_contents($file);
            
            return 1;
        }
        else{
            return -1;
        }
    }
    public static function  newError($numError, $text) {
        $file = self::PART_PATH.$numError.'.txt';
        if(!file_exists($file)){
            file_put_contents($file, $text);
            return 1;
        }
        else{
            return -1;
        }
    }
    public function getNum(){
        return $this->numError;
    }
    public function getText(){
        return $this->text;
    }
    public function getInsertText(){
        return '<p class="error">'.$this->getText().'</p>';
    }
    public static function getTextError($codeError){
        $error = new MyError($codeError);
        return $error->getText();
    }
    public static function getListErrors(string $nameKeySession){
        foreach($_SESSION[$nameKeySession] as $error){
            echo "<p>".$error."</p>";
        }
    }
}
}