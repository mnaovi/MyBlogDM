 <!doctype html>
<html lang="en">
  <head>
    @include('user.partials._head')

  </head>
  <body>

    @include('user.partials._navbar')
    @include('user.partials._messages')
     @section('body')

     @show

    @include('user.partials._footer')
    @include('user.partials._javascript')
  </body>
</html>