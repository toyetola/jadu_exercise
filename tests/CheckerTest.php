<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CheckerTest extends WebTestCase
{
    public function testHomePage(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to Oyetola JADU exercise solution');
//        $this->assertJsonContains(['@id' => '/']);
    }

    public function testPalindrome(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/checker/palindrome/anna');

        $this->assertResponseIsSuccessful();
        //$this->assertJsonContains(['result' => true]);
    }

    public function testAnagram(): void
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/checker/anagram', ['word'=>'lop', 'comparison'=>'pan']);

        $this->assertResponseIsSuccessful(200);
        //$this->assertJsonContains(['result'=>true]);
    }

    public function testPangram(): void
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/checker/pangram', ['phrase'=>'The British Broadcasting Corporation (BBC) is a British public service broadcaster.']);

        $this->assertResponseIsSuccessful(200);
        //$this->assertJsonContains(['result'=>false]);
    }
}
