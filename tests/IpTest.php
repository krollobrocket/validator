<?php

namespace Cyclonecode\Validator\Tests;

class IpTest extends BaseTestCase
{
    public function test_empty_string_error()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            public $ip = '';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_null_error()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            public $ip = null;
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_invalid_ip_string_error()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            protected $ip = '127.0.0.';
        };
        $result = $this->validator->validate($object);
        $this->assertFalse($result);
    }

    public function test_ip_v4_success()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            protected $ip = '127.0.0.1';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }

    public function test_ip_v6_success()
    {
        $object = new class
        {
            /** @Validator(Ip) */
            protected $ip = '::1';
        };
        $result = $this->validator->validate($object);
        $this->assertTrue($result);
    }
}