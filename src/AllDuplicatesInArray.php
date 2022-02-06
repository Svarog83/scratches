<?php

namespace SV;
/**
 * Given an integer array nums of length n where all the integers of nums are in the range [1, n]
 * and each integer appears once or twice, return an array of all the integers that appears twice.
 *
 * You must write an algorithm that runs in O(n) time and uses only constant extra space.
 */
class AllDuplicatesInArray {

	/**
	 * Optimal version. Idea was similar to AllMissingNumbers
	 * Record met only once as '-'. Met twiced - will stay positive.
	 *
	 * It was sill slower than my solution
	 * Runtime: 132 ms, faster than 60.00% of PHP online submissions for Find All Duplicates in an Array.
	 *
	 * @param Integer[] $nums
	 * @return array
	 */

	public function solve( array $nums ): array {
		//[ 4, 3, 2, 7, 8, 2, 3, 1 ], len = 8
		//i:0, $num = 4; $position = 3; $value = 7; it's positive first time, make it negative
		// [ 4, 3, 2, -7, 8, 2, 3, 1 ]

		//i:1, $num = 3; $position = 2; $value = 2; it's positive first time, make it negative
		// [ 4, 3, -2, -7, 8, 2, 3, 1 ]

		//i:4, $num = 8; $position = 7; $value = 1; it's positive first time, make it negative
		// [ 4, 3, 2, -7, 8, 2, 3, -1 ]

		//i:6, $num = 3; $position = 2; $value = -2; it's negative second time, make it positive
		// [ 4, 3, 2, -7, 8, 2, 3, 1 ]

		//i:7, $num = 1; $position = 0; $value = 4; it's positive first time, make it negative
		// [ -4, 3, 2, -7, 8, 2, 3, -1 ]

		$found = [];
		foreach ( $nums as $num ) {
			$position = abs( $num ) - 1;
			$posValue = $nums[ $position ];

			$nums[ $position ] = $posValue * -1;
		}

		foreach ( $nums as $num ) {
			$num      = abs( $num );
			$position = $num - 1;
			$posValue = $nums[ $position ];
			if ( $posValue > 0 && !isset( $found[ $num ] ) ) {
				$found[ $num ] = $num;
			}
		}

		return array_values($found);
	}

	/**
	 * My version - it's fast but used additional memory. Not good
	 *
	 * Runtime: 104 ms, faster than 100.00% of PHP online submissions for Find All Duplicates in an Array.
	 *
	 * @param Integer[] $nums
	 * @return array
	 */

	public function solve2( array $nums ): array {
		$found      = [];
		$duplicates = [];
		$n          = count( $nums );
		for ( $i = 0; $i < $n; $i++ ) {
			$num = $nums[ $i ];
			if ( !isset( $duplicates[ $num ] ) ) {
				$duplicates[ $num ] = TRUE;
			} else {
				$found[] = $num;
			}
		}

		return $found;
	}
}
