<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  
  <title>Chat App</title>

  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
  <link rel="icon" href="/favicon.png" type="image/x-icon">

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>

  <div id="app">
    <app></app>
  </div>

  <script src="/js/app.js"></script>
  
</body>
</html>
