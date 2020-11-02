<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    protected $url;
    protected $optionalParams;

    /**
     * Constructor
     *
     * @param string $url
     * @return void
     */
    public function __construct(string $url, array $optionalParams)
    {
        $this->url = $url;
        $this->optionalParams = $optionalParams;
    }

    public function getRates()
    {
        $data = $this->getData();

        return collect($data->rates)->take(6);
    }

    public function getData()
    {
        $response = Http::get($this->url, $this->optionalParams);

        return $response->object();
    }
}
