import os
import glob
from tqdm import tqdm
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from scipy.io import wavfile
from python_speech_features import mfcc , logfbank
import librosa as lr
import os, glob, pickle
import librosa
from scipy import signal
import noisereduce as nr
from glob import glob
import librosa
import soundfile
from tensorflow.keras.layers import Conv2D,MaxPool2D, Flatten, LSTM
from keras.layers import Dropout,Dense,TimeDistributed
from keras.models import Sequential
# from keras.utils import to_categorical
from sklearn.utils.class_weight import compute_class_weight
from sklearn.model_selection import train_test_split
from sklearn.neural_network import MLPClassifier
from sklearn.metrics import accuracy_score
import random
from model import *
from features import *


#Feature Extraction of Audio Files Function
#Extract features (mfcc, chroma, mel) from a sound file
def extract_feature(file_name, mfcc, chroma, mel):
    with soundfile.SoundFile(file_name) as sound_file:
        X = sound_file.read(dtype="float32")
        sample_rate=sound_file.samplerate
        if chroma:
            stft=np.abs(librosa.stft(X))
        result=np.array([])
        if mfcc:
            mfccs=np.mean(librosa.feature.mfcc(y=X, sr=sample_rate, n_mfcc=40).T, axis=0)
        result=np.hstack((result, mfccs))
        if chroma:
            chroma=np.mean(librosa.feature.chroma_stft(S=stft, sr=sample_rate).T,axis=0)
        result=np.hstack((result, chroma))
        if mel:
            mel=np.mean(librosa.feature.melspectrogram(X, sr=sample_rate).T,axis=0)
        result=np.hstack((result, mel))
        # print(result)
    return result


Pkl_Filename = "https://recommendsong.herokuapp.com/public/Emotion_Voice_Detection_Model.pkl"

with open(Pkl_Filename, 'rb') as file:
    Emotion_Voice_Detection_Model = pickle.load(file)


## Appying extract_feature function on random file and then loading model to predict the result
file = 'https://recommendsong.herokuapp.com/public/Audio_input/img.wav'
# data , sr = librosa.load(file)
# data = np.array(data)
ans =[]
new_feature  = extract_feature(file, mfcc=True, chroma=True, mel=True)
ans.append(new_feature)
ans = np.array(ans)
# data.shape

emotion = Emotion_Voice_Detection_Model.predict(ans)

print(emotion)


songDF = pd.read_csv("https://recommendsong.herokuapp.com/public/data1/allsong_data.csv")
complete_feature_set = pd.read_csv("https://recommendsong.herokuapp.com/public/data1/complete_feature.csv")

URL = ""


if emotion == "happy":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DWSf2RDTDayIx?si=3d31ebaa9c204623"

elif emotion == "sad":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DX7qK8ma5wgG1"

elif emotion == "anger":
    URL = "https://open.spotify.com/playlist/0KPEhXA3O9jHFtpd1Ix5OB"

elif emotion == "neutral":
    URL = "https://open.spotify.com/playlist/37i9dQZF1DXbpmT3HUTsZm"

elif emotion == "fearful":
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

print(my_songs)



f  = open("https://recommendsong.herokuapp.com/public/Audio_input/output.txt", "w+")

for i in range(0,5):
    x = random.randint(0,number_of_recs-1)
    f.write(str(my_songs[x][0]) + '~' + str(my_songs[x][1]) + '\n')
f.close()

