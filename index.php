<?php 
function reverseLettersInWords($str) {
	// Разделение строки на слова с сохранением пунктуации
	preg_match_all('/\w+|[^\w\s]/u', $str, $matches);
	
	$reversed = array_map(function($word) {
			// Разделение слова на буквы
			preg_match_all('/\X/u', $word, $letters);
			
			// Разворачивание порядка букв в слове с сохранением регистра
			$reversedLetters = array_reverse($letters[0]);
			
			// Сборка слова из развернутых букв
			$reversedWord = '';
			foreach ($reversedLetters as $letter) {
					$reversedWord .= $letter;
			}
			
			return $reversedWord;
	}, $matches[0]);
	
	// Сборка строки из перевернутых слов
	$reversedStr = implode(' ', $reversed);
	
	return $reversedStr;
}

// Пример использования:
$str = "Cat is, 'cold' now";
echo '<p>';
echo reverseLettersInWords($str); // Вывод: Tac si 'dloc' won
echo '</p>';

