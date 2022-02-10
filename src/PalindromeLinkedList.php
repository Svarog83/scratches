<?php

namespace SV;

/**
 * First I had a right idea: find the middle(I can do it already) and then somehow check the halves. But it's more
 * complicates as I cannot reverse the linked lists yet.
 *
 * Solution:
 * Find the end of the first half.
 * Reverse the second half.
 * Determine whether or not there is a palindrome.
 * Restore the list.
 * Return the result.
 *
 * Given the head of a singly linked list, return true if it is a palindrome.
 */
class PalindromeLinkedList {

	/**
	 * @param ListNode|null $head
	 * @return ListNode|null
	 */
	private function reverseList( ?ListNode $head ): ?ListNode {

		$prev = NULL;
		$curr = $head;
		while ( $curr ) {
			$nextTemp   = $curr->next;
			$curr->next = $prev;
			$prev       = $curr;
			$curr       = $nextTemp;
		}

		return $prev;
	}

	/**
	 * @param ListNode $head
	 * @return ListNode
	 */
	private function endOfFirstHalf( ListNode $head ): ListNode {
		$fast = $head;
		$slow = $head;
		while ( $fast && $fast->next !== NULL && $fast->next->next !== NULL ) {
			$fast = $fast->next->next;
			$slow = $slow->next;
		}

		return $slow;
	}

	/**
	 * Optimal-optimal version
	 *
	 * @param ListNode $head
	 * @return bool
	 */
	public function solve( ListNode $head ): bool {
		$isPalindrome = TRUE;
		if ( !$head ) {
			return $isPalindrome;
		}

		// Find the end of first half and reverse second half.
		$firstHalfEnd    = $this->endOfFirstHalf( $head );
		$secondHalfStart = $this->reverseList( $firstHalfEnd->next );
		// Check whether or not there is a palindrome.
		$p1 = $head;
		$p2 = $secondHalfStart;

		while ( $isPalindrome && $p2 !== NULL ) {
			if ( $p1->val !== $p2->val ) {
				$isPalindrome = FALSE;
			}
			$p1 = $p1->next;
			$p2 = $p2->next;
		}

		// Restore the list and return the result.
		$firstHalfEnd->next = $this->reverseList( $secondHalfStart );

		return $isPalindrome;
	}
}