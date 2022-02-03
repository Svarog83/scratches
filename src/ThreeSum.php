<?php /** @noinspection ForgottenDebugOutputInspection */

namespace SV;

/**
 * Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j !=
 * k, and nums[i] + nums[j] + nums[k] == 0. Notice that the solution set must not contain duplicate triplets.
 *
 * Learn a good solution here: https://www.code-recipe.com/post/three-sum
 */
class ThreeSum {

	/**
	 * Mine version. Too slow. It's n^3
	 *
	 * @param Integer[] $nums
	 * @return array []
	 */
	public function solve($nums): array {
		$foundTriplets = [];

		$len = count($nums);

		for ($i = 0; $i < $len; $i++) {
			$num1 = $nums[$i];

			for ($j = 0; $j < $len; $j++) {
				$num2 = $nums[$j];
				if ($i === $j) {
					continue;
				}

				for ($k = 0; $k < $len; $k++) {
					$num3 = $nums[$k];
					if ($i === $k || $j === $k) {
						continue;
					}
					$foundTriplet = [$num1, $num2, $num3];
					asort($foundTriplet);
					$key = implode('_', $foundTriplet);
					if (isset($foundTriplets[$key])) {
						continue;
					}

					$sum = $num1 + $num2 + $num3;
					if ($sum === 0) {
						$foundTriplets[$key] = $foundTriplet;
					}

				}
			}

		}


		return array_values($foundTriplets);
	}
}

$test = new ThreeSum();
//$res = $test->solve([-1, 0, 1, 2, -1, -4]);
$res = $test->solve([-15,10,0,-2,14,-1,-10,-14,10,12,6,-6,10,2,-11,-9,2,13,2,-9,-14,-12,-10,-12,13,13,-10,-3,2,-11,3,-6,6,10,7,5,-13,4,-2,12,1,-11,14,-4,6,-12,-6,-14,8,11,-8,1,7,-3,5,5,-13,10,9,-3,6,-10,6,-3,7,-9,-13,9,10,0,-1,-11,4,-10,-8,-13,-15,2,-12,8,-2,-12,-14,-10,-8,6,2,-5,-7,-11,7,14,-6,-10,-12,8,-4,-10,-5,14,-3,9,-12,8,14,-13]);
print_r( $res );
