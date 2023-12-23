# Validator

[![Run Tests](https://github.com/krollobrocket/validator/actions/workflows/run_tests.yml/badge.svg?branch=master)](https://github.com/krollobrocket/validator/actions/workflows/run_tests.yml)
[![codecov](https://codecov.io/gh/krollobrocket/validator/branch/master/graph/badge.svg)](https://codecov.io/gh/krollobrocket/validator)

Simple library for validating object properties using reflection.

## Usage

    $object = new class
    {
      /** @Validator(MinMax, 30000, 65000) */
      public $salary;

      /** @Validator(Email) */
      public $email;

      /** @Validator(AbsInt) */
      public $age;

      /* @Validator(Url)
       * @Validator(Length, 255)
      */
      public $url;
    };
    $object->salary = $_POST['salary'] ?? 0;
    $object->email = $_POST['email'] ?? '';
    $object->age = $_POST['age'] ?? 0;
    $object->url = $_POST['url'] ?? '';
    $validator = new Validator();
    if (!$validator->validate($object)) {
        // Something when wrong!
    }

    class Foo
    {
        /** @Validator(AbsInt) */
        protected int $age;
        /** @Validator(MinMax, 20000, 50000) */
        protected int $salary;
        /** @Validator(Email) */
        protected string $email;
        /** @Validator(Url) */
        protected string $homepage;

        public function __construct(int $age, int $salary, string $email, string $homepage)
        {
           $this->age = $age;
           $this->salary = $salary;
           $this->email = $email;
           $this->homepage = $homepage;
        }
    }

    $object = new Foo(15, 10000, 'bogus.bogus.com', 'www.example.com');
    $validator = new Validator();
    if (!$validator->validate($object)) {
        // Something when wrong!
    }
