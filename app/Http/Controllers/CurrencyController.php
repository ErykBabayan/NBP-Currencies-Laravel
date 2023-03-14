<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends ApiController
{
    public function index(): JsonResponse
    {
        return new JsonResponse(
            data: Currency::query()->paginate(10)
        );
    }

    public function show(Currency $currency): JsonResponse
    {
        return new JsonResponse(
            data: $currency
        );
    }

    public function create(StoreCurrencyRequest $request): JsonResponse
    {
        return new JsonResponse(
            data: Currency::query()->create([$request->validated()]),
            status: Response::HTTP_CREATED
        );
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency): JsonResponse
    {
        $currency->update($request->validated());

        return new JsonResponse(
            data: $currency->fresh()
        );
    }

    public function destroy(Currency $currency): JsonResponse
    {
        $currency->delete();
        return new JsonResponse();
    }



}
