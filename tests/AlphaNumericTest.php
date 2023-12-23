<?php

namespace Cyclonecode\Validator\Tests;

class AlphaNumericTest extends BaseTestCase
{
    public function test_string_with_letters_and_numbers()
    {
        $object = new class
        {
            /** @Validator(AlphaNumeric) */
            public $nickname = 'superuser 666';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_with_special_characters_error()
    {
        $object = new class
        {
            /** @Validator(AlphaNumeric) */
            public $nickname = 'superuser 666!!!';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_string_with_only_letters()
    {
        $object = new class
        {
            /** @Validator(AlphaNumeric) */
            public $nickname = 'superuser';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_string_with_only_numers()
    {
        $object = new class
        {
            /** @Validator(AlphaNumeric) */
            public $nickname = '666';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}
