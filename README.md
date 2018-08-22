# PHP Enum inspired by SplEnum
[![Build Status](https://travis-ci.org/Klamius/php-enum.png?branch=master)](https://travis-ci.org/Klamius/php-enum)
[![Code Coverage](https://scrutinizer-ci.com/g/Klamius/php-enum/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Klamius/php-enum/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Klamius/php-enum/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Klamius/php-enum/?branch=master)

## Installation
by using [composer](https://getcomposer.org/)

```
composer require klamius/php-enum
```

## Philosophie
This library give an easier way to emulate and create enumeration objects natively in PHP and be replacement to 
`SplEnum` which is not integrated directly to PHP.

In our daily usage we deal with many enums (all domain entity states, months, genders, etc. ) and we get into dilemma, 
should it be Class member, constants or Interface constants and so on. and then we treat it as a scalar value which 
most of time can't be validated or type hinted. 

So using an enum instead of constants provides the following advantages:

- type hint: `function setState(OrderStateEnum $state) {`


### Declaration

```php
use Klamius\Enum\Enum;

/**
 * GenderEnum enum
 */
class Gender extends Enum
{
    const MALE = 'male';
    const FEMALE = 'female';
}
```

### Usage

```php
class User
{
    /**
     * @var Gender
     */
    private $gender;
    
    function setGender(Gender $gender)
    {
        $this->gender = $gender;
    }
}

$gender = new Gender(Gender::MALE);
$user->setGender($gender);

//or
echo $gender;
```