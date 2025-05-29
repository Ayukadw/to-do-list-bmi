<?php

namespace App\Helpers;

class BmiHelper
{
    public static function calculateBmi(float $weight, float $heightInCm): float
    {
        $heightInMeters = $heightInCm / 100;
        return $weight / ($heightInMeters * $heightInMeters);
    }

    public static function getCategory(float $bmi): string
    {
        if ($bmi < 18.5) return 'Kurus';
        if ($bmi < 24.9) return 'Normal';
        if ($bmi < 29.9) return 'Gemuk';
        return 'Obesitas';
    }
}
