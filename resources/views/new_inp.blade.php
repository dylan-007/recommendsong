<!DOCTYPE html>
<html>
    <head>

        <!-- CSS only -->
        <link href="{{ URL::asset('css/speech.css') }}" rel="stylesheet" type="text/css" >

        <title>Sentiment analysis</title>
    </head>
    <body>


        <div class="main">
        <div class="container">

                <h2>Speech Sentiment Analysis</h2>
                <hr id="hr">
                <form class="main_form " id="labnol" method="POST" action="SpeechOutput">
                    @csrf
                    <input class="form-control" placeholder="Input will be appear here" type="text" name="Message" id="transcript" rows="20";><hr id="hr">
                    <label class="label" onclick="startDictation()">Start</label>
                </form>
                <br>
                {{-- @if($message = Session::get('message'))
                            <div class="col-md-12 ">
                                <div class="titlepage">
                                    <h3>Analyzed Emotion</h3>
                                    @foreach ($message as $k => $value)
                                        <div class="grid-item">{{$k}}=>{{$value}}%</div>
                                    @endforeach
                                </div>
                            </div>
                            @endif --}}
                    <br>
                    <h3 class="text-center">Or</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="main_form" action="{{ route('image.upload.post') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <h4> Upload your Audio</h4>
                                    <div class="upload">

                                        <input type="file" name="image" class="form-control1">
                                    </div>

                                    <div class="col-md-6">
                                        <button class="upload_btn" type="submit" class="btn btn-success">Upload</button>
                                    </div>

                                </div>
                            </form>

                            <br>


                            {{-- @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="text-center"> --}}
                                    {{-- <h2>Output</h2> --}}
                                    {{-- <h3>{{ $message }}</h3>

                                    <audio controls>
                                        <source src="Audio_input/img.wav" type="audio/wav">
                                    </audio>
                                </div>
                            </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                        </div>
            </div>

        </div>
    </body>

</html>

<script>
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
  </script>
