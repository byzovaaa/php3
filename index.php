<?php
//задание №1
$number = 1;
while ($number < 100) {
    if ($number % 3 == 0) {
        echo $number++ . ' ';
    }
    $number++;
}

echo '<hr>';

//задание 2
$number = 0;
do {
    if ($number == 0) {
        echo $number . ' – это ноль.' . '<br>';
        $number++;
    } elseif ($number % 2 != 0) {
        echo $number . ' – нечетное число.' . '<br>';
        $number++;
    } else {
        echo $number . ' – четное число.' . '<br>';
        $number++;
    }
} while ($number < 11);

echo '<hr>';

//Задание №3
$areaArr = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Волгоградская область:' => ['Волгоград', 'Волжский', 'Камышин', 'Урюпинск', 'Иловля']
];

function displayCity($arr)
{
    if (!is_array($arr)) {
        return print "incorrect argument '{$arr}'";
    }
    foreach ($arr as $key => $value) {
        echo $key . '<br>';
        for ($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
            if ($i == $arrLength - 1) {
                echo $arr[$key][$i] . '.' . '<br>';
            } else {
                echo $arr[$key][$i] . ', ';
            }
        }
    }
}

displayCity($areaArr);

echo '<hr>';

//задание №4
function translit($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’ 	Y	’ 	E	YU	YA';

    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    $requestedArr = [];


    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            
            if ($stringArr[$i] == $key) {
                array_push($requestedArr, $value);
                break;
               
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                array_push($requestedArr, $stringArr[$i]);
                break;
            }
        }
    }

  
    return implode($requestedArr);
}

echo translit('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');

echo '<hr>';

//задание №5
function replaceSpace($string)
{
    if (!is_string($string)) {
        return "incorrect argument {$string}";
    }

    return preg_replace('/\s/', '_', $string);
}

echo replaceSpace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');

echo '<hr>';

//задание №6
$menuArr = [
    'Item 1',
    'Item 2' => ['Subitem 1', 'Subitem 2', 'Subitem 3'],
    'Item 3' => ['Subitem 4' => ['One level deeper 1', 'One level deeper 2']]
];

function menuRender($arr)
{

    if (!is_array($arr)) {
        return 'incorrect argument';
    }

    $renderArr[] = '<ul>';
    foreach ($arr as $key => $value) {
      
        if (is_array($value)) {
            $renderArr[] = '<li>' . $key . menuRender($value) . '</li>';
        } else {
            $renderArr[] = '<li>' . $value . '</li>';
        }
    }
    $renderArr[] = '</ul>';

    return implode($renderArr);
}

echo menuRender($menuArr);

echo '<hr>';

//заднаие №7
for ($i = 0; $i < 10; print $i++ . ' ') {
};

echo '<hr>';