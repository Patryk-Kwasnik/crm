<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Repositories\CustomerRepositoryInterface;
use App\Http\Requests\Admin\CustomerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class CustomerController extends Controller
{
    public function __construct(private readonly CustomerRepositoryInterface $customerRepository, private readonly CustomerService $customerService)
    {
        $this->middleware('permission:customers-list|customers-create|customers-edit|customers-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:customers-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customers-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customers-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $data = $this->customerRepository->all();
        return view('admin.customers.index', compact('data'));
    }

    public function create(): View
    {
        return view('admin.customers.create');
    }

    public function store(CustomerRequest $request): RedirectResponse
    {
        $this->customerRepository->create($request->validated());
        return redirect()->route('admin.customers.index')->with('success', __('system.created_success'));
    }

    public function edit(int $id): View
    {
        $customer = $this->customerRepository->find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, int $id): RedirectResponse
    {
        $this->customerRepository->update($id, $request->validated());
        return redirect()->route('admin.customers.index')->with('success', __('system.updated_success'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->customerRepository->delete($id);
        return redirect()->route('admin.customers.index')->with('success', __('system.deleted_success'));
    }
}
