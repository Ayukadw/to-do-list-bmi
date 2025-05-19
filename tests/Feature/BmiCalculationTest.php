<?php

namespace Tests\Feature;

use Tests\TestCase;

class BmiCalculationTest extends TestCase
{
    /**
    * @dataProvider bmiInputProvider
    */ 
    public function test_bmi_category_with_various_inputs($weight, $height, $expectedCategory)
    {
        $response = $this->post('/bmi/calculate', [
            'weight' => $weight,
            'height' => $height,
        ]);

        $response->assertStatus(200);
        $response->assertSee($expectedCategory);
    }

    public static function bmiInputProvider(): array
    {
        return [
            'Kurus case'    => [45, 160, 'Kurus'],
            'Normal case'   => [60, 165, 'Normal'],
            'Gemuk case'    => [75, 165, 'Gemuk'],
            'Obesitas case' => [95, 165, 'Obesitas'],
            'Boundary min'  => [10, 100, 'Kurus'],
        ];
    }

    public function test_bmi_calculation_with_missing_input()
    {
        $response = $this->post('/bmi/calculate', [
            'weight' => '',
            'height' => '',
        ]);

        $response->assertSessionHasErrors(['weight', 'height']);
    }

    public function test_bmi_calculation_with_non_numeric_input()
    {
        $response = $this->post('/bmi/calculate', [
            'weight' => 'abc',
            'height' => 'xyz',
        ]);

        $response->assertSessionHasErrors(['weight', 'height']);
    }

    public function test_bmi_with_zero_or_negative_values_should_fail()
    {
        $response = $this->post('/bmi/calculate', [
            'weight' => 0,
            'height' => -160,
        ]);

        $response->assertSessionHasErrors(['weight', 'height']);
    }

}
