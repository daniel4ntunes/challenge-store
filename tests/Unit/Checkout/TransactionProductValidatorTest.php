<?php

namespace Tests\Unit\Common;

use Tests\TestCase;
use App\Http\Business\Checkout\TransactionProductValidator;

class TransactionProductValidatorTest extends TestCase
{
    public function getParams()
    {
        return [
            'transaction_id' => 2,
            'des' => 'Teste',
            'unit_price' => 10.8,
            'quantity' => 1,
            'product_id' => 2,
        ];
    }

    public function testValidateRun()
    {
        $validate = TransactionProductValidator::run($this->getParams());

        $this->assertEquals(true, $validate);
    }
}
