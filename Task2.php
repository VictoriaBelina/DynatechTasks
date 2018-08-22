<?php
// Solution for the second problem.
function prodExcept ($arr)
{
    $res = $arr;
    for ($i = 0; $i < count($arr); $i++) {
        $res[$i] = 1;
        for ($y = 0; $y < count($arr); $y++) {
            if ($i != $y) {
                $res[$i] = $res[$i] * $arr[$y];
            }
        }
    }
    return ($res);
}
function output($array, $result)
{
    print '<pre>';
    print 'Input: <br>';
    print_r($array) ;
    $res = prodExcept($array);
    print 'Output: '.var_export($res, true).'<br>';
    print 'Should be: '.var_export($result, true);
    print '<br><hr><br>';
}

output([1, 2, 3, 4], [24, 12, 8, 6 ]);
output([ ], [ ]);
output([-0.5, 100, 20],[2000, -10, -50] );


