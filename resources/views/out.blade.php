<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ URL::asset('css/fin.css') }}" rel="stylesheet" type="text/css" >
<title>RESULT</title>

</head>
<body>
    <img class="kk" src="np.png" id="img1"height="50" width="60" alt="Sentiment analysis">

    <h5> WELCOME TO RESEARCH INTERNSHIP</h5>
    <h1>Results</h1>

    <div class="container">
        <div class="column">
         <h2> Topic Analysis Using Text</h2>
         <p>Analyzed Topic :-</p>
         <p>{{$result1}}</p>
        </div>
        <div class="column">
         <h3> Sentiment Analysis Using Text</h3>
         <p> Analyzed Sentiment:-</p>
         @foreach ($result2 as $key => $value)
        <p>{{$key}} :- {{$value}}</p>
        @endforeach
        </div>
        <div class="column">
        <h4> Keyword Extraction Using Text</h4>
         <p>Extracted Keywords</p>
         @foreach ($result4 as $key)
        <label id="words1">{{$key.", "}}</label>
        @endforeach
        </div>
     </div>

     <div class="container">
        <div class="column1">
            <h2>Word Clustring Using Text </h2>
            <p> Clustered Word:-</p>
           </div>
         <div class="column1">
          <h3> Text Classification Using Intent Detection</h3>
          <p> Classified Text:-</p>
          <p>{{$result5}}</p>
         </div>
      </div>

     <div class="container">
        <div class="column">
            <h2> Word Frequency Using Text</h2>
            <p>frequency is :- </p>
            <p>{{$result3}}</p>
           </div>
         <div class="column">
          <h3> Sarcasm Detection and Spell Correction(Collocation)</h3>
          <p>{{$result6}} </p>
          <p>({{$result7}}) </p>
         </div>
         <div class="column">
         <h4> Concordance Using Text</h4>
          @foreach ($result8 as $val)
            <p>{{$val}}</p>
          @endforeach
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
