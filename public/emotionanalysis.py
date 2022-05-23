from nrclex import NRCLex
import sys
import numpy as np
import pandas as pd
import json
import random
from model import *
from features import *
# Assign emotion

text = sys.argv[1]
# text = "I am not happy"

# Create object
emotion = NRCLex(text)

# Using methods to classify emotion
#print('\n', emotion.words)
#print('\n', emotion.affect_dict)
#print('\n', emotion.affect_frequencies)

l=[]
l=emotion.affect_frequencies
json_string = json.dumps(l)
print(json_string)


songDF = pd.read_csv("C:\\xampp\\htdocs\\speech_analysis\\public\\data1\\allsong_data.csv")
complete_feature_set = pd.read_csv("C:\\xampp\\htdocs\\speech_analysis\\public\\data1\\complete_feature.csv")

emotions=list(l)
emotion = emotions[0]
URL = ""


if emotion == "joy":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DX0b1hHYQtJjp"

elif emotion == "trust":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DWSf2RDTDayIx?si=3d31ebaa9c204623"

elif emotion == "sadness":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DX7qK8ma5wgG1"

elif emotion == "anger":
    URL = "https://open.spotify.com/playlist/0KPEhXA3O9jHFtpd1Ix5OB"

elif emotion == "neutral":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DXbpmT3HUTsZm"

elif emotion == "fear":
    URL = "https://open.spotify.com/playlist/7rzS9iLiqjy65AsZd9qinf"

elif emotion == "disgust":
    URL = "https://open.spotify.com/playlist/3qgzMg4m5tvf16PzlPgGa9"

elif emotion == "surprise":
    URL = "https://open.spotify.com/playlist/4zqgaSPH6orc9wEX3sEzqh"


#using the extract function to get a features dataframe
df = extract(URL)
#retrieve the results and get as many recommendations as the user requested
edm_top40 = recommend_from_playlist(songDF, complete_feature_set, df)
number_of_recs = 40
my_songs = []
for i in range(number_of_recs):
    my_songs.append([str(edm_top40.iloc[i,1]) + ' - '+ '"'+str(edm_top40.iloc[i,4])+'"', "https://open.spotify.com/track/"+ str(edm_top40.iloc[i,-6]).split("/")[-1]])

# print(my_songs)



f  = open("C:\\xampp\\htdocs\\speech_analysis\\public\\Audio_input\\output.txt", "w+")

for i in range(0,5):
    x = random.randint(0,number_of_recs-1)
    f.write(str(my_songs[x][0]) + '~' + str(my_songs[x][1]) + '\n')
f.close()



