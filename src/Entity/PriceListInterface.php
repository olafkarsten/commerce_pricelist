<?php

namespace Drupal\commerce_pricelist\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining price list entities.
 *
 * @ingroup commerce_pricelist
 */
interface PriceListInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the price list type.
   *
   * @return string
   *   The price list type.
   */
  public function getType();

  /**
   * Gets the price list name.
   *
   * @return string
   *   Name of the price list.
   */
  public function getName();

  /**
   * Sets the price list name.
   *
   * @param string $name
   *   The price list name.
   *
   * @return \Drupal\commerce_pricelist\Entity\PriceListInterface
   *   The called price list entity.
   */
  public function setName($name);

  /**
   * Gets the price list creation timestamp.
   *
   * @return int
   *   Creation timestamp of the price list.
   */
  public function getCreatedTime();

  /**
   * Sets the price list creation timestamp.
   *
   * @param int $timestamp
   *   The price list creation timestamp.
   *
   * @return \Drupal\commerce_pricelist\Entity\PriceListInterface
   *   The called price list entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the price list's item list.
   *
   * @return \Drupal\commerce_pricelist\Entity\PriceListItemInterface[]
   *   The price list items.
   */
  public function getItems();

  /**
   * Gets the conditions.
   *
   * @return \Drupal\commerce\Plugin\Commerce\Condition\ConditionInterface[]
   *   The conditions.
   */
  public function getConditions();

  /**
   * Sets the conditions.
   *
   * @param \Drupal\commerce\Plugin\Commerce\Condition\ConditionInterface[] $conditions
   *   The conditions.
   *
   * @return $this
   */
  public function setConditions(array $conditions);

  /**
   * Gets the condition operator.
   *
   * @return string
   *   The condition operator. Possible values: AND, OR.
   */
  public function getConditionOperator();

  /**
   * Sets the condition operator.
   *
   * @param string $condition_operator
   *   The condition operator.
   *
   * @return $this
   */
  public function setConditionOperator($condition_operator);

  /**
   * Gets the price list start date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime
   *   The price list start date.
   */
  public function getStartDate();

  /**
   * Sets the price list start date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $start_date
   *   The price list start date.
   *
   * @return $this
   */
  public function setStartDate(DrupalDateTime $start_date);

  /**
   * Gets the price list end date.
   *
   * @return \Drupal\Core\Datetime\DrupalDateTime|null
   *   The price list end date, or NULL
   */
  public function getEndDate();

  /**
   * Sets the price list end date.
   *
   * @param \Drupal\Core\Datetime\DrupalDateTime $end_date
   *   The price list end date.
   *
   * @return $this
   */
  public function setEndDate(DrupalDateTime $end_date = NULL);

  /**
   * Returns whether or not the price list is enabled.
   *
   * @return bool
   *   TRUE if the price list is enabled, FALSE if not.
   */
  public function isEnabled();

  /**
   * Sets the price list as enabled.
   *
   * @return $this
   */
  public function setEnabled();

  /**
   * Sets the price list as disabled.
   *
   * @return $this
   */
  public function setDisabled();

  /**
   * Checks whether the price list is available.
   *
   * Ensures that the price list is enabled and the current date matches the
   * start and end dates, if any.
   *
   * @return bool
   *   TRUE if price list is available, FALSE otherwise.
   */
  public function available();

  /**
   * Gets the weight of the price list in relation to others. The price list
   * with the highest weight wins. In case.
   *
   * @return int
   *   The weight.
   */
  public function getWeight();

  /**
   * Sets the weight.
   *
   * @param int $weight
   *   The weight.
   *
   * @return $this
   *
   * @see \Drupal\commerce_pricelist\Entity\PriceListInterface::getWeight()
   */
  public function setWeight($weight);

}
