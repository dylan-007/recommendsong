<!DOCTYPE html>
<html>
    <head>

        <!-- CSS only -->
        <link href="{{ URL::asset('css/Ani.css') }}" rel="stylesheet" type="text/css" >
        <style>
            .speech {
              width: 300px;
              padding: 0;
              margin: 0 auto;

            }
            .speech input {
              border: 0;
              width: 240px;
              display: inline-block;
              height: 30px;
            }
            .speech img {
            float: right;
            width: 20px;
            height: 30px;
        }
            }
          </style>

        <title>Sentiment analysis</title>
    </head>
    <body>
        <img class="kk" src="np.png" id="img1"height="50" width="60" alt="Sentiment analysis">

        <h2> WELCOME TO RESEARCH INTERNSHIP</h2>
        <div class="main">
        <div class="container">

                <h1>Speech Processing</h1><br>
                <hr id="hr">
                <!-- Search Form -->
                <br>
                <form id="labnol" method="POST" action="result">
                    @csrf
                <div class="speech">
                    <input type="text" name="inp" id="transcript" placeholder="Speak" />
                    <img onclick="startDictation()" src="microphone.png"/>
                </div><br>
                <p class="text-center">(click on the mic to start recording)</p>
                </form>



        </div>

    </div>
    <div class="footer">
        <p>abcd@gmail.com</p>
        <p> Phone no:- 12345678</p>
        <p class="cp-text">
            © Copyright 2022 Research internship SPIT. <br>All rights reserved.
        </p>
      </div>
    </body>

</html>

  <script>
    function startDictation() {
      if (window.hasOwnProperty('webkitSpeechRecognition')) {
        var recognition = new webkitSpeechRecognition();

        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.lang = 'en-US';
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
  </script>
