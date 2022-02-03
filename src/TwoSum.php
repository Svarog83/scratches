<?php /** @noinspection ForgottenDebugOutputInspection */

namespace SV;

/**
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
 *
 * Learn a good solution here: https://www.code-recipe.com/post/two-sum
 */
class TwoSum {

	/**
	 * Mine version. Too slow. It's n^3
	 *
	 * @param Integer[] $nums
	 * @return array []
	 */
	public function solve($nums, $target): array {
		$foundKeys = [];

		$len = count($nums);

		for ($i = 0; $i < $len; $i++) {
			$num1 = $nums[$i];

			for ($j = 0; $j < $len; $j++) {
				$num2 = $nums[$j];
				if ($i === $j) {
					continue;
				}

				$sum = $num1 + $num2;
				if ($sum === $target) {
					$foundKeys = [$i, $j];
					break 2;
				}
			}
		}

		return $foundKeys;
	}
}

/*$test = new TwoSum();
//$res = $test->solve([-1, 0, 1, 2, -1, -4]);
$res = $test->solve([2,7,11,15], 9);
print_r( $res );*/