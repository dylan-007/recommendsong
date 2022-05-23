<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="main_form">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="titlepage">
                            <h3> Given Input</h3>
                            {{-- <p>{{$input}}</p> --}}
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="titlepage">
                            <h3> Sentiment Analysis</h3>
                            <p> Analyzed Sentiment:-</p>
                            {{-- @foreach ($result2 as $key => $value)
                            <p>{{ucwords($key)}} :- {{ucwords($value)}}</p>
                            @endforeach --}}
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="titlepage">
                            <h3>Analyzed Emotion</h3>
                            {{-- @foreach ($result7 as $k => $value)
                                <div class="grid-item">{{$k}}=>{{$value}}%</div>
                            @endforeach --}}
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="titlepage">
                            <h3>Tip accrding to your Emotion</h3>
                            {{-- <p>{{ucwords($positive_sentence)}}</p> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>
