<?php
/**
 * Given an array, rotate the array to the right by k steps, where k is non-negative.
 *
 * Example 1:
 *
 * Input: nums = [1,2,3,4,5,6,7], k = 3
 * Output: [5,6,7,1,2,3,4]
 * Explanation:
 * rotate 1 steps to the right: [7,1,2,3,4,5,6]
 * rotate 2 steps to the right: [6,7,1,2,3,4,5]
 * rotate 3 steps to the right: [5,6,7,1,2,3,4]
 */

class RotateArray {

	public function __construct() {

	}

	/**
	 * @param Integer[] $nums
	 * @param Integer   $k
	 * @return NULL
	 * @throws Exception
	 */
	public function rotate(array &$nums, int $k) {
		if ($k <= 0) {
			throw new RuntimeException('Wrong parameter k');
		}
		$len = count($nums);
		if ($k > $len) {
			$remainder = $k % $len;
			$k         = $remainder;
		}
		$diff     = $len - $k;
		$newArray = [];
		for ($i = $diff; $i < $len; $i++) {
			$newArray[] = $nums[$i];
		}
		for ($i = 0; $i < $diff; $i++) {
			$newArray[] = $nums[$i];
		}

		$nums = $newArray;

		return null;
	}
}
/*
$nums = [1, 2, 3, 4, 5, 6, 7];
//$nums = [-1];
//$nums = [1,2];
$solution = new RotateArray();
$solution->rotate($nums, 3);
?>
	<pre><?= print_r($nums) ?></pre><?php
*/