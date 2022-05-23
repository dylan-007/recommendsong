<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ URL::asset('css/inp.css') }}" rel="stylesheet" type="text/css" >
<title>RESULT</title>

</head>
<body>
    <img class="kk" src="np.png" id="img1"height="50" width="60" alt="Sentiment analysis">

    <h5> WELCOME TO RESEARCH INTERNSHIP</h5>
    <h1> Emotion Recognition using Text and Speech</h1>

	<div class="container">
	   <div class="column">
        <h2> Sentiment Analysis Using Text</h2>
        <p>Text Processing :-</p>
        <form action="result" method="POST" class="form">
            @csrf
            <textarea class="form-control" name="inp" placeholder="Enter your text..." rows="10"></textarea><hr id="hr">
            <input type="submit" class="btn " name="submit" id="submit"><hr id="hr">
        </form>

	   </div>
	   <div class="column">
        <h3> Sentiment Analysis Using Speech</h3>
        <p> Speech Processing:-</p>
        <form action="result1" method="POST" class="form" id="labnol">
            @csrf
            <textarea class="form-control" name="inp" id="transcript" placeholder="Listening..." rows="10"></textarea><hr id="hr">
            {{-- <button class="btn " onclick="startDictation()">Start<hr id="hr"> --}}
            <div class="effect">
                <img class="mic" onclick="startDictation()" src="microphone.png"/><hr id="hr">
            </div>
        </form>
	   </div>
    </div>

    <a id="download">Download</a>
<button id="stop">Stop</button>
<script>
  const downloadLink = document.getElementById('download');
  const stopButton = document.getElementById('stop');


  const handleSuccess = function(stream) {
    const options = {mimeType: 'audio/webm'};
    const recordedChunks = [];
    <strong>const mediaRecorder = new MediaRecorder(stream, options);

    mediaRecorder.addEventListener('dataavailable', function(e) {
      if (e.data.size > 0) recordedChunks.push(e.data);
    });

    mediaRecorder.addEventListener('stop', function() {
      downloadLink.href = URL.createObjectURL(new Blob(recordedChunks));
      downloadLink.download = 'acetest.wav';
    });

    stopButton.addEventListener('click', function() {
      mediaRecorder.stop();
    });

    mediaRecorder.start();</strong>
  };

  navigator.mediaDevices.getUserMedia({ audio: true, video: false })
      .then(handleSuccess);
</script>

       <div class="footer">
        <p>abcd@gmail.com</p>
        <p> Phone no:- 12345678</p>
        <p class="cp-text">
            © Copyright 2022 Research internship SPIT. <br>All rights reserved.
        </p>
      </div>

</body>
</html>

{{-- <script>
    function startDictation() {
      if (window.hasOwnProperty('webkitSpeechRecognition')) {
        var recognition = new webkitSpeechRecognition();

        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.lang = 'en-UK';
        recognition.start();

        recognition.onresult = function (e) {
          document.getElementById('transcript').value = e.results[0][0].transcript;
          recognition.stop();
          document.getElementById('labnol').submit();
        };

        recognition.onerror = function (e) {
          recognition.stop();
        };
      }
    }
  </script> --}}
