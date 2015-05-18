# test

TEST APPLICATION 
Back-End Developer


Hey,

You made the short list. To be able to filter the candidates and make a decision we need you to do a simple little task.

Create an API (on your test server) with the following parameters:

URI: <yourdomain.com>/tc-test-api.php/detect-topic/
Request: POST
Content-Type: application/json
Access: Has to be accessible from anywhere (any external domain)
Data Sent (Request Payload):
{‘htmlString’: ‘………..’}


The API takes in the function name (in this case “detect-topic”). 
Also, as data transmitted as "application/json" (!very important), we transmit a JSON object that has a key called “htmlString”, with the value being an actual HTML sequence.

If the function is “detect-topic” THEN:

It has to parse all words inside <p></p> tags in the HTML sequence and find the word that occurs the most. The word can’t be a word with less than 5 characters and it can’t be any of the following: “which”, “where”, “however”, “furthermore”, “always” and “never”.

Once the API finds the word that occurs the most it needs to return it in JSON format like this:

{‘topic’:<the word it found>}

We will test this API on our own and see if it returns the right result once you provide us with the API URL.



