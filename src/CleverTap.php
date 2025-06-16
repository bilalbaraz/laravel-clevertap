<?php

namespace BilalBaraz\LaravelCleverTap;

use BilalBaraz\LaravelCleverTap\Http\ApiClient;
use BilalBaraz\LaravelCleverTap\Services\CampaignService;

class CleverTap
{
    /**
     * API Client
     *
     * @var \BilalBaraz\LaravelCleverTap\Http\ApiClient
     */
    protected $apiClient;

    /**
     * Service instances
     *
     * @var array
     */
    protected $services = [];

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->apiClient = new ApiClient($config);
    }

    /**
     * Get the campaign service
     *
     * @return \BilalBaraz\LaravelCleverTap\Services\CampaignService
     */
    public function campaigns()
    {
        return $this->getService(CampaignService::class);
    }

    /**
     * Get a service instance
     *
     * @param string $serviceClass
     * @return mixed
     */
    protected function getService($serviceClass)
    {
        if (!isset($this->services[$serviceClass])) {
            $this->services[$serviceClass] = new $serviceClass($this->apiClient);
        }

        return $this->services[$serviceClass];
    }
}