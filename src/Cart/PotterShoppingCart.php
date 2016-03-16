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
        $packages = [];
        foreach ($items as $item) {
            $item_id = $item['Id'];

            // 把每個品項的依購買數量依序置入套裝包中
            for ($count = 0; $count < $item['Count']; $count++) {
                $is_added = false;
                foreach ($packages as $pkg_id => $package) {
                    if (!array_key_exists($item_id, $package['Items'])) {
                        $packages[$pkg_id]['Items'][$item_id] = [
                            'SellPrice' => $item['SellPrice'],
                        ];
                        $packages[$pkg_id]['TotalPrice'] += $item['SellPrice'];
                        $is_added = true;
                    }
                }
                // 尚未加入任何套裝計算
                if (!$is_added) {
                    $packages[] = [
                        'Items' => [
                            $item_id => [
                                'SellPrice' => $item['SellPrice']
                            ]
                        ],
                        'TotalPrice' => $item['SellPrice'],
                    ];
                }
            }
        }
        foreach ($packages as $pkg_id => $package) {
            $item_category_count = count($package['Items']);
            $package_price = $package['TotalPrice'];
            if ($item_category_count == 2) {
                $total_price += ($package_price * 0.95);
            } elseif ($item_category_count == 3) {
                $total_price += ($package_price * 0.9);
            } elseif ($item_category_count == 4) {
                $total_price += ($package_price * 0.8);
            } elseif ($item_category_count == 5) {
                $total_price += ($package_price * 0.75);
            } else {
                $total_price += ($package_price * 1);
            }
        }
        return $total_price;
    }
}