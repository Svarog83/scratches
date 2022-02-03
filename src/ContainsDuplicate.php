<?php
namespace SV;
/**
 * Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.
 */

class ContainsDuplicate {

	/**
	 * Mine version.
	 *
	 * @param Integer[] $nums
	 * @return int|null
	 */
	public function solve( array $nums): ?int {

		$dup = false;

		$duplicates = [];
		foreach ($nums AS $num) {
			if (array_key_exists($num, $duplicates)) {
				$dup = true;
				break;
			}

			$duplicates[$num] = true;
		}



		return $dup;
	}
}
