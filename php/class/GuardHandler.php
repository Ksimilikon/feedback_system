<?php
class GuardHandler{
    public static function checkRef($targetRef){
        if($_SERVER['HTTP_REFERER'] == 'http://'.$_SERVER['HTTP_HOST'].$targetRef){
            //echo ' yes';
        }
        else{
            //echo ' no';
            header('Location: '. $targetRef);
        }
    }
    
}
?>