<?php
//
//$array = [2, 47, 23, 34, 4, 46, 95, 71, 78, 49, 17, 19, 28, 35, 31, 80, 21, 98, 73, 6, 87, 65, 26, 75, 81, 13, 70, 29, 43, 36];
//
//interface Counts{
//    public function count($array) : array;
//}
//
//interface NewCount{
//    public function newCount($array) : array;
//}
//class CountArray implements Counts
//{
//    private varCount $array;
//
//    public function count($array): array
//    {
//       $this->varCount[] = $array;
//       $newCounts = [''];
//       foreach ($array as  $a){
//           if($a > 30){
//               array_push($array);
//           }
//       }
//       return $newCounts;
//    }
//}
//
//class SortArray implements NewCount
//{
//    private
//}
//$newCount = new CountArray[];


interface ArrayValidators{
    public function getsortLessThenthirty() : array;
}

interface ArrayValiadatorTwo{
    public function sortNewArr() : array;
}




class lessThenThirty implements ArrayValidators{

    private $firstArray;

    public function __construct($firstArray){
        $this->firstArray=$firstArray;
    }
    public function getsortLessThenthirty() : array
    {
        $newArray = [''];

        foreach($this->firstArray as $a){
            if($a > 30){
                array_push( $newArray, $a );

            }
        }
        return $newArray;
    }
}


class sortArray implements ArrayValiadatorTwo{
    /**
     * @var ArrayValidators
     */

    private ArrayValidators $newArray;

    public function __construct(ArrayValidators $newArray){
        $this->newArray=$newArray;
    }


    public function sortNewArr(): array
    {
//        $sort = sort($this->newArray->getsortLessThirty());
        $sort = $this->newArray->getsortLessThenthirty();
        sort($sort);
        return $sort;

    }
}
$firstArray = [2, 47, 23, 34, 4, 46, 95, 71, 78, 49, 17, 19, 28, 35, 31, 80, 21, 98, 73, 6, 87, 65, 26, 75, 81, 13, 70, 29, 43, 36];
$objOne = new lessThenThirty($firstArray);
$objTwo = new sortArray($objOne);

$objTwo->sortNewArr();