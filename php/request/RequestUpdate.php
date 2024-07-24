<?php
class RequestUpdate{
    private string $query;
    function __construct($table, $col, $colQuery, $id){
        require_once '../class/classList.php';
        require '../config.php';
        try{
            if($colQuery==null){
                $this->query = "UPDATE ".$table." SET ".$col." = NULL WHERE ".$table.".id = '".$id."'";
                echo $this->query;
                $mysqli->query($this->query);
            }
            else{
                $this->query = "UPDATE ".$table." SET ".$col." = '".$colQuery."' WHERE ".$table.".id = '".$id."'";
                echo $this->query;
                $mysqli->query($this->query);
            }
            
        }
        catch(Exception $e){
            LocationWhenError::error(8);
        }
        
    }
    
}