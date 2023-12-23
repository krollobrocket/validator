<?php

namespace Cyclonecode\Validator\Tests;

class NotNullTest extends BaseTestCase
{
    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(NotNull) */
            public $property = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_empty_string_success()
    {
        $object = new class
        {
            /** @Validator(NotNull) */
            public $property = '';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(NotNull) */
            protected $property = 'bogus';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}