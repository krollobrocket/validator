<?php

namespace Cyclonecode\Validator\Tests;

class StopTest extends BaseTestCase
{
    public function test_stop_always_returns_true()
    {
        $object = new class
        {
            /** @Validator(Stop) */
            public $age = -11;
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_stop_when_first_rule_fails()
    {
        $object = new class
        {
            /** @Validator(AbsInt)
             * @Validator(Stop)
             * @Validator(Min, 0)
             **/
            public $age = -11;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
        $errors = $this->validator->getErrors();
        $this->assertArrayHasKey('age', $errors);
        $this->assertCount(1, $errors['age']);
    }

    public function test_without_stop_two_errors_is_returned()
    {
        $object = new class
        {
            /** @Validator(AbsInt)
             * @Validator(Min, 0)
             **/
            public $age = -11;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
        $errors = $this->validator->getErrors();
        $this->assertArrayHasKey('age', $errors);
        $this->assertCount(2, $errors['age']);
    }
}
