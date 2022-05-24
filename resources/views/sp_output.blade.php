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
                    <audio controls>
                        <source src="Audio_input/img.wav" type="audio/wav">
                    </audio>


                    <h2>Songs picked based on your emotion :</h2>

                    <div >
                        <?php

                            $handle = fopen("Audio_input/output.txt", "r");
                            if ($handle) {
                                while (($line = fgets($handle)) !== false) {
                                    // process the line read.

                                    //string + '~' + string

                                    $link = explode('~', $line);


                                    //https://open.spotify.com/track/7zQRF2pG5pty9sck6L6hF4

                                    //https://open.spotify.com/embed/playlist/37i9dQZF1DX1s9knjP51Oa?utm_source=generator

                                    $Url = $link[1];

                                    $trackId = explode('track/', $Url);

                                    $track = $trackId[1];


                                    $str = '<iframe style="border-radius:12px" src= "https://open.spotify.com/embed/playlist/' .  $track . '?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"> </iframe>';


                                    echo $str;
                                    echo "<a href='$link[1]' target='_blank'>$link[0]</a>";
                                    echo "<br>";
                                    echo "<br>";

                                }

                                fclose($handle);
                            } else {
                                // error opening the file.
                            }

                        ?>

                    </div>
                    @endif
                    </div>



                    <div class="res2">
                    @if(count($result7)>0)
                    @foreach ($result7 as $k => $value)
                        <div class="grid-item">{{$k}}=>{{$value}}%</div>
                    @endforeach

                    <h2>Songs picked based on your emotion :</h2>
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX1s9knjP51Oa?utm_source=generator" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
                    <div >
                        <?php

                            $handle = fopen("Audio_input/output.txt", "r");
                            if ($handle) {
                                while (($line = fgets($handle)) !== false) {
                                    // process the line read.

                                    //string + '~' + string

                                    $link = explode('~', $line);
                                    echo "<a href='$link[1]' target='_blank'>$link[0]</a>";
                                    echo "<br>";
                                    echo "<br>";
                                }

                                fclose($handle);
                            } else {
                                // error opening the file.
                            }
                        ?>

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
