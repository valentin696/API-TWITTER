<?php

showTweets("GeekyTheory",5);
                    
function getJsonTweets($query,$num_tweets){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
 
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "346960750-2sG4iDDBrRvCM8aPz4K2y4oTA4uJK7keWoZTU3cM",
            'oauth_access_token_secret' => "1pHXvjXRdFZJRi6qolZrwMsTfymZaE5Zx75h4Iull2aKK",
            'consumer_key' => "tuvuxwoWjmMQv6fpGJq5Iadgl",
            'consumer_secret' => "RiqWPhlJWFNWSzV0DmPYHjslcZpd8RI072SHcYN1HImVv4BV7Q"
        );
        
        if($num_tweets>100) $num_tweets = 100;
       
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$query.'&count='.$num_tweets;
 
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        return $json;
}

