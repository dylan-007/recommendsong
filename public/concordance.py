#!/usr/bin/env python
import sys
import nltk
import json
import sys


text = sys.argv[1]
word = sys.argv[2]

tokens = nltk.word_tokenize(text)
text1 = nltk.Text(tokens)
list = text1.concordance_list(word)

ans = []
for i in list:
    ans.append(i.line)

res = json.dumps(ans)

print(res)




