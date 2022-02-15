<?php

namespace SV;

/**
 * Need to use lo and hi. And calcualte mid on each step.
 *
 * Given an array of integers nums which is sorted in ascending order, and an integer target, write a function to
 * search target in nums. If target exists, then return its index. Otherwise, return -1.
 *
 * You must write an algorithm with O(log n) runtime complexity.
 */
class BinarySearch {

	public function solve( array $nums, int $target ): int {
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