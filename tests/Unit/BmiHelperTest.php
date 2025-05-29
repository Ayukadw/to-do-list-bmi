<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\BmiHelper;

class BmiHelperTest extends TestCase
{
    public function test_calculate_bmi_returns_expected_result()
    {
        $bmi = BmiHelper::calculateBmi(60, 165); // 60 kg, 165 cm
        $this->assertEqualsWithDelta(22.03, $bmi, 0.01);
    }

    public function test_get_category_kurus()
    {
        $this->assertEquals('Kurus', BmiHelper::getCategory(17.5));
    }

    public function test_get_category_normal()
    {
        $this->assertEquals('Normal', BmiHelper::getCategory(22.0));
    }

    public function test_get_category_gemuk()
    {
        $this->assertEquals('Gemuk', BmiHelper::getCategory(27.0));
    }

    public function test_get_category_obesitas()
    {
        $this->assertEquals('Obesitas', BmiHelper::getCategory(32.0));
    }
}
