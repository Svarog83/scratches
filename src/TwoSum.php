<?php /** @noinspection ForgottenDebugOutputInspection */

namespace SV;

/**
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to
 * target.
 *
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 *
 * You can return the answer in any order.
 *
 * Learn a good solution here: https://www.code-recipe.com/post/two-sum
 */
class TwoSum {

	/**
	 * New version. Must be much faster
	 * @param $nums
	 * @param $target
	 * @return array
	 */
	public function solve($nums, $target): array {
		$keysMap = [];

		foreach ($nums as $index => $num) {
			$reqNumber = $target - $num;
			if (array_key_exists($reqNumber, $keysMap)) {
				return [$keysMap[$reqNumber], $index];
			}

			$keysMap[$num] = $index;
		}

		return [];
	}
}

/*$test = new TwoSum();
//$res = $test->solve([-1, 0, 1, 2, -1, -4]);
$res = $test->solve([2,7,11,15], 9);
print_r( $res );*/