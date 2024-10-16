<?php

namespace Pixelpeter\Genderize\Tests\Unit\Models;

use Pixelpeter\Genderize\Models\GenderizeResponse;
use Unirest\Response;

class GenderizeResponseTest extends \PHPUnit\Framework\TestCase
{
    public function test_single_result_is_correctly_set()
    {
        $response = new Response(
            200,
            '{"name":"B\u00e4rbel","gender":"female","probability":"0.75","count":4,"country_id":"DE"}',
            "content-type: text/html; charset=UTF-8\r\n".
            "X-Frame-Options: SAMEORIGIN\r\n".
            "X-Powered-By: PHP/5.5.9-1ubuntu4.6\r\n".
            "X-Rate-Limit-Limit: 1000\r\n".
            "X-Rate-Limit-Remaining: 970\r\n".
            "X-Rate-Limit-Reset: 79614\r\n"
        );

        $genderizeResponse = new GenderizeResponse($response);

        $this->assertInstanceOf('Pixelpeter\Genderize\Models\Name', $genderizeResponse->result);
        $this->assertInstanceOf('Pixelpeter\Genderize\Models\Meta', $genderizeResponse->meta);
    }

    public function test_multiple_result_is_correctly_set()
    {
        $response = new Response(
            200,
            '[{"name":"B\u00e4rbel","gender":"female","probability":"0.80","count":5},{"name":"Marcel","gender":"male","probability":"0.96","count":403}]',
            "content-type: text/html; charset=UTF-8\r\n".
            "X-Frame-Options: SAMEORIGIN\r\n".
            "X-Powered-By: PHP/5.5.9-1ubuntu4.6\r\n".
            "X-Rate-Limit-Limit: 1000\r\n".
            "X-Rate-Limit-Remaining: 970\r\n".
            "X-Rate-Limit-Reset: 79614\r\n"
        );

        $genderizeResponse = new GenderizeResponse($response);

        $this->assertInstanceOf('Illuminate\Support\Collection', $genderizeResponse->result);
        $this->assertInstanceOf('Pixelpeter\Genderize\Models\Meta', $genderizeResponse->meta);
    }
}
