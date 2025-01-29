<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.box {
    border: 1px solid #000;
    padding: 10px;
    text-align: center;
    width: 100px !important;
    height: 100px;
}

</style>
</head>
<body>

<div class="sidenav">
  <a href="{{ route('home') }}">Dashboard</a>
  <a href="{{ route('screen1') }}">Screen 1</a>
  <a href="{{ route('screen2') }}">Screen 2</a>
  <a href="{{ route('screen3') }}">Screen 3</a>
    
</div>

<div class="main">
  @yield('content')
</div>
   
</body>


        
@yield('script')

</html> 
