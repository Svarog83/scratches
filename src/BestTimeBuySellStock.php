<?php

namespace SV;
/**
 * Need to use two pointers!
 *
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 *
 * You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the
 * future to sell that stock.
 *
 * Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 *
 */
class BestTimeBuySellStock {

	public function solve( array $prices ): int {
		$l    = 0; //left=buy
		$r    = 1; //right = sell
		$maxP = 0;
		while ( $r < count( $prices ) ) {
			//profitable?
			if ( $prices[ $l ] < $prices[ $r ] ) {
				$profit = $prices[ $r ] - $prices[ $l ];
				$maxP   = max( $maxP, $profit );
			} else {
				$l = $r;
			}

			$r++;
		}

		return $maxP;
	}

	/**
	 * My version
	 * Runtime: 292 ms, faster than 99.58% of PHP online submissions for Best Time to Buy and Sell Stock.
	 *
	 * @param Integer[] $prices
	 * @return int
	 */

	public function solve2( array $prices ): int {
		$curMin = $prices[0];
		$curMax = 0;
		foreach ( $prices as $price ) {
			$curDiff = $price - $curMin;

			if ( $curDiff > $curMax ) {
				$curMax = $curDiff;
			}

			if ( $price < $curMin ) {
				$curMin = $price;
			}
		}

		return $curMax;
	}
}
