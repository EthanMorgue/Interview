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

    /***
     * This function takes the given number and returns if it is equal to its inverse
     * param int value
     */
    function isCapicua($value) {
        return $value == getReverse($value);
    }

    /***
     * This this is the main function, takes the given number process it (add its reverse) until obtains a capicua and returns a string in html with the resulting capicua and the number of iterations to obtain it
     * param int value
     */
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