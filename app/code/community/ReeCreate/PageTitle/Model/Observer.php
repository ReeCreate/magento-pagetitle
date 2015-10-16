<?php

class ReeCreate_PageTitle_Model_Observer
{
    /**
     * Change product meta title on product view
     *
     * @pram Varien_Event_Observer $observer
     * @return ReeCreate_PageTitle_Model_Observer
     */
    public function catalog_controller_product_view(Varien_Event_Observer $observer)
    {
        if ($product = $observer->getEvent()->getProduct()) {
            $title = $product->getData('name');
            $product->setMetaTitle($title);
        }
        return $this;
    }
}