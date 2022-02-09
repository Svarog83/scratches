<?php

namespace SV;
/**
 * We need to use dynamic programming
 * 0 - 0000
 * 1 - 0001
 * 2 - 0010
 * 3 - 0011
 * 4 - 0100 - after this element number of 1's is: 1 + offset
 * 5 - 0101 -  1 + 001
 * 6 - 0110 - 1 + 010
 * 7 - 0111 - 1 + 011
 * 8 - 0100
 *
 * Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n), ans[i] is the number of
 * 1's in the binary representation of i.
 */
class CountingBits {
	/**
	 * Optimal version
	 *
	 * @param int $n
	 * @return array
	 */

	public function solve( int $n ): array {
		$dp = [ 0 => 0 ];

		$offset = 1;
		for ( $i = 1; $i <= $n; $i++ ) {
			if ( $offset * 2 === $i ) {
				$offset = $i;
			}

			$dp[ $i ] = 1 + $dp[ $i - $offset ];
		}

		return $dp;
	}

	/**
	 * My version
	 *
	 * @param int $n
	 * @return array
	 */

	public function solve2( int $n ): array {
		//len: n+1
		//2: bin: 010
		//ans[0] = 0; ans[1] = 1; ans[2] = 0
		$ans = [];
		for ( $i = 0; $i <= $n; $i++ ) {
			$binNumber = str_replace( '0', '', decbin( $i ) );
			$countOnes = strlen( $binNumber );
			$ans[ $i ] = $countOnes;
		}

		return $ans;
	}
}
