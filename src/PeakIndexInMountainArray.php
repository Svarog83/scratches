<?php

namespace SV;

/**
 * Let's call an array arr a mountain if the following properties hold:
 *
 * arr.length >= 3
 * There exists some i with 0 < i < arr.length - 1 such that:
 * arr[0] < arr[1] < ... arr[i-1] < arr[i]
 * arr[i] > arr[i+1] > ... > arr[arr.length - 1]
 * Given an integer array arr that is guaranteed to be a mountain, return any i such that arr[0] < arr[1] < ... arr[i -
 * 1] < arr[i] > arr[i + 1] > ... > arr[arr.length - 1].
 */
class PeakIndexInMountainArray {

	/**
	 * My version. Using binary search to find the peak. Again an issue with middle
	 *
	 * @param array $arr
	 * @return int
	 */
	public function solve( array $arr ): int {
		$lo = 0;
		$hi = count( $arr ) - 1;
		$totalNums = count( $arr);

		while ($lo < $hi) {
			$middle = $lo + floor(($hi - $lo) / 2);
			if ($middle + 1 === $totalNums) {
				//last element reached
				break;
			}

			$middleVal = $arr[ $middle];
			$nextVal = $arr[ $middle+1];
			if ($nextVal > $middleVal) {
				//if the next is greater
				$lo = $middle + 1;
			}
			else {
				$hi = $middle;
			}

			/*if (++$iter > 10) {
				break;
			}*/
		}


		return $lo;
	}
}