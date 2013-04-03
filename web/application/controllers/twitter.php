<?php 
require_once 'application/libraries/codebird.php';
/**
* 
*/
class twitter extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('twitter');
    }

    public function ajax()
    {
        $this->load->helper('file');
        Codebird::setConsumerKey('M7UrDMA2yABwu7nCqcyPvA', '599v7IYghCrgJC3hWmuKwOwbrAxtf2XuwWhm0UTW6Y');
        $cb = Codebird::getInstance();
        $cb->setToken('26970744-4kScHVf2yXD1n7LqU8yU46vF4BnyIYQVWm6j7oFTr', 'whbcugwZcB997fDTnHhc3A16xXnhahsQgKrVvmGA9U');

        $q = $this->input->get('q');
        $params = array(
            'q' => $q,
            'count' => 100
        );
        $text = '';
        $tmp = '';
        $data = $cb->search_tweets($params);
       
        foreach ($data->statuses as $s) {

           // remove hashtag
            $tmp = preg_replace("/(#\w+)/", '', $s->text);

            // remove @
            $tmp = preg_replace("/(@\w+)/", '', $tmp);

            // remove link
            $tmp = preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie","",$tmp);

            // remove RT
            $tmp = str_replace("RT :","",$tmp);

            $text = $text . '' .  $tmp;
            $tmp = '';
        }
        #echo $text;
        $name = '___'.md5($text);
        if ( ! write_file($name.'.txt', $text))
        {
            # echo 'Unable to write the file';
        }
        else
        {
            # echo 'File written!';
              $res = exec('python lid.py '.$name.'.txt');
        echo $res;
        }
      
    }

    public function hae()
    {
        $name = 'sample1';
        $res = exec('python lid.py '.$name.'.txt');
        echo 'python lid.py '.$name.'.txt';
        echo $res;
    }
}