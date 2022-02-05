<?php 

function get_include_and_exclude_arguments($argv) {
    $is_include = true;
    $include_args = [];
    $exclude_args = [];

    foreach ($argv as $i => $arg) {
        if ($arg == "--exclude" || $arg == "-e") {
            $is_include = false;
        }

        if ($is_include) {
            array_push($include_args, $arg);
        } else {
            array_push($exclude_args, $arg);
        }
    }

    return array($include_args, $exclude_args);
}

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
    if (count($results) == 0) {
        print("There were no matches\n");
        return;
    }

    printf("%d word(s) found! Here are the possible words: \n", count($results));
    foreach ($results as $key => $word) {
        print($key." => ".$word);
    }
}

function word_contains_arg($word, $arg) {
    return (strpos($word, $arg) !== false);
}

// $conditions looks like ..p.e
// similar syntax to unix's grep position based query
function word_matches_position_query($word, $conditions) {
    $word_arr = str_split($word);
    foreach ($conditions as $letter_index => $letter) {
        if ($letter == ".") {
        	continue;
        }

        if ($word_arr[$letter_index] !== $letter) {
        	return false;
        }
    }

    return true;
}

?>