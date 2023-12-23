<?php

namespace Cyclonecode\Validator\Tests;

class EmailTest extends BaseTestCase
{
    public function test_empty_string_error()
    {
        $object = new class
        {
            /** @Validator(Email) */
            public $email = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(Email) */
            public $email = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_missing_at_error()
    {
        $object = new class
        {
            /** @Validator(Email) */
            public $email = 'bogus.com';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_missing_name_error()
    {
        $object = new class
        {
            /** @Validator(Email) */
            protected $email = '@bogus.com';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(Email) */
            protected $email = 'bogus@bogus.com';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}