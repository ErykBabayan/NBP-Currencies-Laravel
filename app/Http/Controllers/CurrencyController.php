<?php

namespace App\Http\Controllers;

use App\DTO\Currency\CreateCurrencyRequestData;
use App\DTO\Currency\UpdateCurrencyRequestData;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\CurrencyCollection;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use App\Service\CurrencyService;
use Illuminate\Http\JsonResponse;

class CurrencyController extends ApiController
{
    public function __construct(
        public CurrencyService $service,
    ) {
    }

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
        $dto = CreateCurrencyRequestData::fromArray($request->validated());
        $currency = $this->service->store($dto);

        return new CurrencyResource($currency);
    }

    public function update(
        UpdateCurrencyRequest $request,
        Currency $currency
    ): CurrencyResource {
        $dto = UpdateCurrencyRequestData::fromArray($request->validated());
        $currency = $this->service->patch($dto, $currency);

        return new CurrencyResource($currency);
    }

    public function destroy(Currency $currency): JsonResponse
    {
        $currency->delete();
        return new JsonResponse();
    }
}
