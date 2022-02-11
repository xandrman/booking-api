<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Interfaces\ApiResultInterface;
use App\Models\Customer;

class CustomerController extends Controller
{

    private $apiResultService;

    public function __construct(ApiResultInterface $apiResultService)
    {
        $this->apiResultService = $apiResultService;
    }

    /**
     * Display a listing of Customers.
     *
     * @return array
     */
    public function index(): array
    {
        $customers = Customer::all();
        return $this->apiResultService->makeResult(compact('customers'));
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param CustomerRequest $request
     * @return array
     */
    public function store(CustomerRequest $request): array
    {
        $customer = Customer::query()->create($request->validated());
        return $this->apiResultService->makeResult(compact('customer'));
    }

    /**
     * Display Customer.
     *
     * @param Customer $customer
     * @return array
     */
    public function show(Customer $customer): array
    {
        return $this->apiResultService->makeResult(compact('customer'));
    }

    /**
     * Update Customer in storage.
     *
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return array
     */
    public function update(CustomerRequest $request, Customer $customer): array
    {
        $customer->update($request->validated());
        return $this->apiResultService->makeResult(compact('customer'));
    }

    /**
     * Remove Customer from storage.
     *
     * @param Customer $customer
     * @return array
     */
    public function destroy(Customer $customer): array
    {
        $success = $customer->delete();
        return $this->apiResultService->makeResult(compact('success'));
    }
}
