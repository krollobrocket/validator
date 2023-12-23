<?php

namespace Cyclonecode\Validator;

use Cyclonecode\Validator\Exception\ValidationException;

class Validator
{
    protected array $errors = [];

    /**
     * Returns an array of validations rules or an empty array.
     *
     * @param string $comment
     * @return array
     */
    protected function parseValidationRules(string $comment): array
    {
        $comment = str_replace("\r", "\n", $comment);
        $matches = [];
        if (preg_match_all('/@Validator\((.*?)\)/mi', $comment, $matches) && $matches[1]) {
            return array_map(fn ($v) => array_map('trim', explode(',', $v)), $matches[1]);
        }
        return [];
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validate($object)
    {
        $reflectionClass = new \ReflectionClass($object);
        foreach ($reflectionClass->getProperties() as $property) {
            $rules = $this->parseValidationRules($property->getDocComment());
            if ($rules) {
                $stopOnError = (bool) array_filter($rules, fn ($rule) => $rule[0] === 'Stop');
                foreach ($rules as $rule) {
                    $className = __NAMESPACE__ . "\\Rule\\$rule[0]";
                    if (class_exists($className)) {
                        $validationRule = new $className(...array_slice($rule, 1));
                        $property->setAccessible(\ReflectionProperty::IS_PUBLIC);
                        if (!$validationRule->validate($property->getValue($object))) {
                            $this->errors[$property->getName()][] = $rule[0];
                            if ($stopOnError) {
                                break;
                            }
                        }
                    }
                }
            }
        }
        return !$this->errors;
    }
}
