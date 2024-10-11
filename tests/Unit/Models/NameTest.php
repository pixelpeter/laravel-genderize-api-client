<?php

namespace Pixelpeter\Genderize\Tests\Unit\Models;

use Pixelpeter\Genderize\Models\Name;

class NameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Name
     */
    protected $name;

    /**
     * Set up
     */
    public function setUp(): void
    {
        $data = (object) [
            'gender' => 'male',
            'name' => 'John',
            'probability' => 0.98,
            'count' => 1234,
        ];

        $this->name = new Name($data);
    }

    public function test_data_is_set_correctly()
    {
        $this->assertSame('male', $this->name->gender);
        $this->assertSame('John', $this->name->name);
        $this->assertSame(0.98, $this->name->probability);
        $this->assertSame(1234, $this->name->count);
    }

    public function test_defaults_added_correctly()
    {
        $data = (object) [];

        $name = new Name($data);

        $this->assertNull($name->gender);
        $this->assertNull($name->name);
        $this->assertNull($name->probability);
        $this->assertNull($name->count);
    }

    public function test_isMale()
    {
        $this->assertTrue($this->name->isMale());
    }

    public function test_isNotMale()
    {
        $this->assertFalse($this->name->isNotMale());
    }

    public function test_isFemale()
    {
        $this->assertFalse($this->name->isFemale());
    }

    public function test_isNotFemale()
    {
        $this->assertTrue($this->name->isNotFemale());
    }
}
