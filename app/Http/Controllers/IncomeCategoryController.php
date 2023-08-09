<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch income categories for the authenticated user
        return $incomeCategories = auth()->user()->incomeCategories;

        // return view('income_categories.index', compact('incomeCategories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeCategoryRequest $request)
    {
        return auth()->user()->incomeCategories()->create($request->validated());

        //return redirect()->route('income_categories.index')->with('success', 'Income category created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeCategory $incomeCategory)
    {
        return view('income_categories.edit', compact('incomeCategory'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        $incomeCategory->update($request->validated());

        return redirect()->route('income_categories.index')->with('success', 'Income category updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeCategory $incomeCategory)
    {
        $incomeCategory->delete();

        return redirect()->route('income_categories.index')->with('success', 'Income category deleted.');
    }
}
