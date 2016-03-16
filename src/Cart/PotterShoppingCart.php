<?php
/**
 * Created by PhpStorm.
 * User: mouson
 * Date: 2016/3/16
 * Time: 下午10:18
 */

namespace Homework\Cart;

class PotterShoppingCart
{
    /**
     * 購物車結帳
     * @param array $items
     *
     * @return int
     */
    public function checkout(array $items)
    {
        $total_price = 0;
        foreach ($items as $item) {
            $total_price += $item['SellPrice'];
        }
        return $total_price;
    }
}