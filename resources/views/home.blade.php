<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome</title>
</head>

<body>
  @extends('layouts.master')
  @section('title', 'Home Page')
  @section('content')
  <h2>Welcome to the Home Page!</h2>
  <p>This is a page using the master layout.</p>
  @endsection
</body>

</html>