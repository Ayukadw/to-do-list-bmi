<?php

namespace App\Http\Controllers;

use App\Helpers\BmiHelper;
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
        $height = $request->height;

        // Gunakan helper untuk hitung BMI dan kategorinya
        $bmi = BmiHelper::calculateBmi($weight, $height);
        $category = BmiHelper::getCategory($bmi);

        return view('bmi.result', compact('bmi', 'category'));
    }
}
