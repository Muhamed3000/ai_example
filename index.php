<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';
$open_ai = new OpenAi($open_ai_key);

if(isset($_POST['send'])){

    //To Get Text Result
    // $complete = $open_ai->completion([
    //     'model' => 'text-davinci-003',
    //     'prompt' => $_POST['prompt'],
    //     'temperature' => 0.9,
    //     'max_tokens' => 1500,
    //     'frequency_penalty' => 0,
    //     'presence_penalty' => 0.6,
    // ]);

    //To Generate Image
    $complete = $open_ai->image([
        "prompt" => $_POST['prompt'],
        "n" => 1,
        "size" => "256x256",
        "response_format" => "url",
     ]);

    $complete = json_decode($complete,true);

    echo '<pre>';
    print_r($complete);
    echo '</pre>';

    // echo $complete['choices'][0]['text'];
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method='POST'>
        <input type="text" name='prompt'>
        <button type="submit" name='send'>Send</button>
    </form>
</body>
</html>