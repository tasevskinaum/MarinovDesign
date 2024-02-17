<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFaqRequest;
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
        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Faq $faq)
    {
        $faq = new Faq();
        return view('faqs.create', compact('faq'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFaqRequest $request)
    {
        Faq::create($request->all());

        return redirect()->route('faqs.index')->with('success', 'Faq created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->all());

        return redirect()->route('faqs.index')->with('success', 'Faq updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('success', 'Faq deleted successfully.');
    }
}
