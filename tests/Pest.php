<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function mockClient(Response|RequestException $response)
{
    $mock = new MockHandler([
        $response
    ]);
    $handlerStack = HandlerStack::create($mock);
    return new Client(['handler' => $handlerStack]);
}

function createConfig()
{
    return new \OnlineIdentity\Channable\ChannableConfig(
        api_token: 'APITOKEN',
        company_id: 2,
        project_id: 5331,
        base_url: 'https://api.channable.com',
        version: 'v1'
    );
}

function createClient()
{
    return new OnlineIdentity\Channable\Channable(createConfig());
}


