<!DOCTYPE html>
<html>
    <head>

        <!-- CSS only -->
        <link href="{{ URL::asset('css/Ani.css') }}" rel="stylesheet" type="text/css" >

        <title>Sentiment analysis</title>
    </head>
    <body>
        <img class="kk" src="np.png" id="img1"height="50" width="60" alt="Sentiment analysis">

        <h2> WELCOME TO RESEARCH INTERNSHIP</h2>

        <div class="main">

        <div class="container">

            <div class="tags footer-tags" style="max-width: 500px; margin: 0 auto;">
                <div class="tag">
                    <div class="tag-text">
                        <h3>
                            <span class="tag-icon">
                                <i class="fa fa-home"></i>
                            </span>
                            <span class="tag-text-inner">
                                Result
                            </span>
                        </h3>
                    </div>
                <h3 class="button">Tags:</h3>
                <h3 class="button topic">{{ucwords($topic)}}</>
                <h3 class="button sentiment">{{ucwords($sentiment)}}</>
                <h3 class="button sarcasm">{{ucwords($sarcasm)}}</>
            </div>
                <p>{{$summary}}</p>

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
