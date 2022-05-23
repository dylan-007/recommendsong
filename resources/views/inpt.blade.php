<div class="container">
    <div class="row">
       <div class="col-md-12 ">
          <form class="main_form " id="labnol" method="POST" action="SpeechOutput">
              @csrf
             <div class="row">
                <div class="col-md-12">
                   <input class="textarea" placeholder="Input will be appear here" type="text" name="Message" id="transcript">
                </div>
                <div class="col-sm-12">
                   <label class="send_btn" onclick="startDictation()"><span>  </span><i class="fa fa-microphone"></i> Start </label>
                </div>
             </div>
          </form>
       </div>
    </div>
    <br>
    <h2 class="text-center">Or</h2>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form class="main_form" action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <button class="upload_btn" type="submit" class="btn btn-success">Upload</button>
                    </div>

                </div>
            </form>

            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="text-center">
                    <h2>Output</h2>
                    <h3>{{ $message }}</h3>

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
            @endif
        </div>
    </div>
 </div>
</div>
