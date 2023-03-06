<?php

namespace OnlineIdentity\Channable\Api;

use OnlineIdentity\Channable\ChannableConfig;
use OnlineIdentity\Channable\Exceptions\ChannableException;
use GuzzleHttp\Client;

abstract class Base
{

    public function __construct(protected ChannableConfig $config, protected $client = new Client())
    {
    }

    protected function get(string $subject): array
    {
        try {
            return json_decode($this->client->request('GET', $this->config->generateProjectUrl($subject), $this->getHeaders())->getBody(), true);
        } catch (\Exception $e) {
            throw new ChannableException($e->getMessage());
        }
    }

    protected function getBase(string $subject): array
    {
        try {
            return json_decode($this->client->request('GET', $this->config->generateBaseUrl($subject), $this->getHeaders())->getBody(), true);
        } catch (\Exception $e) {
            throw new ChannableException($e->getMessage());
        }
    }

    protected function post(string $subject, array $parameters = [])
    {
        try {
            return json_decode($this->client->request(
                'POST',
                $this->config->generateProjectUrl($subject),
                array_merge($this->getHeaders(), ['json' => $parameters])
            )->getBody(), true);
        } catch (\Exception $e) {
            throw new ChannableException($e->getMessage());
        }
    }

    protected function convertQueryParameters($queryParameters = []): string
    {
        return sizeof($queryParameters) ? '?' . http_build_query($queryParameters) : '';
    }

    private function getHeaders(): array
    {
        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->config->getApiToken()
            ]
        ];
    }

}