<?php


function calcEuclid($arrayA, $arrayB){
  return sqrt(
    array_sum(
      array_map(function($x, $y){
            $result = pow(($x - $y), 2); 
            return $result;
        }, $arrayA, $arrayB)
    ));
}

function calcManhattan(){
    
}

function calcCosine($arrayA, $arrayB){
    $dot = array_sum(
        array_map( function($x, $y){
            $result = $x * $y;
            return $result;
        }, $arrayA, $arrayB)
    );

    $magA = sqrt(array_sum(
        array_map( function($x){
            $result = pow($x, 2);
            return $result;
        }, $arrayA)
    ));

    $magB = sqrt(array_sum(
        array_map( function($x){
            $result = pow($x, 2);
            return $result;
        }, $arrayB)
    ));

    $result = $dot / ($magA * $magB);

    return $result;
}

function calcJaccard($arrayA, $arrayB){
   $union = count($arrayA) + count($arrayB);
   $intersect = 0;
   for ($i=0; $i < count($arrayA); $i++) { 
       $tempA = $arrayA[$i];
        for ($j=0; $j < count($arrayB); $j++) { 
            $tempB = $arrayB[$j];
            if($tempA == $tempB){
                $intersect++;
            }
        }
   }

   $result = $intersect / $union;

   return  $result;
}