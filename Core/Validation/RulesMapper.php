<?php

namespace Core\Validation;



use Src\Validation\Rules\MaxRule;
use Src\Validation\Rules\EmailRule;
use Src\Validation\Rules\UniqueRule;
use Src\Validation\Rules\BetweenRule;
use Src\Validation\Rules\AlphaNumRule;
use Src\Validation\Rules\RequiredRule;
use Src\Validation\Rules\ConfirmedRule;

trait RulesMapper
{
    protected static array $map = [
        'required' => RequiredRule::class,
        'alnum' => AlphaNumRule::class,
        'max' => MaxRule::class,
        'between' => BetweenRule::class,
        'email' => EmailRule::class,
        'confirmed' => ConfirmedRule::class,
        'unique' => UniqueRule::class,
    ];

    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}
