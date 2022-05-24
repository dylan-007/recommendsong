<!DOCTYPE html>
<html>
    <head>

        <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/sp_out.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">

        <title>Sentiment analysis</title>
    </head>
    <body >


        <div class="main">
        <div class="container">

                <h2>Output</h2>
                <hr id="hr">

                <div class='res1'>
                    @if(strlen($result)>0)
                    <h3>{{$result}}</h3>


                    <h2>Songs picked based on your emotion:</h2>

                    <div >

                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6MsFm3v7Vzew4zRTgnIn6I?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/5npWL5tfuLH1Oye7K0gLMK?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[2]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[3]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[4]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>


                    </div>

                    @endif
                    </div>


                    <div class="res2">
                    @if(count($result7)>0)
                    @foreach ($result7 as $k => $value)
                        <div class="grid-item">{{$k}}=>{{$value}}%</div>
                    @endforeach

                    <h2>Songs picked based on your emotion :</h2>

                    <div >

                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/3HDI4IbXISO10HhQSDM1vF?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/6MsFm3v7Vzew4zRTgnIn6I?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[2]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[3]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/{{$links[4]}}?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                        <br>


                    </div>

                    @endif

                    </div>


                {{-- @if($message = Session::get('message'))
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h3>Analyzed Emotion</h3>

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

    </body>

</html>
