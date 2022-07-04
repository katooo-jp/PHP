<!doctype html>
<html lang="ja">
<head>
  		<meta charset="utf-8">
  		<title>for文</title>
</head>
<body>
@for($i=0; $i<=10; $i++)
    @if($i%2 == 0)
        <p style="background-color:red; ">赤です</p>
    @else
        <p style="background-color:blue;">青です</p>
    @endif
@endfor
</body>
</html>
