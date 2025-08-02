<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OfferTemplateRequest;
use App\Models\OfferTemplate;
use App\Services\OfferTemplateServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OfferTemplateController extends Controller
{
    public function __construct(
        protected OfferTemplateServiceInterface $service
    ) {}

    public function index(): View
    {
        $data = $this->service->all();
        return view('admin.offer_templates.index', compact('data'));
    }

    public function create(): View
    {
        return view('admin.offer_templates.create');
    }

    public function store(OfferTemplateRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());
        return redirect()->route('admin.offers_templates.index')->with('success', __('system.created_success'));
    }

    public function edit(int $id): View
    {
        $offerTemplate = $this->service->find($id);
        return view('admin.offer_templates.edit', compact('offerTemplate'));
    }

    public function update(OfferTemplateRequest $request, OfferTemplate $offers_template): RedirectResponse
    {
        $this->service->update($offers_template->id, $request->validated());
        return redirect()->route('admin.offers_templates.index')->with('success', __('system.updated_success'));
    }

    public function destroy(int $offerTemplate): RedirectResponse
    {
        $this->service->delete($offerTemplate);
        return redirect()->route('admin.offers_templates.index')->with('success', __('system.deleted_success'));
    }
}
