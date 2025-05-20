<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  @for ($i = 1; $i <= 5; $i++)
    <p>Item {{ $i }}</p>
    @endfor
    @switch($role)
    @case('admin')
    <p>Welcome, Admin!</p>
    @break
    @case('user')
    <p>Welcome, User!</p>
    @break
    @default
    <p>Welcome, Guest!</p>
    @endswitch
</body>
</body>

</html>