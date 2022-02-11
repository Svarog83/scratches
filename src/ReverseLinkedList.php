<?php

namespace SV;

/**
 * Need to have $prev, $current and $nextTemp! $nextTemp = $current->next; $current->next = $prev; $prev = $current; $current = $nextTemp;
 *
 * Given the head of a singly linked list, reverse the list, and return the reversed list.
 */
class ReverseLinkedList {

	/**
	 * My version (not very mine)
	 *
	 * @param ListNode $head
	 * @return ListNode
	 */
	public function solve( ListNode $head ): ListNode {
		$prev    = NULL;
		$current = $head;
		while ( $current ) {
			$nextTemp      = $current->next;
			$current->next = $prev;
			$prev          = $current;
			$current       = $nextTemp;
		}

		return $prev;
	}

	/**
	 * @param ListNode $head
	 * @return ListNode
	 */
	public function solveRecursive( ListNode $head ): ListNode {
		return $this->solveRecursiveInt( $head, NULL );
	}

	/**
	 * @param ?ListNode $head
	 * @param ?ListNode $newHead
	 * @return ListNode
	 */
	private function solveRecursiveInt( ?ListNode $head, ?ListNode $newHead ): ListNode {
		if ( !$head ) {
			return $newHead;
		}
		$next       = $head->next;
		$head->next = $newHead;

		return $this->solveRecursiveInt( $next, $head );
	}
}