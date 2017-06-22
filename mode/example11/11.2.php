<?php
/**
 * Created by PhpStorm.
 * User: M
 * Date: 2017/6/22
 * Time: 16:15
 * 探知 - 策略模式
 */

abstract class Question
{
    protected $prompt;
    protected $marker;

    function __construct($prompt,Marker $marker)
    {
        $this->marker = $marker;
        $this->prompt = $prompt;
    }

    function mark( $response )
    {
        return $this->marker->mark( $response );
    }
}

class TextQuestion extends Question{}

class AVQuestion extends Question{}

abstract class Marker
{
    protected $test;
    function __construct( $test )
    {
        $this->test = $test;
    }
    abstract function mark( $response );
}

class MarkLogicMarker extends Marker
{
    private $engine;
    function __construct($test)
    {
        parent::__construct($test);
        //$this->engine = new MakerParse ( $test );
    }
    function mark($response)
    {
        // TODO: Implement mark() method.
        //return $this->engine->evaluate( $response );
        return true;
    }
}

class MatchMarker extends Marker
{
    function mark($response)
    {
        // TODO: Implement mark() method.
        return ( $this->test == $response );
    }
}

class RegexpMarker extends Marker
{
    function mark($response)
    {
        // TODO: Implement mark() method.
        return ( preg_match($this->test,$response ));
    }
}

$markers = array(
    new RegexpMarker("/f.ve/"),
    new MatchMarker("five"),
    new MarkLogicMarker('$input equals "five" ')
);

foreach ($markers as $marker)
{
    print get_class($marker)."<br />";
    $question = new TextQuestion('how many beans make five',$marker);
    foreach (array('five','four') as $response) {
        print "/tresponse: $response: ";
        if ($question->mark($response)){
            print "well done <br />";
        }else {
            print  "never mind <br />";
        }
    }
}