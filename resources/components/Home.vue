<style>
  [type="checkbox"]+label
  {
    top: 8px;
  }
  .started, .stopped, .paused
  {
    opacity: 0.1;
  }
</style>
<template>
	

<div class="container">
    <div class="row">
 
                    <div class="row">
                      <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">speaker_notes</i>
                            <textarea id="icon_prefix2" class="task-post-input z-depth-2" placeholder="what will you work on today ??" v-model="task"></textarea>
                            <!-- <label for="icon_prefix2">Add a Task</label> -->
                          </div>
                          <a class="waves-effect waves-light btn right post-btn" @click="addTask()">Post Task</a>
                        </div>
                      </form>
                    </div>
                    
                    <span <div v-if="yesterdayTask.length">
                      <h5>Yesterday's Task</h5>

                      <ul class="collapsible popout" data-collapsible="accordion">
                        <li v-for="yesterday in yesterdayTask">
                          <div class="collapsible-header">
                                <input class="checktask" type="checkbox" id="{{yesterday.id}}"/>
                                <label for="test5" @click.prevent="checkTask(yesterday.id,'yesterday')"></label>
                              
                          {{yesterday.name}} <span class="today-time">2 hrs</span><span class="right"> <i class="material-icons dp48">play_circle_filled</i><i class="material-icons dp48">pause</i><i class="material-icons dp48">stop</i><i class="material-icons dp48" @click="deleteTaskModal(task.id)" style="color:red">delete</i></span></div>
                          <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                        </li>
                      </ul>
                    </div>
                    
                    <h5>Today's Task</h5>
                    <div v-if="tasks.length">
                    <ul class="collection z-depth-1">
                      <li v-for="task in tasks | filterBy '0' in 'status' ">
                        <div class="collapsible-header">
                              <input class="checktask" type="checkbox" id="{{task.id}}"/>
                              <label for="test5" @click.prevent="checkTask(task.id,'today')"></label>
                            
                        {{task.name}} <span v-show="task.id === currentTask" class="today-time">{{timerStatus}}</span>
                        <span class="right"> 
                        
                        <i class="material-icons dp48" id='start{{task.id}}' @click = "start(task.id)">play_circle_filled</i>
                        
                        <i v-if="!paused" class="material-icons dp48" id="paused{{task.id}}" @click="pause(task.id)">pause</i>
                        <i v-if="paused" class="material-icons dp48" id="resume{{task.id}}" @click="resume(task.id)">replay</i>
                        <i class="material-icons dp48" id="stop{{task.id}}" @click = "stop(task.id)">stop</i>
                        <i class="material-icons dp48" @click="deleteTaskModal(task.id)" style="color:red">delete</i></span></div>
                        <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                      </li>
                    </ul>
                    </div>
                    <div v-else>No tasks present</div>
                           
    </div>
</div>

  <!-- Modal Structure -->
  <div id="deleteTaskModal" class="modal">
    <div class="modal-content">
      <h4>Delete this task ?</h4>
      <p>Are you sure you want to delete this task ?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" @click.prevent = "deleteTask()">Delete</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Nope</a>
    </div>
  </div>


</template>

