<?php

namespace SV;
/**
 * Sliding window solution - get rid off prefixes less than the current number
 *
 * Given an integer array nums, find the contiguous subarray (containing at least one number) which has the largest sum
 * and return its sum.
 *
 * A subarray is a contiguous part of an array.
 *
 */
class MaximumSubarray {

	/**
	 * My version
	 *
	 * @param Integer[] $nums
	 * @return int
	 */

	public function solve( array $nums ): int {
		$maxSum       = $curSum = $nums[0];

		foreach ( $nums as $i => $currentNum ) {
			if ( $i === 0 ) {
				continue;
			}

			$curSum += $currentNum;
			if ( $currentNum > $curSum ) {
				$curSum = $currentNum;
			}

			if ( $curSum > $maxSum ) {
				$maxSum = $curSum;
			}
		}

		return $maxSum;
	}
}
