<?php

namespace Pixelpeter\Genderize\Tests\Unit\Facades;


use Pixelpeter\Genderize\Facades\Genderize;
use Pixelpeter\Genderize\Tests\TestCase;

class GenderizeTest extends TestCase
{
    /**
     * Check the facade can be called
     *
     * @test
     */
    public function check_the_facade_could_be_called()
    {
        $this->assertInstanceOf(\Pixelpeter\Genderize\GenderizeClient::class, Genderize::name('John'));
    }
}
