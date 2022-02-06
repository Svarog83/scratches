<?php

namespace SV;
/**
 * Given an array nums of n integers where nums[i] is in the range [1, n], return an array of all the integers in the
 * range [1, n] that do not appear in nums.
 */
class AllMissingNumbers {


	/**
	 * Optimal version(?)
	 * We can iterate over nums and for each element, we know it can be mapped to index nums[i]-1. We can therefore
	 * mark the element nums[i] as present in nums by making the element at index nums[i]-1 negative. Thus after
	 * iterating the array, we have:
	 * nums[i] < 0 or nums[i] is negative only if the element i+1 is present in the array.
	 *
	 * nums = [4,3,2,7,8,2,3,1]
	 * 1. '4' is present in nums. Mark as present by negating nums[4-1] = nums[3].  Thus, nums[3] = -7
	 * => nums = [4,3,2,-7,8,2,3,1]
	 *
	 * 2. '3' is present in nums. Mark as present by negating nums[3-1] = nums[2].  Thus, nums[2] = -2
	 * => nums = [4,3,-2,-7,8,2,3,1]
	 * ...
	 * 7. '1' is present in nums. Thus, nums[0] = -4
	 * => nums = [-4,-3,-2,-7,8,2,-3,-1]
	 * Now, the only elements nums[i] which are positive are those where 'i+1' is not found in nums
	 * These are => nums[4] and nums[5].
	 * That means 5 and 6 an not present in the initial nums array
	 * @param Integer[] $nums
	 * @return array
	 */

	public function solve( array $nums ): array {
		$missingNumbers = [];
		$len            = count( $nums );
		foreach ( $nums as $num ) {
			$prevPosition          = abs( $num ) - 1;
			$nums[ $prevPosition ] = -abs( $nums[ $prevPosition ] );
		}

		for ( $i = 0; $i < $len; $i++ ) {
			if ( $nums[ $i ] > 0 ) {
				$missingNumbers[] = $i + 1;
			}
		}

		return $missingNumbers;
	}

	/**
	 * My version
	 * Runtime: 120 ms, faster than 91.30% of PHP online submissions for Find All Numbers Disappeared in an Array.
	 *
	 * @param Integer[] $nums
	 * @return array
	 */

	public function solve2( array $nums ): array {
		$missingNumbers = [];
		$n              = count( $nums );
		$nums           = array_flip( $nums );
		for ( $i = 1; $i <= $n; $i++ ) {
			if ( !isset( $nums[ $i ] ) ) {
				$missingNumbers[] = $i;
			}
		}

		return $missingNumbers;
	}
}

/*$test = new MissingNumber();
//$res = $test->solve([ 9, 6, 4, 2, 3, 5, 7, 0, 1 ]);
$res = $test->solve([ 1 ]);
echo "\n" . '<br>' . $res . ' - res<br>' . "\n";*/
