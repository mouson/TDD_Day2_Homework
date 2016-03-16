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
        $cart = [];
        foreach ($items as $item) {
            $item_id = $item['Id'];

            if (!array_key_exists($item_id, $cart)) {
                $cart[$item_id] = ['Count' => 0];
            }

            $cart[$item_id]['Count'] += $item['Count'];
            $total_price += $item['SellPrice'];
        }

        $item_category_count = count($cart);

        if ($item_category_count == 2) {
            $total_price *= 0.95;
        } elseif ($item_category_count == 3) {
            $total_price *= 0.9;
        } elseif ($item_category_count == 4) {
            $total_price *= 0.8;
        } elseif ($item_category_count == 5) {
            $total_price *= 0.75;
        } 

        return $total_price;
    }
}