<?php

namespace Cyclonecode\Validator\Tests;

class IntegerTest extends BaseTestCase
{
    public function test_empty_string_error()
    {
        $object = new class
        {
            /** @Validator(Integer) */
            public $number = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            public $number = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_success()
    {
        $object = new class
        {
            /** @Validator(Integer) */
            protected $number = '255';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_integer_success()
    {
        $object = new class
        {
            /** @Validator(Integer) */
            protected $number = 127;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
