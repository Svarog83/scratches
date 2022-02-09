<?php

namespace SV;
/**
 * Смысл решения: сохраняем суммы "общим итогом". И при возврате данных нужно "отбросить" предыдущую сумму.
 * Например, запросили 2,3. Значит, от общей суммы (хранится по индексу right+1) нужно вычесть все предыдущие суммы (хранится в left)
 * Пример:
 * [3, 4, 5, 6]
 * memo: [0, 3, 7, 12, 18]
 * left: 2, right: 3 = memo[3+1] = 18, memo [2] = 7, return = 18-7 = 11
 *
 * Given an integer array nums, handle multiple queries of the following type:
 *
 * Calculate the sum of the elements of nums between indices left and right inclusive where left <= right.
 * Implement the NumArray class:
 *
 * NumArray(int[] nums) Initializes the object with the integer array nums.
 * int sumRange(int left, int right) Returns the sum of the elements of nums between indices left and right inclusive
 * (i.e. nums[left] + nums[left + 1] + ... + nums[right]).
 *
 */
class RangeSumQueryImmutable {

	protected array $nums;
	protected array $memo;

	public function __construct( array $nums) {
		$this->nums = $nums;
		$i = 0;
		$this->memo[$i++] = 0;
		$sum = 0;
		foreach ($nums AS $num) {
			$sum += $num;
			$this->memo[$i++] = $sum;
		}
	}

	/**
	 * @param Integer $left
	 * @param Integer $right
	 * @return Integer
	 */
	public function solve($left, $right): int {
		return $this->memo[$right+1] - $this->memo[$left];
	}
}
