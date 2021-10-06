<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckerController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(){
        return new Response(
            '
                    <html>
                    <head>
                    <title>Oyetola Taiwo\'s Solution</title>
                    </head>
                    <body style="margin: auto; width: 50%; margin-top: 10%; margin-left: 30%">
                    <div><h1>Welcome to Oyetola JADU exercise solution</h1></div>
                    
                    <u style="font-size: 18px;">Methods</u>
                    <div style="font-size: 20px;"><b>Palindrome</b> |  <b>Anagram</b>  | <b>Pangram</b></div>
                    </body>
                    <section style="margin-top: 40px;">
                       Find the codes in <code>./src/controller/CheckerController.php</code>
                    </section>
                    </html>'
        );
    }
    /**
     * @Route("/checker/palindrome/{word}", name="checker_palindrome", methods={"GET"})
     * @param bool
     * @return bool
     */
    public function isPalindrome(string $word): Response
    {
        if(is_string($word)){
            if(strlen($word) == 0 || strlen($word) == 1){
                return true;
            }else{
                $temp = "";
                for($i=strlen($word)-1; $i>=0; $i--){
                    $temp = $temp.$word[$i];
                }
                if($word == $temp){
                    //return true;
                    return $this->json(['result'=>true], 200);
                }
                //return false;
                return $this->json(['result'=>false], 200);
            }
        }
        //return false;
        throw new \Exception('The rigth data type has not been inputed: string type expected');
    }

    /**
     * @Route("/checker/anagram", name="checker_anagram", methods={"POST"})
     * Returns true if $comparison is coined from $word and false if otherwise
     * @param string $word
     * @param  string $comparison
     * @return bool
     */
    public function isAnagram(Request $request): Response
    {
        if($request->request->get('word') && $request->request->get('comparison')){

            //get parameters from post request
            $wordArray = str_split($request->request->get('word'));
            $comparisonArray = str_split($request->request->get('comparison'));

            //declare a variable to store state as we check if each letter in the new word exist in the original word
            $storeState =  false;

            //loop through the newly formed word and check if previous word has the letter being check; remove each found word to avoid repetition
            foreach ($comparisonArray as $letter){
                if(in_array($letter, $wordArray)){
                    array_diff($wordArray, array($letter));
                    $storeState = true;
                    return $this->json(['result'=>$storeState], 200);
                }else{
                  $storeState = false;
                  //return $storeState;
                  return $this->json(['result'=>$storeState], 200);
                }
            }
            return $this->json(['result'=>$storeState], 200);
        }
        throw new \Exception('Parameters should be of type string');
    }


    /**
     * @Route("/checker/pangram", name="checker_pangram", methods={"POST"})
     * check phrase if it contains at least one letter of every alphabet in English
     * @param string $phrase
     * @return bool
     */
    public function isPangram(Request $request): Response
    {
        if($request->request->get('phrase') && is_string($request->request->get('phrase'))){
            //define "alphabet"
            $alpha = range( 'a', 'z' );

            //split lowercased string into array
            $a_sentence = str_split( strtolower( $request->request->get('phrase') ) );

            //check that there are no letters present in alpha not in sentence
            $letters = array_unique($a_sentence);
            if (count(array_intersect($alpha, $letters)) == 26) {
                //return true;
                return $this->json(['result'=>true], 200);
            } else {
                //return false;
                return $this->json(['result'=>false], 200);
            }
        }
        throw new \Exception('Parameter is meant to be string type');
    }
}