<?php

namespace BilalBaraz\LaravelCleverTap\Services;

use BilalBaraz\LaravelCleverTap\Http\ApiClient;

abstract class BaseService
{
    /**
     * API Client
     *
     * @var \BilalBaraz\LaravelCleverTap\Http\ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \BilalBaraz\LaravelCleverTap\Http\ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Send a request to the API
     *
     * @param string $endpoint
     * @param array $data
     * @param string $method
     * @return array
     */
    protected function sendRequest($endpoint, array $data = [], $method = 'POST')
    {
        return $this->apiClient->sendRequest($endpoint, $data, $method);
    }
}