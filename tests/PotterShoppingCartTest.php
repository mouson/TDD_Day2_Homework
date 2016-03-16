<?php
/**
 * Created by PhpStorm.
 * User: mouson
 * Date: 2016/3/16
 * Time: 下午9:04
 */

namespace Homework;

use Homework\Cart\PotterShoppingCart;
class PotterShoppingCartTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Scenario 1: 第一集買了一本，其他都沒買，價格應為100*1=100元
     */
    public function test_PotterShoppingCart_buy_one_should_100_dollar()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1]
        ];
        $expected = 100;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }

    /**
     * Scenario 2: 第一集買了一本，第二集也買了一本，價格應為100*2*0.95=190
     */
    public function test_PotterShoppingCart_buy_two_diff_should_95off_190_doller()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 2, 'SellPrice' => 100, 'Count' => 1],
        ];
        $expected = 190;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }

}
