<?php

namespace BilalBaraz\LaravelCleverTap\Services;

class CampaignService extends BaseService
{
    /**
     * Create a new campaign
     *
     * @param array $campaignData Campaign data
     * @return array
     */
    public function create(array $campaignData)
    {
        return $this->sendRequest('/1/targets/create.json', $campaignData);
    }

    public function list(array $parameters)
    {
        return $this->sendRequest('/1/targets/list.json', $parameters);
    }
}