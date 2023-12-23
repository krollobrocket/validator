<?php

namespace Cyclonecode\Validator\Tests;

class UrlTest extends BaseTestCase
{
    public function test_empty_string_error()
    {
        $object = new class
        {
            /** @Validator(Url) */
            public $url = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(Url) */
            public $url = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_http_success()
    {
        $object = new class
        {
            /** @Validator(Url) */
            protected $url = 'http://www.example.com';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_https_success()
    {
        $object = new class
        {
            /** @Validator(Url) */
            protected $url = 'https://www.example.com';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_with_querystring_success()
    {
        $object = new class
        {
            /** @Validator(Url) */
            protected $url = 'https://www.example.com?foo=bar&bar=baz';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}