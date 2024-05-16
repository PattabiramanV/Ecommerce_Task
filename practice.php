<?php

class demo{

    public $data;
    public function __construct()
    {
        $this->data='pattabi';
      echo $this->data;
    }
}

// $db=new demo();
// $db1=new demo();


findRelativeRanks([10,6,3,2,9]);

function findRelativeRanks($score) {
  $arrSort = $score;
  rsort($arrSort);
  $arrSort=array_flip($arrSort);
  print_r(array_flip($arrSort));
  // print_r(array_flip($score));
  print_r($score);
$ans=[];
foreach($score as $num){
 
  $getNum=$arrSort[$num]+1;
  switch($getNum){

    case 1;
    $ans[]= "Gold Medal";
    break;
    case 2;
    $ans[]= "Silver Medal";
    break;

    case 3;
    $ans[]= "Bronze Medal";
    break;

    default;
    $ans[]=(string )$getNum;
    break;
  }

}

print_r($ans);
  // $score_count = count($arrSort);

  // // Handle cases when there's only one or two scores
  // if ($score_count == 1) {
  //     $score[array_search($arrSort[0], $score)] = "Gold Medal";
  // } elseif ($score_count == 2) {
  //     $score[array_search($arrSort[0], $score)] = "Gold Medal";
  //     $score[array_search($arrSort[1], $score)] = "Silver Medal";
  // } else {
  //     $score[array_search($arrSort[0], $score)] = "Gold Medal";
  //     $score[array_search($arrSort[1], $score)] = "Silver Medal";
  //     $score[array_search($arrSort[2], $score)] = "Bronze Medal";
  
  //     for ($i = 3; $i < $score_count; $i++) {
  //         $score[array_search($arrSort[$i], $score)] = (string)($i + 1);
  //     }
  // }

  // return $score;


//..........................aother method...........................//




}