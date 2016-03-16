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
    public function test_PotterShoppingCart_buy_two_diff_should_95off_190_dollar()
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

    /**
     * Scenario 3: 一二三集各買了一本，價格應為100*3*0.9=270
     */
    public function test_PotterShoppingCart_buy_3_diff_should_90off_270_dollar()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 2, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 3, 'SellPrice' => 100, 'Count' => 1],
        ];
        $expected = 270;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }

    /**
     * Scenario 4: 一二三四集各買了一本，價格應為100*4*0.8=320
     */
    public function test_PotterShoppingCart_buy_4_diff_should_80off_320_dollar()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 2, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 3, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 4, 'SellPrice' => 100, 'Count' => 1],
        ];
        $expected = 320;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }

    /**
     * Scenario 5: 一次買了整套，一二三四五集各買了一本，價格應為100*5*0.75=375
     */
    public function test_PotterShoppingCart_buy_5_diff_should_75off_375_dollar()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 2, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 3, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 4, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 5, 'SellPrice' => 100, 'Count' => 1],
        ];
        $expected = 375;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }

    /**
     * Scenario 6: 一二集各買了一本，第三集買了兩本，價格應為100*3*0.9 + 100 = 370
     */
    public function test_Cart_buy_一二集各一本_第三集2本_should_100乘3乘9折_加100元共370元()
    {
        /** Arrange */
        $target = new PotterShoppingCart();
        $items = [
            ['Id' => 1, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 2, 'SellPrice' => 100, 'Count' => 1],
            ['Id' => 3, 'SellPrice' => 100, 'Count' => 2],
        ];
        $expected = 370;

        /** Act */
        $actual = $target->checkout($items);

        /** Assert */
        $this->assertEquals($expected, $actual);
    }
}
