<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type="checkbox"]{
            /* display: none; */
            position: relative;
        }

        input[type="checkbox"]:checked::before {
            content: "";
            background-color: black;
            width: 300px;
            height: 100%;
            position: absolute;
            /* top: 0;
            left: 0;
            right: 0;
            bottom: 0; */
        }

        form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <label for="dario">Dario
             <input type="checkbox" name="names[]" value="dario" id="dario">
        </label>
        <label for="tt">Tt
            <input type="checkbox" name="names[]" value="tt" id="tt">
        </label>
        <label for="jj">JJ
            <input type="checkbox" name="names[]" value="jj" id="jj">
        </label>
        <label for="xx">Xx
            <input type="checkbox" name="names[]" value="xx" id="xx">
        </label>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>