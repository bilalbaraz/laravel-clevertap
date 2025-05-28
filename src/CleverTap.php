<?php

namespace BilalBaraz\LaravelCleverTap;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CleverTap
{
    /**
     * CleverTap API endpoint
     *
     * @var string
     */
    protected $apiEndpoint = 'https://api.clevertap.com';

    /**
     * CleverTap account ID
     *
     * @var string
     */
    protected $accountId;

    /**
     * CleverTap passcode
     *
     * @var string
     */
    protected $passcode;

    /**
     * HTTP client
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->accountId = $config['account_id'] ?? '';
        $this->passcode = $config['passcode'] ?? '';

        if (empty($this->accountId) || empty($this->passcode)) {
            throw new \InvalidArgumentException('CleverTap account ID and passcode are required.');
        }

        $this->client = new Client([
            'base_uri' => $this->apiEndpoint,
            'headers' => [
                'X-CleverTap-Account-Id' => $this->accountId,
                'X-CleverTap-Passcode' => $this->passcode,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Create campaign
     *
     * @param array $campaignData Campaign data
     * @return array
     */
    public function createCampaign(array $campaignData)
    {
        return $this->sendRequest('/1/targets/create.json', $campaignData, 'POST');
    }

    /**
     * Get message reports
     *
     * @param array $params Query parameters
     * @return array
     */
    public function getMessageReports(array $params = [])
    {
        if (empty($params['from']) || empty($params['to'])) {
            throw new \InvalidArgumentException('From and to dates are required for message reports.');
        }

        $queryParams = [
            'from' => $params['from'],
            'to' => $params['to'],
        ];

        if (!empty($params['channel'])) {
            $channels = is_array($params['channel']) ? $params['channel'] : [$params['channel']];

            $validChannels = array_intersect($channels, [
                'push',
                'email',
                'sms',
                'browser',
                'audiences',
                'inapp',
                'webhooks',
                'web_pop_up',
                'web_exit_intent',
                'web_native_display',
                'web_inbox',
            ]);

            $queryParams['channel'] = $validChannels;
        }

        return $this->sendRequest('/1/message/report.json', $queryParams, 'POST');
    }

    /**
     * Send API request
     *
     * @param string $endpoint API endpoint
     * @param array $data Request data
     * @param string $method HTTP method
     * @return array
     */
    protected function sendRequest($endpoint, array $data, $method = 'POST')
    {
        try {
            $options = [];

            if ($method === 'GET') {
                $options['query'] = $data;
            } else {
                $options['json'] = $data;
            }

            $response = $this->client->request($method, $endpoint, $options);

            $body = $response->getBody()->getContents();
            return json_decode($body, true) ?? [];
        } catch (GuzzleException $e) {
            Log::error('CleverTap API Error: ' . $e->getMessage(), [
                'endpoint' => $endpoint,
                'data' => $data,
                'method' => $method
            ]);

            return [
                'status' => 'error',
                'error' => $e->getMessage()
            ];
        }
    }
}