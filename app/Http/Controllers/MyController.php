<?php

namespace App\Http\Controllers;

use App\Http\Services\RandomForestPrediction;
use App\Http\Services\Summary;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Http\services\Prediction;
use App\Http\services\Training;
use App\Http\services\WordFrequency;
use App\Http\services\SpellandSarcasm;
use Antoineaugusti\LaravelSentimentAnalysis\SentimentAnalysis;
Use App\Http\services\Text;
use App\Http\services\Concordance;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Datasets\Labeled;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;

class MyController extends Controller
{
    //

    public function index(Request $request)
    {
        $input = $request->input('Message');

        // (new Training('topic.csv'))->train();
        $result1 = (new Prediction($input))->predict();

        $result2 = (new SentimentAnalysis)->scores($input);

        $result3 = (new WordFrequency)->getFrequency($input);

        $result4= (new Text($input))->predict();

        $inputArray=[
            $request->textc
        ];

        $intent_output=(new RandomForestPrediction('intent.csv',[$inputArray]))->predict();
        $result5 =  $intent_output[0];

        $resultArr = (new SpellandSarcasm)->predict($input);

        $result6 = $resultArr[0];

        $result7 = $resultArr[1];

        $result8 = (new Concordance)->getConcordance($input, $result3[1]);

        $result3 = $result3[0];
        return view('out',compact('result1','result2','result3','result4','result5','result6','result7', 'result8'));
    }

    public function result(Request $request)
    {
        $input = $request->input('Message');
        // (new Training('topic.csv'))->train();
        $topic = (new Prediction($input))->predict();


        $inputArray=[
            $request->textc
        ];
        $intent_output=(new RandomForestPrediction('intent.csv',[$inputArray]))->predict();
        $sentiment =  $intent_output[0];

        $resultArr = (new SpellandSarcasm)->predict($input);

        $result6 = $resultArr[0];

        $sarcasm = $resultArr[1];

        $summary = (new Summary)->getSummary($input);

        $summary = str_replace(array("\n", "\r"), ' ', $summary);

        return view('output1',compact('topic','sentiment','sarcasm','summary'));
    }


    public function speechOutput(Request $request)
    {
        $input = $request->input('Message');

        // (new Training('topic.csv'))->train();
        $result1 = (new Prediction($input))->predict();

        $result2 = (new SentimentAnalysis)->scores($input);

        // $result3 = (new WordFrequency)->getFrequency($input);

        // $result4= (new Text($input))->predict();

        $result6= json_encode($input);
        $result7 = exec("test.py  $result6");
        $result7=json_decode($result7,true);

        print($result7);

        // unset($result7["positive"]);
        // unset($result7["negative"]);
        // unset($result7["anticip"]);
        //print_r($result7);
        // foreach ($result7 as $k => $value)
        //     $result7[$k]=$value*100;
        // arsort($result7);

        // $resultArr = (new SpellandSarcasm)->predict($input);

        // $result6 = $resultArr[0];


        // $result8 = (new Concordance)->getConcordance($input, $result3[1]);

        // $result3 = $result3[0];

        $positive_sentences = array("Get some exercise", "Take a timeout from your work", "Use humor to release tension", "Reach out to your good friends", "Spend time in nature", "Play with an animal", "Reorganize your room", "Make a list of places you want to travel", "Read the story of someone you admire");

        $positive_sentence = $positive_sentences[array_rand($positive_sentences)];

        // printf(key($result7));

        // return view('speech_output',compact('input', 'result1','result2','result7','positive_sentence'));
        $result7 = [];
        return view('sp_output', compact('result7', 'result'));
    }

    public function UploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ]);

        $imageName = 'img' . '.' . $request->image->extension();

        $request->image->move(public_path('Audio_input'), $imageName);


        /* Store $imageName name in DATABASE from HERE */
        //$request->image->move(public_path('images'), $imageName);
        //return view('out', ['data' => $imageName]);
        $result = exec("python speechEmotion.py");
        $result = substr($result,2,strlen($result)-4);
        //return view('out', ['data' => $data]);
        $result7 = [];
        return view('sp_output' , compact('result', 'result7'));

    }

    public function Upload()
    {
        return view('uploadInput');
    }

    public function recommend(Request $request)
    {
        $emotion = $request->input('emotion');
        print_r($emotion);
        return redirect()->away('https://www.youtube.com/results?search_query= '.$emotion.' +songs');
    }

}
