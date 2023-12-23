<?php

namespace Cyclonecode\Validator\Tests;

class IsBooleanTest extends BaseTestCase
{
    public function test_validate_null_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_integer_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = 123;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_double_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = 3.14;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_string_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = 'nope';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_array_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = [];
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_object_error()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = null;
        };
        $object->owenIsTurnedOn = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_validate_false_success()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = false;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_validate_true_success()
    {
        $object = new class
        {
            /** @Validator(IsBoolean) */
            public $owenIsTurnedOn = true;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}