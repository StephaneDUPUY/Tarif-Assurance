<?php
    // calculate level regarding age, year license, quantity accident and year of seniority in option
    function calculateLevel (int $age, int $license, int $accident = 0, int $seniority = 0):array {

        // default level
        $level = 1;

        // level decreased by accident
        $level -= $accident;

        // licence driver more than 2 year increase level
        if ($license > 2) {
            $level++;
        }

        // age more than 25 years old increase level
        if ($age > 25) {
            $level++;
        }

        // level positive and insured more than 5 years increase level
        if ($level > 0 && $seniority > 5) {
            $level++;
        }

        // first solution to manage negative level
        if ($level < 0) {
            $level = 0;
        }

        if ($level > 4) {
            $level = 4;
        }

        // second solution to manage negative level

        $level = max(0, $level);

        $level = min(4, $level);

        // names for level
        $colorLevel = [
            ["name" => "Refus d'assurer", "class" => "grey"],
            ["name" => "Rouge", "class" => "red"],
            ["name" => "Orange", "class" => "orange"],
            ["name" => "Vert", "class" => "green"],
            ["name" => "Bleu", "class" => "blue"]
        ];

        // return result
        return $colorLevel[$level];
    }
?>