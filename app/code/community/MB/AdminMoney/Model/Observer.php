<?php

class MB_AdminMoney_Model_Observer
{
    public function paymentMethodIsActive($observer)
    {
        $instance = $observer->getMethodInstance();
        $result = $observer->getResult();

        if ($instance->getCode() == "checkmo") {
            if (Mage::app()->getStore()->isAdmin() && Mage::getStoreConfig('payment/checkmo/admin_active') == "1") {
                $result->isAvailable = true;
            } else if (!Mage::app()->getStore()->isAdmin() && Mage::getStoreConfig('payment/checkmo/admin_active') == "1") {
                $result->isAvailable = false;
            } 
        }
    }
}