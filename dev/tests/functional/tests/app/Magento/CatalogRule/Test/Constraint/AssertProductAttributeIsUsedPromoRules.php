<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CatalogRule\Test\Constraint;

use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Catalog\Test\Fixture\CatalogProductAttribute;
use Magento\CatalogRule\Test\Page\Adminhtml\CatalogRuleNew;
use Magento\CatalogRule\Test\Page\Adminhtml\CatalogRuleIndex;

/**
 * Create a Catalog Price Rules and check whether this attribute visible in Dropdown on Conditions tab.
 */
class AssertProductAttributeIsUsedPromoRules extends AbstractConstraint
{
    /**
     * Assert that product attribute can be used on promo rules conditions.
     *
     * @param CatalogRuleIndex $catalogRuleIndex
     * @param CatalogRuleNew $catalogRuleNew
     * @param CatalogProductAttribute $attribute
     * @return void
     */
    public function processAssert(
        CatalogRuleIndex $catalogRuleIndex,
        CatalogRuleNew $catalogRuleNew,
        CatalogProductAttribute $attribute
    ) {
        $catalogRuleIndex->open();
        $catalogRuleIndex->getGridPageActions()->addNew();
        $catalogRuleNew->getEditForm()->openTab('conditions');

        \PHPUnit_Framework_Assert::assertTrue(
            $catalogRuleNew->getEditForm()->isAttributeInConditions($attribute->getFrontendLabel()),
            'Product attribute can\'t be used on promo rules conditions.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Product attribute can be used on promo rules conditions.';
    }
}
