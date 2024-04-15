<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="result"></div>
    <textarea name="" id="new Text" cols="50" rows="4"></textarea><br>
    <button id="updateBtn">Update Text File</button>
    <script>
        $(document).ready(function(){
            $('#updateBtn').click(function(){
                var new Text=$('#new Text').val();
                $.ajax({
                    type:'POST',
                    url:'update_file.php',
                    data:{text:new Text},
                    success:function(response){
                        $('#result').html(responses);
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php
if(isset($_POST['text'])){
  $text=$_POST['text']  ;
  $file='example.txt';
  $fp=fopen($file,'w');
  fwrite($fp,$text);
  fclose($fp);
  echo 'Text file update successfully.';
}
else{
    echo'Error:No data received';
}
?>