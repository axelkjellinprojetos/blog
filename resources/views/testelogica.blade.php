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
            $num1 = 5;
            $num2 = 3;

            for ($i=1; $i <= 100; $i++) { 
                if(($i%$num1==0)&&($i%$num2==0)){
                    echo 'CoBlue'."<br>";
                }else if($i%$num2==0){
                    echo 'Blue'."<br>";
                }else if($i%$num1==0){
                    echo 'Co'."<br>";
                }else {
                    echo $i."<br>";
                }
            }
        
            ?>
    </div>
</body>
</html>