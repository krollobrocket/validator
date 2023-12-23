<?php

namespace Cyclonecode\Validator\Tests;

class LengthTest extends BaseTestCase
{
    public function test_Length_exception()
    {
        $object = new class
        {
            /** @Validator(Length, 10) */
            public $string = 'foobar,foobarbaz';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }
}
