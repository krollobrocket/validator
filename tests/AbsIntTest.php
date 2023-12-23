<?php

namespace Cyclonecode\Validator\Tests;

class AbsIntTest extends BaseTestCase
{
    public function test_string_error()
    {
        $object = new class
        {
            /** @Validator(AbsInt) */
            public $age = 'bogus';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_negative_number_error()
    {
        $object = new class
        {
            /** @Validator(AbsInt) */
            protected $age = -15;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(AbsInt) */
            protected $age = 15;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
