<?php

    /***
     * This funtion verify if the given character is a number
     * param char $value
     */
    function isNumber($value) {
        return ord($value) >= 48 && ord($value) <= 57;
    }

    /***
     * This funtion verify if the given character is an open parenthesis
     * param char $value
     */
    function isOpenParenthesis($value) {
        return ord($value) == 40;
    }

    /***
     * This funtion verify if the given character is a closed parenthesis
     * param char $value
     */
    function isClosedParenthesis($value) {
        return ord($value) == 41;
    }

    /***
     * This funtion verify if the given character is a comma
     * param char $value
     */
    function isComma($value) {
        return ord($value) == 44;
    }

    /***
     * This funtion verify if the given string ia a valid coordinate
     * param string $value
     */
    function isCoordinate($value) {
        $value = str_split($value);
        $isCoordinate = true;
        $firstNumber = '';
        $secondNumber = '';
        $isFirstNumber = true;
        foreach ($value as $index => $item) {
            if(!isOpenParenthesis($item) && !isClosedParenthesis($item) && $isCoordinate) {
                if(isNumber($item)) {
                    if($isFirstNumber) {
                        $firstNumber .= $item;
                    } else {
                        $secondNumber .= $item;
                    }
                } else {
                    if(isComma($item))
                        if($isFirstNumber)
                            $isFirstNumber = false;
                        else
                            $isCoordinate = false;
                    else
                        $isCoordinate = false;
                }
            }
        }
        return $isCoordinate;
    }

    /***
     * This funtion finds the posible coordinates
     * param string $string
     */
    function findCoordinates($string) {

        $value = str_split($string);

        $coordinates = [];
        $recording = false;
        $record = '';
        $recordStart = -1;
        $recordEnd = -1;

        foreach ($value as $index =>$character) {
            if(isOpenParenthesis($character)) {
                $recording = true;
                $recordStart = $index;
            }

            if(isClosedParenthesis($character)) {

                $record .= $character;
                $recording = false;
                $recordEnd = $index;
                if(isCoordinate($record)) {

                    $coordinateItem = [
                        'coordinate' => $record,
                        'description' => null,
                        'start' => $recordStart,
                        'end' => $recordEnd
                    ];

                    array_push($coordinates, $coordinateItem);

                    $recordStart = -1;
                    $recordEnd = -1;
                    $recording = false;
                    $record = '';


                }
                else {
                    $recordStart = -1;
                    $recordEnd = -1;
                    $recording = false;
                    $record = '';
                }

            }
            if ($recording) {
                $record .= $character;
            }
        }
        return $coordinates;

    }

    /***
     * This funtion returns the description (the text on the rigth) of a valid coordinate
     * param int $start (first index of the description)
     * param int $end (last index of the description)
     * param string $value (the full string given from the form)
     */
    function getDescription($start,$end, $value) {
        $description = '';
        for($i=$start;$i<=$end;$i++) {
            $description .= $value[$i];
        }

        return $description;
    }

    /***
     * This funtion returns the description (the text on the rigth) of a valid coordinate
     * param int $start (first index of the description)
     * param int $end (last index of the description)
     * param string $value (the full string given from the form)
     */
    function getDescriptions($value, $coordinates) {
        $value = str_split($value);
        $length = count($coordinates);
        
        foreach ($coordinates as $key => $coordinate) {
            $descriptionStart = $coordinate['end'] +1;
            if ($key+1 <= $length -1) {
                $descriptionEnd = $coordinates[$key + 1]['start'] - 1;
            } else {
                $descriptionEnd = count($value) - 1; 
            }
            $coordinates[$key]['description'] = getDescription($descriptionStart, $descriptionEnd, $value);
        }

        return $coordinates;

    }

    /***
     * This function gets the String, process it and returns a string in html to show the coordinates and the descriptions in the format required
     * param string $value (the full string given from the form)
     */
    function getAnalyzerResult($value='') {

        $responseData= '';
        
        $coordinatesArray = findCoordinates($value);
        $coordinatesArray = getDescriptions($value,$coordinatesArray);
        if ( count($coordinatesArray) != 3) {
            $responseData = '<h2 class="text-center text-warning">No son exactamente 3 coordenadas en la cadena</h2>';
        }
        else { //*/

            foreach ($coordinatesArray as $key => $coordinate) {
                $responseData .= $coordinate['coordinate'] . ' ' . $coordinate['description'] . '<br>';
            }
        }
        


        return $responseData;
    }


?>