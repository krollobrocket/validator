<?php

namespace Cyclonecode\Validator\Tests;

use Cyclonecode\Validator\Exception\ValidationException;
use Cyclonecode\Validator\Validator;
use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    protected Validator $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new Validator();
    }

    /**
     * Call protected/private method of a class.
     *
     * @param $object
     * @param $methodName
     * @param array $parameters
     * @return mixed
     * @throws \Exception
     */
    protected function invokeMethod($object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionObject($object);
        try {
            $method = $reflection->getMethod($methodName);
            $method->setAccessible(true);
            return $method->invokeArgs($object, $parameters);
        }  catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
