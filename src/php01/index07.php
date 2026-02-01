<?php

function judge($score1, $score2, $score3)
{
  $total = $score1 + $score2 + $score3;
  if ( $total > 210){
    echo "合計点は" . $total . "なので合格です";
  } else {
    echo "合計点は" . $total . "なので不合格です";
  }

}

judge (200, 20, 50);

function getTriangleArea ($side, $height)
{
  $TriangleArea = ($side * $height) / 2;
  echo $TriangleArea;
}

function getSquareArea ($side, $height)
{
  $SquareArea = ($side * $height);
  echo $SquareArea;
}

function getTrapezoidArea ($headside, $bottomside, $height)
{
  $TrapezoidArea = ($headside + $bottomside) * $height / 2;
  echo $TrapezoidArea;
}

getTriangleArea (20,20);
getSquareArea (20,20);
getTrapezoidArea (20,30,20);