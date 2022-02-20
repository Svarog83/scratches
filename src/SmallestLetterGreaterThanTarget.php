<?php

namespace SV;

/**
 * Given a characters array letters that is sorted in non-decreasing order and a character target, return the smallest
 * character in the array that is larger than target.
 *
 * Note that the letters wrap around.
 *
 * For example, if target == 'z' and letters == ['a', 'b'], the answer is 'a'.
 */
class SmallestLetterGreaterThanTarget {

	/**
	 * Optimal version
	 *
	 * @param string[] $letters
	 * @param string   $target
	 * @return string
	 */
	public function solve( array $letters, string $target ): string {
		$lo = 0;
		$hi = count( $letters );
		while ( $lo < $hi ) {
			$middle = $lo + ( $hi - $lo ) / 2;
			if ( $letters[ $middle ] <= $target ) {
				$lo = $middle + 1;
			} else {
				$hi = $middle;
			}
		}

		return $letters[$lo % count($letters)];
	}

	/**
	 * My version - not working
	 *
	 * @param string[] $letters
	 * @param string   $target
	 * @return string
	 */
	public function solve2( array $letters, string $target ): string {
		$lo           = 0;
		$countLetters = count( $letters );
		$hi           = $countLetters;
		$foundIndex   = NULL;
		while ( $lo < $hi ) {
			$middle = $lo + floor( ( $hi - $lo + 1 ) / 2 );
			if ( $middle >= $countLetters ) {
				break;
			}
			$middleValue = $letters[ $middle ];
			if ( $target > $middleValue ) {
				$lo = $middle;
			} else {
				//character in the array that is larger than target
				$foundIndex = $middle;
				$hi         = $middle - 1;
			}
		}

		return $foundIndex === NULL ? $letters[ $lo ] ?? $letters[0] : $letters[ $foundIndex ];
	}
}