<script>
  module.exports = {
  	name: "Dashboard",
    data: function () {
      return {
        task: null,
        deleteId: null,
        timerStatus: '',
        started: false,
        paused: null,
        currentTask: null,
        //tasks: {}
       }
    },

    watch:
    {
      runningTask()
      {

      },

      pausedTask()
      {

      },

      resumedTask()
      {

      },

      stoppedTask()
      {

      }
    },

    computed:
    {
      tasks: function()
      {
        return this.$root.tasks;
      },

      yesterdayTask: function()
      {
        return this.$root.yesterdayTask;
      },

      projectID: function()
      {
        return this.$root.projectID;
      },

      runningTask()
      {
        var i;
        for(i=0;i<this.tasks.length;i++)
        {
          if(this.tasks[i].start != "0000-00-00 00:00:00" && this.tasks[i].stop === "0000-00-00 00:00:00")
          {
            this.started = true;
            this.currentTask = this.tasks[i].id;
            this.timerStatus = "Recording Time";
            $('#start'+this.tasks[i].id).addClass('started');
            return this.tasks[i];
          }
        }
      },

      pausedTask()
      {
        var i;
        for(i=0;i<this.tasks.length;i++)
        {
          if(this.tasks[i].pause != "0000-00-00 00:00:00")
          {
            this.paused = true;
            this.currentTask = this.tasks[i].id;
            this.timerStatus = "paused";
            $('#start'+this.tasks[i].id).addClass('started');
            return this.tasks[i];
          }
        }
      },

      resumedTask()
      {
        var i;
        for(i=0;i<this.tasks.length;i++)
        {
          if(this.tasks[i].resume != "0000-00-00 00:00:00")
          {
            this.started = true;
            this.currentTask = this.tasks[i].id;
            this.timerStatus = "Recording Time";
            $('#start'+this.tasks[i].id).addClass('started');
            return this.tasks[i];
          }
        }
      },

      stoppedTask()
      {
        var i;
        var stopped = new Array();
        for(i=0;i<this.tasks.length;i++)
        {
          if(this.tasks[i].stop != "0000-00-00 00:00:00")
          {
            //console.log(this.tasks[i]);
            this.started = false;
            this.currentTask = this.tasks[i].id;
            this.timerStatus = "Stopped";
            $('#start'+this.tasks[i].id).addClass('started');
            $('#stop'+this.tasks[i].id).addClass('stopped');
            $('#paused'+this.tasks[i].id).addClass('paused');
            stopped[i] = this.tasks[i];
            console.log(stopped);
          }
        }
        return stopped;
      }




    },

    methods:
    {
      addTask: function()
      {
        this.$http.post('/api/task/create/'+this.projectID,{task:this.task}).then(function({data}){
          //console.log(data);
          if(data === 'true')
          {
            this.task = null;
            this.$root.$emit('updateTask');
          }
        });      
      },

      deleteTaskModal: function(id)
      {
        $('#deleteTaskModal').openModal();
        this.$set('deleteId',id);
      },

      deleteTask: function()
      {
        this.$http.get('/api/task/delete/'+this.deleteId).then(function({data}){
          if(data === 'true')
          {
            Materialize.toast('Task deleted successfully', 4000);
            this.$root.$emit('updateTask');
          }
          else
          {
            Materialize.toast(data, 4000)
          }
        });
      },

      checkTask: function(id,period)
      {
        this.$http.post('/api/task/complete/'+id)
        .then(function({data}){
          if(data === 'true')
          {
            Materialize.toast('Task completed successfully', 4000);
            if(period === 'today')
            {
              this.$root.$emit('updateTask');  
            }
            else
            {
              this.$root.$emit('updateYesterdayTask');
            }
          }
          else
          {
            Materialize.toast(data, 4000);
          }
        });
      },

      start(id)
      {
        if(!this.started && this.currentTask !== id )
        {
        this.$http.post('/api/task/start/'+id)
        .then(function({data}){
          if(data === 'true')
          {
            this.currentTask = id;
            this.started = true;
            $('#start'+id).addClass('started');
            this.timerStatus = "Recording Time";
            Materialize.toast('Timer for this task started', 4000);
          }
          else
          {
            Materialize.toast(data, 4000);

          }

        });
      }
      else if(this.started && this.currentTask === id)
      {
        Materialize.toast('Timer for this task is already running', 4000);
      }

      else if(this.paused)
      {
        Materialize.toast('Timer for this task is already running', 4000);
      }

      else
      {
        Materialize.toast('Cannot start this task when other task is running', 4000); 
      }

      },

      pause(id)
      {
        this.$http.post('/api/task/pause/'+id)
        .then(function({data}){
          if(data === 'true')
          {
            this.timer = id;
            this.paused = true;
            this.timerStatus = "paused";
            Materialize.toast('Timer for this task is paused', 4000);
          }
          else
          {
            Materialize.toast(data, 4000);

          }

        });
      },

      resume(id)
      {
        this.$http.post('/api/task/resume/'+id)
        .then(function({data}){
          if(data === 'true')
          {
            this.timer = id;
            this.timerStatus = "Recording Time";
            Materialize.toast('Timer for this task is resumed', 4000);
          }
          else
          {
            Materialize.toast(data, 4000);

          }

        });
      },





      stop(id)
      {
        this.$http.post('/api/task/stop/'+id)
        .then(function({data}){
          if(data === 'true')
          {
            $('#stop'+id).addClass('stopped');
            $('#paused'+id).addClass('paused');
            this.currentTask = null,
            this.started = false;
            Materialize.toast('Timer for this task stopped', 4000);
          }
          else
          {
            Materialize.toast(data, 4000);

          }

        });
      },

      // checkforTimer()
      // {
      //   this.$http.get('/api/task/active/')
      //   .then(function({data}){

      //   });
      // }


    },

    ready: function()
    {
    	//this.$root.tasks = this.tasks;
    }
  }
</script>