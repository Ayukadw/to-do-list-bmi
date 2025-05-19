<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function index()
    {
        return view('bmi.index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric|min:10|max:300',
            'height' => 'required|numeric|min:100|max:250',
        ]);

        $weight = $request->weight;
        $height = $request->height / 100; //konversi cm ke m

        $bmi = $weight / ($height * $height);
        $category = $this->getBmiCategory($bmi);

        return view('bmi.result', compact('bmi', 'category'));
    }

    private function getBmiCategory($bmi)
    {
        if ($bmi < 18.5) return 'Kurus';
        if ($bmi < 24.9) return 'Normal';
        if ($bmi < 29.9) return 'Gemuk';
        return 'Obesitas';
    }
}
