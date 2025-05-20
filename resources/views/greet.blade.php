<!DOCTYPE html>
<html lang="en">

<head>
  <title>Greeting</title>
</head>

<body>
  <h1>Hello, {{ $name }}!</h1>
  @for ($i = 1; $i <= 5; $i++)
    <p>Item {{ $i }}</p>
    @endfor

    @switch($name)
    @case('admin')
    <p>Welcome, Admin!</p>
    @break
    @case('user')
    <p>Welcome, User!</p>
    @break
    @default
    <p>Welcome, Guest!</p>
    @endswitch

    <h1>Users</h1>
    @if($name == 'admin')
    <p>Welcome, Admin!</p>
    @else
    <p>Welcome, Guest!</p>
    @endif
</body>

</html>