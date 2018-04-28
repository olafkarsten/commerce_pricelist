<?php

namespace Drupal\Tests\commerce_pricelist\Kernel;

use Drupal\Tests\commerce\Kernel\CommerceKernelTestBase;

/**
 * Base class for commerce pricelist kernel tests.
 *
 * @requires module commerce_pricelist
 */
abstract class PriceListKernelTestBase extends CommerceKernelTestBase {

  /**
   * Modules to enable.
   *
   * Note that when a child class declares its own $modules list, that list
   * doesn't override this one, it just extends it.
   *
   * @var array
   */
  public static $modules = [
    'commerce_pricelist',
    'commerce_product'
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->installEntitySchema('price_list');
    $this->installEntitySchema('price_list_type');
    $this->installEntitySchema('price_list_item');
    $this->installEntitySchema('price_list_item_type');

    $this->installConfig(['commerce_pricelist']);

    $user = $this->createUser();
    $this->user = $this->reloadEntity($user);
  }

}
