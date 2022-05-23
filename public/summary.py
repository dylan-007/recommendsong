import sumy
import sys
from sumy.parsers.plaintext import PlaintextParser
from sumy.nlp.tokenizers import Tokenizer
from sumy.summarizers.lex_rank import LexRankSummarizer
from sumy.summarizers.lsa import LsaSummarizer

# Input text - to summarize
document1 = sys.argv[1]

parser = PlaintextParser.from_string(document1,Tokenizer("english"))


# Summarize text using gensim
# from gensim.summarization.summarizer import summarize
# gen_summary=summarize(parser.document)
# print(gen_summary)

# Using lsaSummarizer
# summarizer_lsa = LsaSummarizer()
# summary_2 =summarizer_lsa(parser.document,2)
# for sentence in summary_2:
#     print(sentence)

# Using LexRank
summarizer = LexRankSummarizer()
summary = summarizer(parser.document, 2)
for sentence in summary:
    print(sentence)
