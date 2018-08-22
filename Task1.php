<?php
// Solution for the first problem.
function findMaxSliceSum ($arr)
{
    $max = 0;
    for ($i = 0; $i < count($arr); $i++) {
        for ($z = count($arr); $z > 0; $z--) {
            $sum = 0;
            for ($y = $i; $y < $z; $y++) {
                    $sum += $arr[$y];
                }
            if ($sum > $max) {
                $max = $sum;
            }
        }
    }
    return $max;
}
function output($array, $result)
{
    print '<pre>';
    print 'Input: <br>';
    print_r($array) ;
    $max = findMaxSliceSum($array);
    print 'Output: '.var_export($max, true).'<br>';
    print 'Should be: '.var_export($result, true);
    print '<br><hr><br>';
}

output([1, 2, 3, 4, 5],15);
output([-1, -2, -3, -4, -5],0);
output([1, -2, 3, -4 ],3);
output([2, -2, 4, -2, 6, -2 ],8);
output([5, -1, -2, 10, -8, 3, 4  ],12);

