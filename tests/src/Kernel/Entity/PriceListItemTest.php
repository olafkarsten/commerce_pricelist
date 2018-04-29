<?php

namespace Drupal\Tests\commerce_pricelist\Kernel\Entity;

use Drupal\commerce_price\Price;
use Drupal\commerce_pricelist\Entity\PriceListItem;
use Drupal\commerce_pricelist\Entity\PriceList;
use Drupal\commerce_product\Entity\ProductVariation;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Tests\commerce_pricelist\Kernel\PriceListKernelTestBase;

/**
 * Tests the PriceListItem entity.
 *
 * @coversDefaultClass \Drupal\commerce_pricelist\Entity\PriceListItem
 *
 * @group commerce_pricelist
 */
class PriceListItemTest extends PriceListKernelTestBase {

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
   * @covers ::setPriceListId
   * @covers ::getPriceListId
   * @covers ::getPriceList
   * @covers ::setName
   * @covers ::getName
   * @covers ::setWeight
   * @covers ::getWeight
   * @covers ::setQuantity
   * @covers ::getQuantity
   * @covers ::setCreatedTime
   * @covers ::getCreatedTime
   * @covers ::setPrice
   * @covers ::getPrice
   * @covers ::setPublished
   * @covers ::isPublished
   * @covers ::setPurchasedEntityId
   * @covers ::getPurchasedEntity
   * @covers ::getPurchasedEntityId
   */
  public function testPriceListItem() {
    $priceListItem = PriceListItem::create(
      [
        'type' => 'default',
      ]
    );
    $priceListItem->save();

    $priceList = PriceList::create(
      [
        'type' => 'default',
      ]
    );
    $priceList->save();

    /** @var \Drupal\commerce_pricelist\Entity\PriceListInterface $priceList */
    $priceList = $this->reloadEntity($priceList);
    /** @var \Drupal\commerce_pricelist\Entity\PriceListItemInterface $priceListItem */
    $priceListItem = $this->reloadEntity($priceListItem);

    $priceListItem->setPriceListId($priceList->id());
    $this->assertEquals($priceListItem->getPriceListId(), $priceListItem->id());
    $this->assertTrue($priceListItem->getPriceList() === $priceList);

    $priceListItem->setName('My TestPriceListItem');
    $this->assertEquals('My TestPriceListItem', $priceListItem->getName());

    $priceListItem->setWeight(99);
    $this->assertEquals(99, $priceListItem->getWeight());

    $priceListItem->setQuantity(88);
    $this->assertEquals(88, $priceListItem->getQuantity());

    $priceListItem->setCreatedTime(635666677);
    $this->assertEquals(635666677, $priceListItem->getCreatedTime());

    $price = new Price('9.99', 'USD');
    $priceListItem->setPrice($price);
    $this->assertEquals($price, $priceListItem->getPrice());

    $priceListItem->setPublished(TRUE);
    $this->assertTrue($priceListItem->isPublished());

    $priceListItem->setOwner($this->user);
    $this->assertEquals($this->user, $priceListItem->getOwner());
    $this->assertEquals($this->user->id(), $priceListItem->getOwnerId());
    $priceListItem->setOwnerId(0);
    $this->assertEquals(NULL, $priceListItem->getOwner());
    $priceListItem->setOwnerId($this->user->id());
    $this->assertEquals($this->user, $priceListItem->getOwner());
    $this->assertEquals($this->user->id(), $priceListItem->getOwnerId());

    $variation = ProductVariation::create(['type' => 'default']);
    $priceListItem->setPurchasedEntityId($variation);
    $this->assertEquals($variation->id(), $priceListItem->getPurchasedEntityId());

    $priceListItem->setStartDate(new DrupalDateTime('2018-04-24'));
    $this->assertEquals('2018-04-24', $priceListItem->getStartDate()->format('Y-m-d'));

    $priceListItem->setEndDate(new DrupalDateTime('2018-04-24'));
    $this->assertEquals('2018-04-24', $priceListItem->getEndDate()->format('Y-m-d'));

  }

}
