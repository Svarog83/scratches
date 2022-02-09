<?php

namespace SV;
/**
 * Need to use Bottom-Up Dynamic Programming approach
 *
 * You are climbing a staircase. It takes n steps to reach the top.
 *
 * Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
 */
class ClimbingStairs {
	/**
	 * My version. Did not write it.
	 *
	 * @param int $n
	 * @return int
	 */

	public function solve( int $n ): int {
		// base cases
		if ( $n <= 0 ) {
			return 0;
		}
		if ( $n == 1 ) {
			return 1;
		}
		if ( $n == 2 ) {
			return 2;
		}

		$one_step_before  = 2;
		$two_steps_before = 1;
		$all_ways         = 0;

		for ( $i = 2; $i < $n; $i++ ) {
			$all_ways         = $one_step_before + $two_steps_before;
			$two_steps_before = $one_step_before;
			$one_step_before  = $all_ways;
		}

		return $all_ways;
	}
}
