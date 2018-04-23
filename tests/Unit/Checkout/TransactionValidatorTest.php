<?php

namespace Tests\Unit\Common;

use Tests\TestCase;
use App\Http\Business\Checkout\TransactionValidator;

class TransactionValidatorTest extends TestCase
{
    public function getParams()
    {
        return [
            'date_added' => new \DateTime(),
            'customer_id' => 1,
            'total' => 100,
        ];
    }

    public function testValidateRun()
    {
        $validate = TransactionValidator::run($this->getParams());

        $this->assertEquals(true, $validate);
    }
}
