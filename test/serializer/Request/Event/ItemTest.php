<?php

declare(strict_types=1);

namespace BluePsyduckTestSerializer\Ga4MeasurementProtocol\Request\Event;

use BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item;
use BluePsyduckTestSerializer\Ga4MeasurementProtocol\SerializerTestCase;

/**
 * The PHPUnit test of the Item class.
 *
 * @author BluePsyduck <bluepsyduck@gmx.com>
 * @license http://opensource.org/licenses/GPL-3.0 GPL v3
 * @covers \BluePsyduck\Ga4MeasurementProtocol\Request\Event\Item
 */
class ItemTest extends SerializerTestCase
{
    public function testWithData(): void
    {
        $item = new Item();
        $item->itemId = 'SKU_12345';
        $item->itemName = 'Stan and Friends Tee';
        $item->affiliation = 'Google Store';
        $item->coupon = 'SUMMER_FUN';
        $item->currency = 'USD';
        $item->creativeName = 'summer_banner2';
        $item->creativeSlot = 'featured_app_1';
        $item->discount = 2.22;
        $item->index = 5;
        $item->itemBrand = 'Google';
        $item->itemCategory = 'Apparel';
        $item->itemCategory2 = 'Adult';
        $item->itemCategory3 = 'Shirts';
        $item->itemCategory4 = 'Crew';
        $item->itemCategory5 = 'Short sleeve';
        $item->itemListId = 'related_products';
        $item->itemListName = 'Related Products';
        $item->itemVariant = 'green';
        $item->locationId = 'L_12345';
        $item->price = 9.99;
        $item->promotionId = 'P_12345';
        $item->promotionName = 'Summer Sale';
        $item->quantity = 1;

        $expectedData = [
            'item_id' => 'SKU_12345',
            'item_name' => 'Stan and Friends Tee',
            'affiliation' => 'Google Store',
            'coupon' => 'SUMMER_FUN',
            'currency' => 'USD',
            'creative_name' => 'summer_banner2',
            'creative_slot' => 'featured_app_1',
            'discount' => 2.22,
            'index' => 5.,
            'item_brand' => 'Google',
            'item_category' => 'Apparel',
            'item_category2' => 'Adult',
            'item_category3' => 'Shirts',
            'item_category4' => 'Crew',
            'item_category5' => 'Short sleeve',
            'item_list_id' => 'related_products',
            'item_list_name' => 'Related Products',
            'item_variant' => 'green',
            'location_id' => 'L_12345',
            'price' => 9.99,
            'promotion_id' => 'P_12345',
            'promotion_name' => 'Summer Sale',
            'quantity' => 1.,
        ];

        $this->assertSerializedObject($expectedData, $item);
    }

    public function testWithoutData(): void
    {
        $item = new Item();

        $expectedData = [];

        $this->assertSerializedObject($expectedData, $item);
    }
}
