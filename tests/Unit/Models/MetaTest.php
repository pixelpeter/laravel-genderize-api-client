<?php

namespace Pixelpeter\Genderize\Tests\Unit\Models;

use Carbon\Carbon;
use Pixelpeter\Genderize\Models\Meta;

class MetaTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Meta
     */
    protected $meta;

    /**
     * Set up
     */
    protected function setUp(): void
    {
        $data = (object) [
            'code' => 200,
            'headers' => [
                'X-Rate-Limit-Limit' => 7000,
                'X-Rate-Limit-Remaining' => 1000,
                'X-Rate-Limit-Reset' => 0,
            ],
        ];

        $this->meta = new Meta($data);
    }

    public function test_data_is_set_correctly()
    {
        $this->assertSame(200, $this->meta->code);
        $this->assertSame(7000, $this->meta->limit);
        $this->assertSame(1000, $this->meta->remaining);
        $this->assertInstanceOf('Carbon\Carbon', $this->meta->reset);
        $this->assertSame(Carbon::now()->toDateTimeString(), $this->meta->reset->toDateTimeString());
    }
}
