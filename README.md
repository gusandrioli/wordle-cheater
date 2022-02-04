# Wordle Cheater

Currently, this only supports green and yellow letters, not black ones (can't exclude letters yet).

## Quick Start
```bash
php main.php th o se
```

## Examples

#### Position based query - green and yellow letters: 
1. `query`: a full word is represented by dots and/or letters. Dot means unknown. Example: `e..t.`
2. `letters`: each invidual letter to find in the word. Not position based. Example: `e b`

```bash
php main.php [query] [letters...]
php main.php t.o.. s h # for the word those
```

#### Common query - yellow letters only:
```bash
php main.php [letters...]
php main.php th o se # for the word those
```