<?php

namespace Omnipay\BillPay\Message\ResponseData;

use SimpleXMLElement;

/**
 * Access invoice bank account in the response
 *
 * @property SimpleXMLElement $data
 *
 * @package   Omnipay\BillPay
 * @author    Andreas Lange <andreas.lange@quillo.de>
 * @copyright 2016, Quillo GmbH
 * @license   MIT
 */
trait InvoiceBankAccountTrait
{
    /**
     * Extracts the invoice bank account data if it exists
     *
     * @return array|null
     */
    public function getInvoiceBankAccount()
    {
        if (!$this->hasInvoiceBankAccount()) {
            return null;
        }

        return [
            'account_holder' => (string)$this->data->invoice_bank_account['account_holder'],
            'account_number' => (string)$this->data->invoice_bank_account['account_number'],
            'bank_code' => (string)$this->data->invoice_bank_account['bank_code'],
            'bank_name' => (string)$this->data->invoice_bank_account['bank_name'],
            'invoice_reference' => (string)$this->data->invoice_bank_account['invoice_reference']
        ];
    }

    /**
     * Checks if the node has an invoice bank account node
     *
     * @return bool
     */
    public function hasInvoiceBankAccount()
    {
        return $this->data instanceof SimpleXMLElement && isset($this->data->invoice_bank_account);
    }
}
