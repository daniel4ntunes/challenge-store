<?php

namespace Tests\Unit\Common;

use Tests\TestCase;
use App\Http\Business\Checkout\CustomerValidator;

class CustomerValidatorTest extends TestCase
{
    public function getParams()
    {
        return [
            'name' => 'Teste',
            'email' => 'teste@gmail.com',
            'cpf' => '123.321.789-47',
            'phone' => '(11) 11111-1111',
        ];
    }

    public function testValidateRun()
    {
        $validate = CustomerValidator::run($this->getParams());

        $this->assertEquals(true, $validate);
    }
}
