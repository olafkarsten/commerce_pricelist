<?php

namespace Drupal\Tests\commerce_pricelist\Kernel\Entity;

use Drupal\commerce_pricelist\Entity\PriceList;
use Drupal\commerce_pricelist\Entity\PriceListType;
use Drupal\field\Entity\FieldConfig;
use Drupal\Tests\commerce_pricelist\Kernel\PriceListKernelTestBase;

/**
 * Tests the PriceList entity.
 *
 * @coversDefaultClass \Drupal\commerce_pricelist\Entity\PriceList
 *
 * @group commerce_pricelist
 */
class PriceListTest extends PriceListKernelTestBase {

  /**
   * A sample user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $user = $this->createUser();
    $this->user = $this->reloadEntity($user);
  }

  /**
   * @covers ::getName
   * @covers ::setName
   * @covers ::getCreatedTime
   * @covers ::setCreatedTime
   * @covers ::getOwner
   * @covers ::setOwner
   * @covers ::getOwnerId
   * @covers ::setOwnerId
   */
  public function testPriceList() {
    $priceList = PriceList::create(
      [
        'type' => 'default',
      ]
    );
    $priceList->save();

    $priceList->setName('My Testtitle');
    $this->assertEquals('My Testtitle', $priceList->getName());

    $priceList->setCreatedTime(635879700);
    $this->assertEquals(635879700, $priceList->getCreatedTime());

    $priceList->setOwner($this->user);
    $this->assertEquals($this->user, $priceList->getOwner());
    $this->assertEquals($this->user->id(), $priceList->getOwnerId());
    $priceList->setOwnerId(0);
    $this->assertEquals(NULL, $priceList->getOwner());
    $priceList->setOwnerId($this->user->id());
    $this->assertEquals($this->user, $priceList->getOwner());
    $this->assertEquals($this->user->id(), $priceList->getOwnerId());

  }

  /**
   * Whether the required fields are attached to the PriceList entity.
   */
  public function testFieldsGetAttached() {

    $priceList = PriceList::create(
      [
        'type' => 'default',
      ]
    );
    $priceList->save();
    $this->assertEquals('default', $priceList->bundle());

    // Confirm the attached price list item field is there.
    $this->assertTrue($priceList->hasField('field_price_list_item'));
    $created_field = $priceList->getFieldDefinition('field_price_list_item');
    $this->assertInstanceOf(FieldConfig::class, $created_field);
    $this->assertEquals('price_list_item', $created_field->getSetting('target_type'));
    $this->assertEquals('default:price_list_item', $created_field->getSetting('handler'));

    // Confirm the attached store field is there.
    $this->assertTrue($priceList->hasField('field_stores'));
    $created_field = $priceList->getFieldDefinition('field_stores');
    $this->assertInstanceOf(FieldConfig::class, $created_field);
    $this->assertEquals('commerce_store', $created_field->getSetting('target_type'));
    $this->assertEquals('default:commerce_store', $created_field->getSetting('handler'));

    PriceListType::create(
      [
        'id' => 'test',
        'label' => 'Test',
        'description' => 'My random product list type',
      ]
    )->save();

    $priceList = PriceList::create(
      [
        'type' => 'test',
      ]
    );
    $priceList->save();
    $this->assertEquals('test', $priceList->bundle());

    // Note this are intentional failing tests until #2966977 is solved
    // @see https://www.drupal.org/project/commerce_pricelist/issues/2966977
    // Confirm the attached price list item field is there.
    $this->assertTrue($priceList->hasField('field_price_list_item'));
    $created_field = $priceList->getFieldDefinition('field_price_list_item');
    $this->assertInstanceOf(FieldConfig::class, $created_field);
    $this->assertEquals('price_list_item', $created_field->getSetting('target_type'));
    $this->assertEquals('default:price_list_item', $created_field->getSetting('handler'));

    // Confirm the attached store field is there.
    $this->assertTrue($priceList->hasField('field_stores'));
    $created_field = $priceList->getFieldDefinition('field_stores');
    $this->assertInstanceOf(FieldConfig::class, $created_field);
    $this->assertEquals('commerce_store', $created_field->getSetting('target_type'));
    $this->assertEquals('default:commerce_store', $created_field->getSetting('handler'));
  }

}
