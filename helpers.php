<?php 

function has_query_per_position($argv) {
	if (strpos($argv[1], ".") !== false) {
		if (strlen($argv[1]) != 5) {
	    	printf("Invalid query argument. Words should be 5 letters, not %d\n", strlen($argv[1]));
	    	exit();
    	} else {
    		return true;
    	}
	}

	return false;
}

function is_word_five_letters($word) {
    return (strlen($word) != 6);
}

function print_results($results) {
    print("Here are the possible words: \n");
    foreach ($results as $key => $word) {
        print($key." => ");
        print($word);
    }
}

function word_contains_arg($word, $arg) {
    return (strpos($word, $arg) !== false);
}

// $conditions looks like ..p.e
// Similar syntax to unix's grep position based query
function word_matches_position_query($word, $conditions) {
    foreach ($conditions as $letter_index => $letter) {
        if ($letter == ".") {
        	continue;
        }

        if (strpos($word, $letter) !== $letter_index) {
        	return false;
        }
    }

    return true;
}

?>