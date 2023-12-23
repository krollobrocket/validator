<?php

namespace Cyclonecode\Validator\Tests;

class IsArrayTest extends BaseTestCase
{
    public function test_validate_string_error()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_null_error()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_integer_error()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array = 123;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_double_error()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array = 3.14;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_object_error()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array;
        };
        $object->array = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_success()
    {
        $object = new class
        {
            /** @Validator(IsArray) */
            public $array = [];
        };
        $object->object = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}