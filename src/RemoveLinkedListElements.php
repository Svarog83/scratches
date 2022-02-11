<?php

namespace SV;

/**
 * Very strange task. Not sure that I got it right. But my solution was accepted. Do not know how to make it better.
 *
 * Given the head of a linked list and an integer val, remove all the nodes of the linked list that has Node.val ==
 * val, and return the new head.
 */
class RemoveLinkedListElements {

	/**
	 * My version
	 *
	 * Runtime: 18 ms, faster than 75.00% of PHP online submissions for Remove Linked List Elements.
	 *
	 * @param ListNode $head
	 * @param int      $val
	 * @return ListNode|null
	 */
	public function solve( ListNode $head, int $val ): ?ListNode {
		$newHead    = NULL;
		$returnHead = NULL;
		while ( $head ) {
			if ( $head->val !== $val ) {
				if ( $newHead === NULL ) {
					$newHead    = new ListNode( $head->val );
					$returnHead = $newHead;
				} else {
					$nextNode      = new ListNode( $head->val );
					$newHead->next = $nextNode;
					$newHead       = $nextNode;
				}
			}
			$head = $head->next;
		}

		return $returnHead;
	}
}