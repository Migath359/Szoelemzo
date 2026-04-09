import sys
import json
from collections import Counter

# Ellenőrzés
if len(sys.argv) < 2:
    print(json.dumps({"error": "Nincs bemeneti szöveg"}))
    sys.exit()

text = sys.argv[1]

words = text.split()
word_count = len(words)
char_count = len(text)

counter = Counter(words)
most_common = counter.most_common(1)
most_common_word = most_common[0][0] if most_common else ""

result = {
    "words": word_count,
    "characters": char_count,
    "most_common": most_common_word
}

print(json.dumps(result))