<?php

namespace SV;

/**
 * need to use two pointers: slow and fast. If they meet - the cycle exists!
 *
 * Given head, the head of a linked list, determine if the linked list has a cycle in it.
 *
 * There is a cycle in a linked list if there is some node in the list that can be reached again by continuously
 * following the next pointer. Internally, pos is used to denote the index of the node that tail's next pointer is
 * connected to. Note that pos is not passed as a parameter.
 *
 * Return true if there is a cycle in the linked list. Otherwise, return false.
 */
class LinkedListCycle {

	/**
	 * Optimal-optimal version
	 *
	 * @param ListNode $head
	 * @return Boolean
	 */
	public function solve3( ListNode $head ) {
		$hasCycle = FALSE;
		$fastItem = $head;
		$slowItem = $head;

		while ( $fastItem && $fastItem->next ) {
			$slowItem = $slowItem->next;
			$fastItem = $fastItem->next->next;
			if ( $slowItem === $fastItem ) {
				$hasCycle = TRUE;
				break;
			}
		}

		return $hasCycle;
	}

	/**
	 * Optimal version - with my cycles
	 *
	 * @param ListNode $head
	 * @return Boolean
	 */
	public function solve( ListNode $head ): bool {
		$hasCycle = FALSE;
		$fastItem = $head->next;

		while ( $fastItem && $nextItem = $head->next ) {
			$fastItem = $fastItem->next;

			if ( !$fastItem || !( $fastItem = $fastItem->next ) ) {
				break;
			}
			if ( $fastItem === $nextItem ) {
				$hasCycle = TRUE;
				break;
			}

			$head = $nextItem;
		}

		return $hasCycle;
	}

	/**
	 * My first version. Hash map solution
	 *
	 * @param ListNode $head
	 * @return Boolean
	 */
	public function solve2( ListNode $head ) {
		$hasCycle  = FALSE;
		$pos       = 0;
		$seenItems = [];

		while ( $nextItem = $head->getNext() ) {
			$hash = spl_object_id( $nextItem );
			if ( isset( $seenItems[ $hash ] ) ) {
				$hasCycle = TRUE;
				break;
			}
			$seenItems[ $hash ] = TRUE;
			$head               = $nextItem;
			$pos++;
		}

		return $hasCycle;
	}
}