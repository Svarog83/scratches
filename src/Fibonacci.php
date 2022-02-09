<?php

namespace SV;
/**
 * The Fibonacci numbers, commonly denoted F(n) form a sequence, called the Fibonacci sequence, such that each number
 * is the sum of the two preceding ones, starting from 0 and 1. That is,
 */
class Fibonacci {
	/**
	 * My version
	 *
	 * @param int $n
	 * @return int
	 */

	public function fib3( int $n ): int {
		$fibonacciNumber = 0;
		if ( $n === 0 ) {
			return 0;
		}

		if ( $n === 1 ) {
			return 1;
		}

		if ( $n >= 2 ) {
			$fibonacciNumber = $this->fib( $n - 2 ) + $this->fib( $n - 1 );
		}

		return $fibonacciNumber;
	}

	/**
	 * Faster version
	 *
	 * @param int $n
	 * @return int
	 */
	public function fib( int $n ): int {
		$firstNumber = 0;
		$secondNumber = 1;

		if ( $n === 0 ) {
			return 0;
		}

		if ( $n === 1 ) {
			return 1;
		}
		$fibonacciNumber = 0;
		if ( $n >= 2 ) {
			for ($i = 2; $i <= $n; $i++) {
				$fibonacciNumber = $firstNumber + $secondNumber;
				$firstNumber = $secondNumber;
				$secondNumber = $fibonacciNumber;
			}
		}

		return $fibonacciNumber;
	}
}
