<?php

namespace Cyclonecode\Validator\Tests;

class IsStringTest extends BaseTestCase
{
    public function test_validate_null_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_integer_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = 15;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_double_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = 3.14;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_boolean_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = true;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_array_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = ['foo', 'bar'];
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_object_error()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = null;
        };
        $object->name = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_success()
    {
        $object = new class
        {
            /** @Validator(IsString) */
            public $name = 'Mr boggie';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}