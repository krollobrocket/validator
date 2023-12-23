<?php

namespace Cyclonecode\Validator\Tests;

class AlphaTest extends BaseTestCase
{
    public function test_string_with_spaces()
    {
        $object = new class
        {
            /** @Validator(Alpha) */
            public $name = 'Mr johnes';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_with_numbers_error()
    {
        $object = new class
        {
            /** @Validator(Alpha) */
            public $name = 'Mr johnes 123';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_with_special_chars_error()
    {
        $object = new class
        {
            /** @Validator(Alpha) */
            public $name = 'Mr johnes!';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }
}
