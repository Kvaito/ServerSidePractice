<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LanguageValidator extends AbstractValidator
{
    protected string $message = 'Имя должно содержать только кириллицу';

    public function rule(): bool
    {
        return preg_match('/[а-яёА-ЯЁ]+/u',$this->value);
    }
}