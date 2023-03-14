<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\CurrencyCollection;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends ApiController
{
    public function index(): CurrencyCollection
    {
        return new CurrencyCollection(
            Currency::query()->paginate(10)
        );
    }

    public function show(Currency $currency): CurrencyResource
    {
        return new CurrencyResource($currency);
    }

    public function create(StoreCurrencyRequest $request): CurrencyResource
    {
        return new CurrencyResource(Currency::query()->create([$request->validated()]));
    }

    public function update(
        UpdateCurrencyRequest $request,
        Currency $currency
    ): CurrencyResource {
        $currency->update($request->validated());

        return new CurrencyResource(
            $currency->fresh()
        );
    }

    public function destroy(Currency $currency): JsonResponse
    {
        $currency->delete();
        return new JsonResponse();
    }
}
