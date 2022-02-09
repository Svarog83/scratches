<?php

namespace SV;
/**
 * It was easy. Even no need to use left and right pointer. Just compare next value with the current one. And sum the
 * difference. Looks easier than BestTimeBuySellStock
 *
 * You are given an integer array prices where prices[i] is the price of a given stock on the ith day.
 *
 * On each day, you may decide to buy and/or sell the stock. You can only hold at most one share of the stock at any
 * time. However, you can buy it then immediately sell it on the same day.
 *
 * Find and return the maximum profit you can achieve.
 */
class BestTimeBuySellStock2 {

	public function solve( array $prices ): int {
		$l           = 0; //left=buy
		$r           = 1; //right = sell
		$maxP        = 0;
		$countPrices = count( $prices );
		while ( $r < $countPrices ) {
			//profitable?
			if ( $prices[ $l ] < $prices[ $r ] ) {
				$profit = $prices[ $r ] - $prices[ $l ];
				$maxP   += $profit;
			}

			$l = $r;
			$r++;
		}

		return $maxP;
	}
}
