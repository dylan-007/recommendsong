import sys,json
from textblob import TextBlob

data = TextBlob(sys.argv[1])

data = data.correct()

print(data)


