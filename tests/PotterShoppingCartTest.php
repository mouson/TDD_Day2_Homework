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
     * 測試 第一集買了一本，其他都沒買，價格應為100*1=100元
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

}
