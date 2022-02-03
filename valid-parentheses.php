<?php

/**
 * @param String $s
 * @return Boolean
 */
function isValid($s) {
	$strlen = strlen($s);

	$isValid = TRUE;
	$braces = [];
	for ($i = 0; $i < $strlen; $i++) {
		$char = $s[$i];
		if (in_array($char, ['(', '[', '{'], TRUE)) {
			$braces[] = $char;
		}
		else {
			$lastBrace = array_pop($braces);
			if ($char === ')' && $lastBrace !== '(') {
				$isValid = FALSE;
				break;
			}

			if ($char === ']' && $lastBrace !== '[') {
				$isValid = FALSE;
				break;
			}

			if ($char === '}' && $lastBrace !== '{') {
				$isValid = FALSE;
				break;
			}
		}
	}

	if ($isValid && count($braces))  {
		$isValid = FALSE;
	}

	return $isValid;
}

$string = '({[]})[';

echo isValid($string);
echo "\n" . "hello";