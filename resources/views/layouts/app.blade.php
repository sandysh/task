<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <link rel="stylesheet" type="text/css" href="css/style.css">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    
    <!-- Navbar goes here -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
  
  <!-- <div class="navbar-fixed"> -->
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Task Social</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html"><i class="material-icons">search</i></a></li>
          <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
          <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{Auth::user()->name}}<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
  <!-- </div> -->

    <!-- Page Layout here -->
    <div class="row">

      <div class="col s12 m4 l2 leftbar"> <!-- Note that "m4 l3" was added -->
        <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->

          <ul>
              <li>News Broadcast</li>
              <li>Messages</li>
              <li>Events</li>
              <li>Team</li>
          </ul>

      </div>




      <div class="col s12 m6 l7" style="overflow-y:scroll"> <!-- Note that "m8 l9" was added -->
            
             @yield('content')
        <!-- Teal page content

              This content will be:
          9-columns-wide on large screens,
          8-columns-wide on medium screens,
          12-columns-wide on small screens  -->

      </div>

        <div class="col s12 m2 l3 rightbar"> <!-- Note that "m8 l9" was added -->
        <!-- right panel  -->
        <ul class="collection with-header">
          <li class="collection-header"><h5><i class="material-icons dp48 balanced red white-text">not_interested</i>Incomplete Task</h5></li>
          <li class="collection-item"><div>Task 1<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 2<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 3<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 4<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 5<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul>

        <ul class="collection with-header">
          <li class="collection-header"><h5><i class="material-icons dp48 balanced teal white-text">done</i>Completed Task</h5></li>
          <li class="collection-item"><div>Task 1<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 2<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 3<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 4<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
          <li class="collection-item"><div>Task 5<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul>

      <ul class="collection">
          <li class="collection-item avatar"><h3>Stats</h3></li>
          <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Sunday</span>
            <p>Total task : 1 <br>
               Completed : 1 <br>
               Incomplete : 1
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Monday</span>
            <p>Total task : 1 <br>
               Completed : 1 <br>
               Incomplete : 1
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">insert_chart</i>
            <span class="title">Tuesday</span>
               <p>Total task : 1 <br>
               Completed : 1 <br>
               Incomplete : 1
              </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle red">play_arrow</i>
            <span class="title">Wednesday</span>
               <p>Total task : 1 <br>
               Completed : 1 <br>
               Incomplete : 1
              </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>
        </ul>

        </div>
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
