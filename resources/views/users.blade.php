<!DOCTYPE html>
<html lang="en">

<head>
  <title>Users</title>
</head>

<body>
  <h1>Here are the users:</h1>
  <ul>
    @foreach($users as $user)
    <li>{{ $user }}</li>
    @endforeach
  </ul>
</body>

</html>