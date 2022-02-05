# Wordle Cheater

## Quick Start
```bash
php main.php th... o s --exclude w v u 
```

## Examples
1. `query`: a full word is represented by dots and/or letters. Dot means unknown. Example: `e..t.`
2. `letters`: each invidual letter to find in the word. Not position based. Example: `e b`
3. `--exclude or -e`: individual letters that should not be in the word. Needs to be passed at the end of the command. Example: `--exclude w k o s`

#### Position based query with exclusion - green, yellow, and black letters: 
```bash
php main.php [query] [letters...] [--exclude letters...]
php main.php t.o.. s h  --exclude w k q # for the word those
```

#### Common query with exclusion - yellow and black letters:
```bash
php main.php [letters...] [--exclude letters...]
php main.php th o s --exclude f g x # for the word those
```

#### Common query - yellow letters only:
```bash
php main.php [letters...]
php main.php th o s # for the word those
```