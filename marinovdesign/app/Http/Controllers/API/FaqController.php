<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $faqs = Faq::all();

            return response()
                ->json(
                    ['data' => FaqResource::collection($faqs), 'status' => 'true'],
                    200
                );
        } catch (\Exception $e) {
            return response()
                ->json(
                    ['error' => 'An error occurred while fetching FAQs', 'status' => 'false'],
                    500
                );
        }
    }
}
