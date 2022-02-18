<?php

namespace SV;

/**
 * Need to use lo = 0 and hi = count(nums) -1. And calcualte mid on each step (most difficult!)
 * $middle = $lo + floor( ( $hi - $lo + 1 ) / 2 );
 *
 * Given an array of integers nums which is sorted in ascending order, and an integer target, write a function to
 * search target in nums. If target exists, then return its index. Otherwise, return -1.
 *
 * You must write an algorithm with O(log n) runtime complexity.
 */
class BinarySearch {

	/**
	 * My version - tried to rewrite
	 *
	 * @param array $nums
	 * @param int   $target
	 * @return int
	 */
	public function solve( array $nums, int $target ): int {
		$lo = 0;
		$hi = count( $nums ) - 1;

//		[ [ -1, 0, 2, 3, 5, 9, 12 ], target: 9, index: 5 ]
		//lo = 0, hi = 6, middle = 3, curVal 3 < 9, lo = 3, hi = 6 - so go to next step
		//lo = 3, hi = 6, middle = 3 + ((3+1)/2) = 5, curVal = 9, bingo!

		while ( $lo < $hi ) {
			$middle = $lo + floor( ( $hi - $lo + 1 ) / 2 );
			$curVal = $nums[$middle];
			if ($curVal === $target) {
				$lo = $middle;
				break;
			}

			if ($curVal < $target) {
				$lo = $middle;
			}
			else {
				$hi = $middle -1;
			}
		}

		return $nums[ $lo ] ? $lo : -1;
	}

	/*
	 * The best version
	 */
	public function solve_optimal( array $nums, int $target ): int {
		$lo = 0;
		$hi = count( $nums ) - 1;
		while ( $lo < $hi ) {
			$mid = $lo + floor( ( $hi - $lo + 1 ) / 2 );
			if ( $target < $nums[ $mid ] ) {
				$hi = $mid - 1;
			} else {
				$lo = $mid;
			}
		}

		return $nums[ $lo ] === $target ? $lo : -1;
	}

	/**
	 * My version - could not make it work without array_slice
	 *
	 * @param array $nums
	 * @param int   $target
	 * @return int
	 */
	public function solve2( array $nums, int $target ): int {
		$foundIndex = -1;
		$countNums  = count( $nums );
		$add        = $countNums % 2 === 0 ? 0 : 1;
		$middle     = floor( $countNums / 2 );
		echo "\n" . '<br>' . $middle . ' - middle<br>' . "\n";
		$counter = 0;
		while ( $countNums ) {
			if ( $countNums < 0 ) {
				break;
			}
			$currentValue = $nums[ $middle ];
			echo "\n" . '<br>' . $currentValue . ' - currentValue<br>' . "\n";
			if ( $currentValue === $target ) {
				$foundIndex = $middle;
				break;
			}

			if ( $currentValue < $target ) {
				//				echo 'here';
				$countNums -= $middle;
				$middle    += floor( $countNums / 2 ) + $add;
			} else {
				//				echo 'SDSFDSF';
				$countNums = $countNums - $middle - $add;
				$middle    = floor( $countNums / 2 );
			}

			echo "\n" . '<br>' . $countNums . ' - countNums<br>' . "\n";
			echo "\n" . '<br>' . $middle . ' - middle<br>' . "\n";
			$counter++;
			if ( $counter > 100 ) {
				exit();
			}
		}

		//		exit();

		return $foundIndex;
	}

	/**
	 * My version - just first thought. Not really a search
	 *
	 * @param array $nums
	 * @param int   $target
	 * @return int
	 */
	public function solve3( array $nums, int $target ): int {
		$flip = array_flip( $nums );

		return $flip[ $target ] ?? -1;
	}
}