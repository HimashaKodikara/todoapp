<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","To Do App")</title>
    <link href={{asset("assets/css/boostrap.min..css")}} rel="stylesheet">
    @yield("style")
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <div>
        @yield("content")
    </div>
    <script src="{{("assets/js/boostrap.min.js")}}"></script>
  </body>
</html>
