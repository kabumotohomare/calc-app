<?php

use function Livewire\Volt\{state, mount};

state(['value1', 'operator', 'value2']);

mount(function($value1, $operator, $value2){
    $this->value1 = $value1;
    $this->value2 = $value2;
    $this->operator = $this->mathematicate($operator);
});

$mathematicate = function($symbol){
    return match($symbol){
        "addition" => "+",
        "subtraction" => "-",
        "multiplication" => "×",
        "division" => "÷",
        default => "?",
    };
};

$calculate = function($value1, $operator, $value2) {
    if ($operator === 'addition') {
        return $value1 + $value2;
    } elseif ($operator === 'subtraction') {
        return $value1 - $value2;
    } elseif ($operator === 'multiplication') {
        return $value1 * $value2;
    } elseif ($operator === 'division') {
        if ($value2 != 0) {
            return $value1 / $value2;
        } else {
            return "解なし";
        }
    } else {
        return "無効な演算子です";
    }
};

?>

<div>
    <h1>計算結果</h1>
    <h2>{{$value1}}{{$operator}}{{$value2}}={{$result}}</h2>
</div>
