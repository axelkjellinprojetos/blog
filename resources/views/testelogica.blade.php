<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste Logica</title>
</head>
<body>
    <div>
            <?php
            for ($i=1; $i <= 100; $i++) { 
                if(($i%3==0)&&($i%5==0)){
                    echo 'CoBlue'."<br>";
                }else if($i%5==0){
                    echo 'Blue'."<br>";
                }else if($i%3==0){
                    echo 'Co'."<br>";
                }else {
                    echo $i."<br>";
                }
            }
        
            ?>
    </div>
</body>
</html>