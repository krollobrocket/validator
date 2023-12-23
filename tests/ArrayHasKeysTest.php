<?php

namespace Cyclonecode\Validator\Tests;

class ArrayHasKeysTest extends BaseTestCase
{
    public function test_not_array_error()
    {
        $object = new class
        {
            /** @Validator(ArrayHasKeys, foo, bar, baz) */
            public $array = 'bogus';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(ArrayHasKeys, foo, bar, baz) */
            public $array = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_missing_key_error()
    {
        $object = new class
        {
            /** @Validator(ArrayHasKeys, foo, bar, baz) */
            public $array = [
                'foo' => 'foo',
                'bar' => 'bar',
            ];
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_success()
    {
        $object = new class
        {
            /** @Validator(ArrayHasKeys, foo, bar, baz) */
            public $array = [
                'foo' => 'foo',
                'bar' => 'bar',
                'baz' => 'baz',
            ];
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
