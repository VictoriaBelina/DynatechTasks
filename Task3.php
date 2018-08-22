<?php
// Solution for the third problem.
function parse( $str) :? array
{
    $i = 0;
    $buff = '';
    $result = [];
    $len = strlen($str);
    $brackets = 0;
    for ($z = 0; $z < $len; $z++) {
        $cur = $str[$z];
        if($cur === '{' && $str[$z-1] !== '\\') {
            $brackets++;
            if(!empty($buff)) {
                if(!isset($result[$i])) {
                    $result[$i] = '';
                }
                $result[$i] .= $buff;
                $buff = '';
            }

            $i++;
            if(!empty($result[$i])) {
                $i++;
            }
        } else if($cur === '}' && $str[$z-1] !== '\\') {
            $brackets--;
            if(!empty($buff)) {
                if(!isset($result[$i])) {
                    $result[$i] = '';
                } else {
                    $result[$i] .= '|';
                }
                $result[$i] .= $buff;
                $buff = '';
            }

            if(isset($str[$z+1]) && $str[$z+1] !== '|') {
                $i++;
            } else {
                $i--;
            }

        } else {
            $buff .= $cur;
        }

        if($z == $len-1 && !empty($buff)) {
            $result[count($result)] = $buff;
        }
    }

    if($brackets !== 0) {
        return null;
    }

    foreach ($result as $item) {
        if (strpos($item, '|' === false)) {
            $res[] = $item;
        } else {
            $array = explode('|', $item);
            $res[] = $array;
        }

    }
    foreach ($res as $k => $v) {
        if (is_string($v)){
            if(preg_match("/[a-z]/i", $v)){
                continue;
            }
        }
        if (count($v) == 1){
            $string = $v[0];
        } else {
            foreach ($v as $value) {
                $final[] = $string . $value;
            }
        }
    }
    return $result;
}

function output($string, $result)
{
    print '<pre>';
    print 'Input: '.$string.'<br>';
    $res = parse($string);
    print 'Output: '.var_export($res, true).'<br>';
    print 'Should be: '.var_export($result, true);
    print '<br><hr><br>';
}

output('ab{c|d|e}', [
    'abc',
    'abd',
    'abe'
]);

output('a{b|c}}',null);

output('a{b{c|d}|e{f|g}}h', [
    'abch',
    'abdh',
    'aefh',
    'aegh'
]);

output('a{b|c}d{e|f}h', [
    'abdeh',
    'abdfh',
    'acdeh',
    'acdfh'
]);

output('{\\{|\\||\\}}', [
   '{',
   '|',
   '}'
]);