<?php

namespace Drupal\commerce_pricelist\Entity;

use Drupal\commerce_price\Price;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Defines the interface for price list items.
 *
 * @ingroup commerce_pricelist
 */
interface PriceListItemInterface extends
    ContentEntityInterface,
    EntityChangedInterface,
    EntityPublishedInterface,
    EntityOwnerInterface {

  /**
   * Gets the price list item name.
   *
   * @return string
   *   Name of the price list item.
   */
  public function getName();

  /**
   * Sets the price list item name.
   *
   * @param string $name
   *   The price list item name.
   *
   * @return $this
   */
  public function setName($name);

  /**
   * Gets the price list item quantity.
   *
   * @return string
   *   Quantity of the price list item.
   */
  public function getQuantity();

  /**
   * Sets the price list item quantity.
   *
   * @param string $quantity
   *   The price list item quantity.
   *
   * @return $this
   */
  public function setQuantity($quantity);

  /**
   * Gets the price list item creation timestamp.
   *
   * @return int
   *   Creation timestamp of the price list item.
   */
  public function getCreatedTime();

  /**
   * Sets the price list item creation timestamp.
   *
   * @param int $timestamp
   *   The price list item creation timestamp.
   *
   *   * @return $this.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the price list item weight.
   *
   * @return int
   *   Weight of the price list item.
   */
  public function getWeight();

  /**
   * Sets the price list item weight.
   *
   * @param int $weight
   *   The price list item weight.
   *
   *   * @return $this.
   */
  public function setWeight($weight);

  /**
   * Sets the parent price list ID.
   *
   * @param string $price_list_id
   *   The parent price list ID.
   *
   * @return $this
   */
  public function setPriceListId($price_list_id);

  /**
   * Sets the parent price list.
   *
   * @param \Drupal\commerce_pricelist\Entity\PriceListInterface $price_list
   *   The price list entity.
   *
   * @return $this
   */
  public function setPriceList(PriceListInterface $price_list);

  /**
   * Gets the price list.
   *
   * @return $this
   */
  public function getPriceList();

  /**
   * Gets the price list ID.
   *
   * @return int
   *   The parent price list entity ID.
   */
  public function getPriceListId();

  /**
   * Gets whether the price list item has a purchased entity.
   *
   * @return bool
   *   TRUE if the price list item has a purchased entity, FALSE otherwise.
   */
  public function hasPurchasedEntity();

  /**
   * Gets the purchased entity.
   *
   * @return \Drupal\commerce\PurchasableEntityInterface|null
   *   The purchased entity, or NULL.
   */
  public function getPurchasedEntity();

  /**
   * Gets the purchased entity ID.
   *
   * @return int
   *   The purchased entity ID.
   */
  public function getPurchasedEntityId();

  /**
   * Sets the price list item purchased entity ID.
   *
   * @param string $purchased_entity_id
   *   The purchased entity ID.
   *
   * @return $this
   */
  public function setPurchasedEntityId($purchased_entity_id);

  /**
   * Gets the price list item price.
   *
   * @return \Drupal\commerce_price\Price
   *   The price.
   */
  public function getPrice();

  /**
   * Sets the price list item price.
   *
   * @param \Drupal\commerce_price\Price $price
   *   The price.
   *
   * @return $this
   */
  public function setPrice(Price $price);

  /**
   * Gets the price list item start date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   The price list item start date.
   */
  public function getStartDate();

  /**
   * Sets the price list item start date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $start_date
   *   The price list item start date.
   *
   * @return $this
   */
  public function setStartDate(DrupalDateTime $start_date);

  /**
   * Gets the price list item end date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   The price list item end date.
   */
  public function getEndDate();

  /**
   * Sets the price list item end date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $end_date
   *   The price list item end date.
   *
   * @return $this
   */
  public function setEndDate(DrupalDateTime $end_date = NULL);

}
