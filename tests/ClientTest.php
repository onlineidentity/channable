<?php
beforeEach(function () {
    $this->channable = createClient();
});

it('checks if client is Channable class', function () {
    expect($this->channable instanceof \OnlineIdentity\Channable\Channable)->toBeTrue();
});

it('generates a correct base url', function () {
    $config = createConfig();

    expect($config->generateBaseUrl('subject'))->toBe('https://api.channable.com/v1/subject');
});

it('generates a correct project url', function () {
    $config = createConfig();

    expect($config->generateProjectUrl('subject'))->toBe('https://api.channable.com/v1/companies/2/projects/5331/subject');
});

it('can change the project id', function () {
    $config = createConfig();
    $config->setProjectId(999);

    expect($config->generateProjectUrl('subject'))->toContain('999');
});
