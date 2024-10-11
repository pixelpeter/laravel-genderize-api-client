<?php

namespace Pixelpeter\Genderize\Tests\Unit;

use Mockery;
use Pixelpeter\Genderize\GenderizeClient;
use Pixelpeter\Genderize\Tests\TestCase;
use Unirest\Response;

class GenderizeClientTest extends TestCase
{
    /**
     * @var \Pixelpeter\Genderize\GenderizeClient
     */
    protected $client;

    /**
     * @var \Unirest\Request
     */
    protected $request;

    /**
     * @var \Unirest\Response
     */
    protected $response;

    /**
     * Set up
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->response = new Response(
            200,
            '{"name":"B\u00e4rbel","gender":"female","probability":"0.75","count":4,"country_id":"DE"}',
            "content-type: text/html; charset=UTF-8\r\n".
            "X-Frame-Options: SAMEORIGIN\r\n".
            "X-Powered-By: PHP/5.5.9-1ubuntu4.6\r\n".
            "X-Rate-Limit-Limit: 1000\r\n".
            "X-Rate-Limit-Remaining: 970\r\n".
            "X-Rate-Limit-Reset: 79614\r\n"
        );

        $this->request = Mockery::mock('\Unirest\Request');
        $this->client = new GenderizeClient($this->request);
    }

    public function test_name_works_correctly_with_string()
    {
        $this->client->name('John');
        $names = $this->getPrivateProperty(GenderizeClient::class, 'names');

        $this->assertCount(1, $names->getValue($this->client));
        $this->assertSame('John', $names->getValue($this->client)[0]);
    }

    public function test_name_works_correctly_with_arrays()
    {
        $this->client->name(['John', 'Jane']);
        $names = $this->getPrivateProperty(GenderizeClient::class, 'names');

        $this->assertCount(2, $names->getValue($this->client));
        $this->assertSame('John', $names->getValue($this->client)[0]);
        $this->assertSame('Jane', $names->getValue($this->client)[1]);
    }

    public function test_names_works_correctly_with_arrays()
    {
        $this->client->names(['John', 'Jane']);
        $names = $this->getPrivateProperty(GenderizeClient::class, 'names');

        $this->assertCount(2, $names->getValue($this->client));
        $this->assertSame('John', $names->getValue($this->client)[0]);
        $this->assertSame('Jane', $names->getValue($this->client)[1]);
    }

    public function test_country_works_correctly()
    {
        $this->client->name('John')->country('US')->lang('EN');
        $country = $this->getPrivateProperty(GenderizeClient::class, 'country');

        $this->assertSame('US', $country->getValue($this->client));
    }

    public function test_lang_works_correctly()
    {
        $this->client->name('John')->country('US')->lang('EN');
        $lang = $this->getPrivateProperty(GenderizeClient::class, 'lang');

        $this->assertSame('EN', $lang->getValue($this->client));
    }

    public function test_get_works_correctly()
    {
        $this->request->shouldReceive('get')->once()->andReturn($this->response);
        $response = $this->client->name('John')->get();

        $this->assertInstanceOf('\Pixelpeter\Genderize\Models\GenderizeResponse', $response);
    }

    public function test_name_is_reset_after_each_usage()
    {
        $this->client->name('John');
        $names = $this->getPrivateProperty(GenderizeClient::class, 'names');

        $this->assertCount(1, $names->getValue($this->client));
        $this->assertSame('John', $names->getValue($this->client)[0]);

        $this->client->name('Jane');
        $names = $this->getPrivateProperty(GenderizeClient::class, 'names');

        $this->assertCount(1, $names->getValue($this->client));
        $this->assertSame('Jane', $names->getValue($this->client)[0]);
    }

    /**
     * Tear down
     */
    public function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }
}
