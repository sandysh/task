@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
 
                    <div class="row">
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">speaker_notes</i>
                            <textarea id="icon_prefix2" class="task-post-input z-depth-2" placeholder="what will you work on today ??"></textarea>
                            <!-- <label for="icon_prefix2">Add a Task</label> -->
                          </div>
                          <a class="waves-effect waves-light btn right post-btn">Post Task</a>
                        </div>
                      </form>
                    </div>
                    
                    <h5>Yesterday's Task (If any)</h5>
                      <div class="collection">
                        @for ($i = 0; $i < 5; $i++)                      
                        <a href="#!" class="collection-item"><input type="checkbox">Task 1 <span class="today-time">2 hrs</span><span class="right"> <i class="material-icons dp48">play_circle_filled</i><i class="material-icons dp48">stop</i></span></a>                      
                        @endfor
                      </div>


                    <h5>Today's Task</h5>
                    <div class="collection">
                      @for ($i = 0; $i < 5; $i++)                      
                      <a href="#!" class="collection-item"><input type="checkbox">Task 1 <span class="today-time">2 hrs</span><span class="right"> <i class="material-icons dp48">play_circle_filled</i><i class="material-icons dp48">stop</i></span></a>                      
                      @endfor

                    </div>


                    <h5>Yesterday's Task</h5>
                    <div class="collection">
                      <a href="#!" class="collection-item">Task 1<span class="time badge">2 hrs</span></a>
                      <a href="#!" class="collection-item">Task 2<span class="time badge">2 hrs</span></a>
                      <a href="#!" class="collection-item">Task 3<span class="time badge">2 hrs</span></a>
                      <a href="#!" class="collection-item">Task 4<span class="time badge">2 hrs</span></a>
                      <a href="#!" class="collection-item">Task 5<span class="time badge">2 hrs</span></a>
                    </div>
                           
    </div>
</div>
@endsection
