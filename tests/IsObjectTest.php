<?php

namespace Cyclonecode\Validator\Tests;

class IsObjectTest extends BaseTestCase
{
    public function test_string_error()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_integer_error()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = 255;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_double_error()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = 3.14;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_array_error()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = [];
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(IsObject) */
            public $object = null;
        };
        $object->object = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}