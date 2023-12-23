<?php

namespace Cyclonecode\Validator\Tests;

class MinMaxTest extends BaseTestCase
{
    public function test_under_min_error()
    {
        $object = new class
        {
            /** @Validator(MinMax, 10, 15) */
            public $age = 9;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_over_max_error()
    {
        $object = new class
        {
            /** @Validator(MinMax, 10, 15) */
            public $age = 16;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(MinMax, 10, 15) */
            protected $age = 13;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
