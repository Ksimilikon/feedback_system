<?php
//проверяет существование ключа в массиве и выводит ошибку
//на 0 тоже выдаёт ошибку
//1-успешное выполнение функции
//-1 - ключа не существует
//-2 - пустое значение
function checkArrKey(array $array, string | int $key) : int{
    if(key_exists($key, $array)){
        if(empty($array[$key])){
            return -2;
        }
        else{
            return 1;
        }
    }
    else{
        return -1;
    }
}