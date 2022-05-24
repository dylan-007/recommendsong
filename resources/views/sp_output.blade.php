<!DOCTYPE html>
<html>
    <head>

        <!-- CSS only -->
        <link href="css/sp_out.css" rel="stylesheet" type="text/css" >

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
