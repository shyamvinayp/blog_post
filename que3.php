<?php

function solutionNew($N){

    echo 'Input number: '.$N;

    $strN= (string)$N;
    $length = strlen($strN);
    $oneFives = [];
    $restNumber = [];
    $k = 0;
    $sign = '';
    if($N < 0){
        $sign = '-';
        for($i = $length-1; $i>0; $i--){

            if($strN[$i] === '5' && $k === 0){
                $oneFives[] = $strN[$i];

                $k++;
            } else {
                $restNumber[$i] =  $strN[$i];
            }
        }

    } else {
        for($i =0; $i < $length; $i++) {
            if ($strN[$i] === '5' && $k === 0) {
                $oneFives[] = $strN[$i];

                $k++;
            } else {
                $restNumber[$i] = $strN[$i];
            }
        }
    }

    if(empty($oneFives)){
        return 'There must be atleast one 5';
    }

    ksort($restNumber);
    $output = implode('', $restNumber);
    if($output > 0 || $output < 0){

        return $sign.$output;
    }

    return 0;

}

$A = 15958;
//$A = -5859;
//$A = -5000;

$output = solutionNew($A);
echo '<br />Output Result: '.$output;

?>