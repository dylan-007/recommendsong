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

                <h1>Text Classification</h1>
                <hr id="hr">
                <form action="result1" method="POST" class="form">
                    @csrf
                    <textarea class="form-control" name="inp" placeholder="Enter your text" rows="10"></textarea><hr id="hr">
                    <input type="submit" class="btn " name="submit" id="submit"><hr id="hr">
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
