<?php
namespace SV;
/**
 * Given an array nums containing n distinct numbers in the range [0, n], return the only number in the range that is missing from the array.
 */

class MissingNumber {

	/**
	 * Mine version.
	 *
	 * @param Integer[] $nums
	 * @return int|null
	 */
	public function solve( array $nums): ?int {
		$missingNumber = null;
		sort($nums);
		$len = count($nums);
		$maxNumber = $nums[$len - 1];
		for ($i = 0; $i <= $maxNumber; $i++) {
			$missingNumber = $i;
			if ($nums[$i] !== $i) {
				break;
			}

			if ($i === $maxNumber) {
				$missingNumber = $i+1;
			}
		}

	/*
		$len = count($nums);
		foreach ($nums AS $i => $num) {
			$missingNumber = $num + 1;
			if ($i === $len - 1) {
				break;
			}
			$nextNum = $nums[$i+1];

			if ($nextNum - $num > 1) {
				$missingNumber = $num + 1;
				break;
			}
		}*/

		return $missingNumber;
	}
}

/*$test = new MissingNumber();
//$res = $test->solve([ 9, 6, 4, 2, 3, 5, 7, 0, 1 ]);
$res = $test->solve([ 1 ]);
echo "\n" . '<br>' . $res . ' - res<br>' . "\n";*/
