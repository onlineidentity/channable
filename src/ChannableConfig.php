<?php

namespace OnlineIdentity\Channable;

class ChannableConfig
{

    public function __construct(
        protected readonly string $api_token,
        protected readonly int    $company_id,
        protected int             $project_id,
        protected readonly string $base_url = 'https://api.channable.com',
        protected readonly string $version = 'v1'
    )
    {
    }

    /**
     * @param string $subject //url (orders / returns)
     * @return string
     */
    public function generateProjectUrl(string $subject): string
    {
        return $this->base_url . '/' . $this->version . '/companies/' . $this->company_id . '/projects/' . $this->project_id . '/' . $subject;
    }

    public function generateBaseUrl(string $subject): string
    {
        return $this->base_url . '/' . $this->version . '/' . $subject;
    }

    public function getApiToken(): string
    {
        return $this->api_token;
    }

    public function setProjectId(int $project_id)
    {
        $this->project_id = $project_id;
    }

    public function getProjectId($project_id): int
    {
        return $this->project_id;
    }

}