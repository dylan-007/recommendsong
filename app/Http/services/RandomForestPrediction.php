<?php

namespace App\Http\Services;

//use Phpml\Classification\Ensemble\RandomForest;
use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Classifiers\ClassificationTree;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;

class RandomForestPrediction
{
    public $filename, $input, $samples = [], $targets = [], $classifier;

    public function __construct($filename, $input)
    {
        $this->filename = $filename;
        $this->input = $input;
    }

    public function predict()
    {
        $this->readFile();
        // info($this->samples[0]);
        // info($this->targets[0]);
        $model = new RandomForest(new ClassificationTree(10), 300, 0.1, true);
        $dataset = new Labeled($this->samples, $this->targets);
        //dd($dataset);
        $model->train($dataset);
        //$this->classifier->save('./model.cls');
        $inputDataset = new Unlabeled($this->input);
        return $model->predict($inputDataset);
    // }
    // public function predictResult()
    // {
    //     $this->classifier->load('./model.cls');
    //     $model = $this->classifier->predict($this->input);
        $inputDataset = new Unlabeled($this->input);
        return $model->predict($inputDataset);
    }

    public function readFile()
    {
        $file = fopen($this->filename, 'r');
        $row = 1;
        $tempArray = [];

        if ($file !== false) {
            while (($data = fgetcsv($file)) !== false) {
                if ($row != 1) {
                    $num = count($data);
                    //info($num);
                    for ($c = 0; $c < $num; $c++) {
                        // if ($c < 6) {
                        //     array_push($tempArray, $data[$c]);
                        // }
                        if ($c == 0) {
                            array_push($tempArray, $data[$c]);
                        }
                        else if ($c == 1) {
                            array_push($this->targets, $data[$c]);
                        }
                    }
                    array_push($this->samples, $tempArray);
                    $tempArray = [];
                }
                $row++;
            }
        }
        fclose($file);
    }
}
