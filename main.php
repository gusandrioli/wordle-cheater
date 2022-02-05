<?php 

require __DIR__ . '/helpers.php';
$results = [];
$file = fopen("words.txt", "r");

list($include_args, $exclude_args) = get_include_and_exclude_arguments($argv);

if (has_query_per_position($argv)) {
    $has_query_per_position = true;
}

if ($file) {
    while (($word = fgets($file)) !== false) {
        $word_valid = true;

        if (is_word_five_letters($word)) {
            continue;
        }

        if (
            $has_query_per_position &&
            !word_matches_position_query($word, str_split($argv[1]))
        ) {
            continue;
        }

        foreach ($include_args as $index => $arg) {
            if ($index === 0 || ($index === 1 && $has_query_per_position)) {
                continue;
            }

            if (!word_contains_arg($word, $arg)) {
                $word_valid = false;
            }
        }   

        foreach ($exclude_args as $index => $arg) {
            if (word_contains_arg($word, $arg)) {
                $word_valid = false;
            }
        }

        if ($word_valid) {
            array_push($results, $word);
        }
    }

    fclose($file);
} else {
    print("Could not open file");
    exit();
} 

print_results($results);

?>