<?php

function removeDuplicates(&$nums) {
	$prevNumber  = NULL;
	$filledIndex = NULL;

	foreach ($nums as $index => $num) {

		if ($index === 0) {
			$prevNumber  = $num;
			$filledIndex = $index;
		} else {
			if ($prevNumber === $num) {
				continue; //already exists
			}

			$filledIndex++;
			$prevNumber           = $num;
			$nums[ $filledIndex ] = $num;
		}
	}
}

function removeDuplicates2(&$nums) {
	$count = count($nums);
	if ($count < 2) {
		return $count;
	}
	for($i = 1, $j = 0; $i < $count; $i++) {
		if ($nums[$j] == $nums[$i]) {
			unset($nums[$i]);
		}else {
			$j = $i;
		}
	}
}

//$nums = [ 1, 1, 2 ];
$nums = [ 0, 0, 1, 1, 1, 2, 2, 3, 3, 4 ];

removeDuplicates($nums);
print_r($nums);