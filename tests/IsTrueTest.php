<?php

namespace Cyclonecode\Validator\Tests;

class IsTrueTest extends BaseTestCase
{
    public function test_false_error()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = false;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_off_error()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = 'off';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_on_success()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = 'on';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_number_1_success()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = 1;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_1_success()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = '1';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_true_success()
    {
        $object = new class
        {
            /** @Validator(IsTrue) */
            public $isClicked = 'true';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
