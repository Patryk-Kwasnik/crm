<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferRequest;
use App\Repositories\OfferRepositoryInterface;
use App\Services\CustomerServiceInterface;
use App\Services\OfferServiceInterface;

class OfferController extends Controller
{
    public function __construct(
        protected OfferServiceInterface $offerService,
        protected CustomerServiceInterface $customerService,
        protected OfferRepositoryInterface $offerRepository,
    ) {}

    public function index()
    {
        $data = $this->offerService->all();
        return view('admin.offers.index', compact('data'));
    }

    public function create()
    {
        $customers = $this->customerService->getSelectList();
        return view('admin.offers.create', compact('customers'));
    }

    public function store(OfferRequest $request)
    {
        $this->offerRepository->create($request->validated());
        return redirect()->route('admin.offers.index')->with('success', __('system.created_success'));
    }

    public function edit(int $id)
    {
        $customers = $this->customerService->getSelectList();
        $offer = $this->offerService->find($id);
        return view('admin.offers.edit', compact('offer', 'customers'));
    }

    public function update(OfferRequest $request, int $id)
    {
        $this->offerRepository->update($id, $request->validated());
        return redirect()->route('admin.offers.index')->with('success', __('system.updated_success'));
    }

    public function destroy(int $id)
    {
        $this->offerRepository->delete($id);
        return redirect()->route('admin.offers.index')->with('success', __('system.deleted_success'));
    }
}

