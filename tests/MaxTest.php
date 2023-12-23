<?php

namespace Cyclonecode\Validator\Tests;

class MaxTest extends BaseTestCase
{
    public function test_array_length_under_max_success()
    {
        $object = new class
        {
            /** @Validator(Max, 2) */
            public $array = [1, 2];
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_array_length_over_max_error()
    {
        $object = new class
        {
            /** @Validator(Max, 2) */
            public $array = [1, 2, 3];
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_length_under_max_success()
    {
        $object = new class
        {
            /** @Validator(Max, 3) */
            public $string = 'foo';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_length_over_max_error()
    {
        $object = new class
        {
            /** @Validator(Max, 3) */
            public $string = 'foobar';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_number_under_max_success()
    {
        $object = new class
        {
            /** @Validator(Max, 3) */
            public $age = 2;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_number_over_max_error()
    {
        $object = new class
        {
            /** @Validator(Max, 3) */
            public $age = 15;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_object_max_error()
    {
        $object = new class
        {
            /** @Validator(Max, 3) */
            public $object;
        };
        $object->object = new \stdClass();
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }
}
