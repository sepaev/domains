<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="jquery.js"></script>
    <script>
        $.get(
            "http://prof2/JSON/serialize.php",
            function(data){
               document.write("have response<br>");
               document.write(data);
                var arr = JSON.parse(data);
                console.log(arr);
                document.write(arr.name);
            }
        )
    </script>
</head>
<body>

</body>
</html>