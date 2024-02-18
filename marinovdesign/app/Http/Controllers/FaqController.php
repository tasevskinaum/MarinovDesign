<?php

namespace App\Http\Controllers;

use App\Http\Requests\Faq\FaqStoreRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();

        return view('dashboard.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqStoreRequest $request)
    {
        try {
            Faq::create([
                'question' => $request->question,
                'answer' => $request->answer
            ]);

            return redirect()
                ->route('faqs.index')
                ->with(['success' => "Faq added."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('faqs.index')
                ->with(['danger' => "An unexpected error occurred while adding faq. Please try again!"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('dashboard.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqStoreRequest $request, Faq $faq)
    {
        try {
            $faq->question = $request->question;
            $faq->answer = $request->answer;

            $faq->update();

            return redirect()
                ->route('faqs.index')
                ->with(['success' => "Faq updated successfully."]);
        } catch (\Exception $e) {
            return redirect()
                ->route('faqs.index')
                ->with(['danger' => "An unexpected error occurred while edit FAq. Please try again!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();

            return redirect()
                ->route('faqs.index')
                ->with(['success' => "Faq deleted"]);
        } catch (\Exception $e) {
            return redirect()
                ->route('faqs.index')
                ->with(['danger' => "An unexpected error occurred while deleteing the FAq. Please try again!"]);
        }
    }
}
