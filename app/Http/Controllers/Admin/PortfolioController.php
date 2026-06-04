<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePortfolioRequest;
use App\Http\Requests\Admin\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Services\PortfolioService;

class PortfolioController extends Controller
{
    public function __construct(private PortfolioService $portfolioService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $this->portfolioService->createPortfolio($request->validated());

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return redirect()->route('admin.portfolios.edit', $portfolio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $this->portfolioService->updatePortfolio($portfolio, $request->validated());

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->portfolioService->deletePortfolio($portfolio);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }
}
