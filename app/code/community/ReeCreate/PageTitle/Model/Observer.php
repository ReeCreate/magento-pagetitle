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

    /**
     * Change category meta title on category view
     *
     * @pram Varien_Event_Observer $observer
     * @return ReeCreate_PageTitle_Model_Observer
     */
    public function controller_action_layout_generate_blocks_after(Varien_Event_Observer $observer)
    {
        if (Mage::registry('current_category')) {
            $head = $observer->getLayout()->getBlock('head');
            $title = Mage::registry('current_category')->getName();
            $head->setTitle($title);
        }
    }
}