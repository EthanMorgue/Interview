<?php

    /***
     * This function takes the number given and returns the reverse of it
     * param int value
     */
    function getReverse($value) {
        $number = $value;
	    $number = implode(array_reverse(str_split(strval($number))));
        $number = intval($number);

        return $number;
    }
    
    function isCapicua($value) {
        return $value == getReverse($value);
    }

    function getCapicuaResult($value) {
        $responseData= 'hola Capicúa';
        if($value > 9 && $value < 10000) {
            $iterations = 0;
            $result = $value;
            do {

                $iterations ++;
                $result += getReverse($result);

            }
            while(!isCapicua($result));
            $responseData = '<p class="text-white"> ' . $result . ' ' . $iterations . '</p>';
        } else {
            $responseData = '<h2 class="text-warning">El numero debe ser un numero entero entre 10 y 9999</h2>';
        }
        


        return $responseData;
    }


?>