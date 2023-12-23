<?php

namespace Cyclonecode\Validator\Tests;

class DoubleTest extends BaseTestCase
{
    public function test_empty_string_error()
    {
        $object = new class
        {
            /** @Validator(Double) */
            public $double = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(Double) */
            public $double = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_double_success()
    {
        $object = new class
        {
            /** @Validator(Double) */
            public $double = '3.14';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_double_success()
    {
        $object = new class
        {
            /** @Validator(Double) */
            public $double = 3.14;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
