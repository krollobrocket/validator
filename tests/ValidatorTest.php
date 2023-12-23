<?php

namespace Cyclonecode\Validator\Tests;

class ValidatorTest extends BaseTestCase
{
    public function test_parseValidationRules_invalid_annotation_returns_empty_array()
    {
        $comment = '/** @Validator(AbsInt */';
        $result = $this->invokeMethod($this->validator, 'parseValidationRules', [$comment]);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function test_parseValidationRules_single_rule_success()
    {
        $comment = '/** @Validator(AbsInt) */';
        $result = $this->invokeMethod($this->validator, 'parseValidationRules', [$comment]);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function test_parseValidationRules_multiple_rules_success()
    {
        $comment = '/** @Validator(AbsInt) ' .
                   '**  @Validator(Alpha) */';
        $result = $this->invokeMethod($this->validator, 'parseValidationRules', [$comment]);
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('AbsInt', $result[0][0]);
        $this->assertEquals('Alpha', $result[1][0]);
    }
}
