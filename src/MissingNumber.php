<?php

namespace SV;
/**
 * Given an array nums containing n distinct numbers in the range [0, n], return the only number in the range that is
 * missing from the array.
 */
class MissingNumber {

	/**
	 * Optimal version
	 *
	 * The basic idea is to use XOR operation. We all know that a^b^b =a, which means two xor operations with the same
	 * number will eliminate the number and reveal the original number. In this solution, I apply XOR operation to both
	 * the index and value of the array. In a complete array with no missing numbers, the index and value should be
	 * perfectly corresponding( nums[index] = index), so in a missing array, what left finally is the missing number.
	 *
	 * @param Integer[] $nums
	 * @return int|null
	 */

	public function solve( array $nums ): ?int {

		$len = count( $nums );
		$res = $len;

		for ( $i = 0; $i < $len; $i++ ) {
			$res = $res ^ $i ^ $nums[ $i ];
		}

		return $res;
	}

	/*public function solve( array $nums): ?int {
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

		return $missingNumber;
	}*/
}

/*$test = new MissingNumber();
//$res = $test->solve([ 9, 6, 4, 2, 3, 5, 7, 0, 1 ]);
$res = $test->solve([ 1 ]);
echo "\n" . '<br>' . $res . ' - res<br>' . "\n";*/
