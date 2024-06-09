<?php

namespace App\Http\Controllers;

use App\Services\Skinrec;
use Illuminate\Http\Request;

class SkincareRecomendationController extends Controller
{
    protected $skinrec;

    public function __construct(Skinrec $skinrec) {
        $this->skinrec = $skinrec;
    }

    public function recommend(Request $request) {
        $productType = $request->input('product');
        $skinTypes = $request->input('skinType', []);
        $skinProblems = $request->input('skinProblem', []);
        $notableEffects = []; // Tambahkan ini sesuai dengan kebutuhan Anda jika ada input dari user

        $recommendedProducts = $this->skinrec->recommendSkincare($productType, $skinTypes, $skinProblems, $notableEffects);

        return view('recommended_products', compact('recommendedProducts'));
    }
}
