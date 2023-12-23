<?php

namespace Cyclonecode\Validator\Tests;

class IsFalseTest extends BaseTestCase
{
    public function test_true_error()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = true;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_on_error()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = 'on';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_success()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = null;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_off_success()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = 'off';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_number_0_success()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = 0;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_0_success()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = '0';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_false_success()
    {
        $object = new class
        {
            /** @Validator(IsFalse) */
            public $isClicked = 'false';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
