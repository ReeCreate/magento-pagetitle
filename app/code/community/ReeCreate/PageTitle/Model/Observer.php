<?php

class ReeCreate_PageTitle_Model_Observer
{
    /**
     * Change product or category page titles
     *
     * @pram Varien_Event_Observer $observer
     * @return ReeCreate_PageTitle_Model_Observer
     */
    public function controller_action_layout_generate_blocks_after(Varien_Event_Observer $observer)
    {
        $head = $observer->getLayout()->getBlock('head');

        if(Mage::registry('current_product'))
        {
            $title = Mage::registry('current_product')->getName();
        }

        if(Mage::registry('current_category') && empty($title))
        {
            $title = Mage::registry('current_category')->getName();
        }

        if(!empty($title))
        {
            $head->setTitle($title);
        }
    }
}