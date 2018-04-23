<?php

namespace Tests\Unit\Common;

use Tests\TestCase;
use App\Http\Business\Checkout\TransactionAddressValidator;

class TransactionAddressValidatorTest extends TestCase
{
    public function getParams()
    {
        return [
            'transaction_id' => 1,
            'zipcode' => 114254888,
            'street' => 'Teste xxxx',
            'number' => 011,
            'neighbourhood' => 'Teste',
            'city' => 'Teste',
            'state' => 'Teste',
        ];
    }

    public function testValidateRun()
    {
        $validate = TransactionAddressValidator::run($this->getParams());

        $this->assertEquals(true, $validate);
    }
}
