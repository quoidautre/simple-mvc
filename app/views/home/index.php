<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple MVC</title>
        <link rel="stylesheet" href="http://localhost/GitHub/simple-mvc/public/css/global.css">
    </head>
    <body>
        <p>
            <strong>Welcome to the home/index view</strong>
        </p>
        <p>Below is the result of the parameters passed into the URL. You can pass in the controller and model name too. Try it... <em>/home/index/[name]/[mood]</em></p>
        <p><?=$data['name']?> is <?=$data['mood']?></p>
    </body>
</html>