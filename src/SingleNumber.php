<?php
/**
 * Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.
 *
 * You must implement a solution with a linear runtime complexity and use only constant extra space.
 */

class SingleNumber {

	/**
	 * Mine version. Not very optimal
	 *
	 * @param Integer[] $nums
	 * @return int|null
	 */
	public function singleNumberRes2($nums): ?int {

		$alreadySeen = [];
		foreach ($nums as $iValue) {
			$currentNum = $iValue;

			if (!array_key_exists($currentNum, $alreadySeen)) {
				$alreadySeen[$currentNum] = true;
			} else {
				unset($alreadySeen[$currentNum]);
			}
		}

		return current(array_keys($alreadySeen));
	}

	/**
	 * Вот это решение намного лучше. Его смысл в том, что из-за XOR пары "погасят" друг друга. Останется только единственное число
	 *
	 * $x = 4; //100
	$y = 3; //011

	$z = $x ^ $y; //111
	var_dump($z); //7

	$z ^= 4; //011

	var_dump($z); //3
	 *
	 * @param $nums
	 * @return int|mixed
	 */
	public function singleNumberRes($nums): mixed {
		$res = 0;
		foreach ($nums as $num) {
			$res ^= $num;
		}

		return $res;
	}
}
