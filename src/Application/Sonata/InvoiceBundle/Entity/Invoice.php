<?php

namespace App\Application\Sonata\InvoiceBundle\Entity;

use Sonata\InvoiceBundle\Entity\BaseInvoice as BaseInvoice;

/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/working-with-objects.html#working-with-objects
 */
class Invoice extends BaseInvoice
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}
