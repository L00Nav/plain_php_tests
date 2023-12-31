<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            background-color: #222;
            color: #ddd;
            width: 70vw;
            height: 70vh;
        }

        main {
            margin: 100px;
        }
    </style>
</head>
<body>
    <main>
        <form method="get">
            <input type="text" name="input">
            <input type="text" name="symbol">
            <button type="submit">Submit</button>
        </form>
        <?php
            class ExerciseClass
            {
                public static function countTheLetters(string $input, string $counter): string
                {
                    $letters = preg_replace("/[^A-Za-z]/", '', $input); // delete non-letters
                    $letters = strtolower($letters); // get rid of capitalisation
                    $letters = str_split($letters); // separate into array
                    $letters = array_filter($letters); //delete empty spaces
                    
                    $uniqueLetters = array_unique($letters); //make a unique letter list
                    $letterCounts = array_flip($uniqueLetters); // make a counter list
                    // for ($i = 0; $i < count($uniqueLetters); $i++) // bug. Keys aren't numbers in this array
                    //     $letterCounts[$i] = '';
                    foreach ($uniqueLetters as $letter)  // set all counters to 0
                        $letterCounts[$letter] = '';

                    foreach ($letters as $letter) //count each letter
                    {
                        if (in_array($letter, $uniqueLetters))
                            $letterCounts[$letter] .= $counter;
                    }

                    //Output
                    $output = "'$input'. Letters used: ";
                    foreach ($uniqueLetters as $letter)
                    {
                        $output .= "$letter - $letterCounts[$letter]; ";
                    }
                    return trim($output);
                }
            }

            
            $input = $_GET['input'] ?? ''; //check if form is submitted
            $counter = $_GET['symbol'] ?? ''; //check if form is submitted

            if($input)
            {
                echo('<br><br>'. ExerciseClass::countTheLetters($input, $counter));
            }
        ?>
    </main>
</body>
</html>