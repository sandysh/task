<template>
<div>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!" @click="logout()">Logout</a></li>
</ul>


  <!-- <div class="navbar-fixed"> -->
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Social Tasking</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html"><i class="material-icons">search</i></a></li>
          <li><a href="#!"><i class="material-icons">refresh</i></a></li>
          <li>
          <select class="browser-default transparent" v-model="projectID" style="margin-top:10px">
              <option v-for="project in projects" value="{{project.id}}">{{project.name}}</option>
          </select>
          </li>
          <li><a href="#!">{{company.name}}</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{userData.name}}<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
  <!-- </div> -->

    <!-- Page Layout here -->
    <div class="row">

      <div class="col s12 m4 l2 leftbar">

          <ul>
              <li><a v-link="{path: '/newsbroadcast'}">News Broadcast</a></li>
              <li><a v-link="{path: '/message'}">Messages</a></li>
              <li>Events</li>
              <li>Team</li>
              <a v-link="{path: '/project'}"><li>Projects</li></a>
          </ul>

      </div>




      <div class="col s12 m5 l7" style="overflow-y:scroll; height: 100vh">

      <router-view></router-view>


      </div>

        <div class="col s12 m3 l3 rightbar"> <!-- Note that "m8 l9" was added -->
        <!-- right panel  -->
<!--         <ul class="collection with-header">
          <li class="collection-header"><h5><i class="material-icons dp48 balanced red white-text">not_interested</i>Yesterday's Task</h5></li>
          <li v-for="yesterday in yesterdayTask" class="collection-item"><div>{{yesterday.name}}<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul> -->

        <ul class="collection with-header">
          <li class="collection-header"><h5><i class="material-icons dp48 balanced teal white-text">done</i>Completed Task</h5></li>
          <li v-for="task in tasks | filterBy '1' in 'status' " class="collection-item"><div><input type="checkbox" id="box{{task.id}}" class="filled-in" checked="checked" />
      <label for="uncheckTask" @click = "uncheckTaskModal(task.id)"></label>{{task.name}}<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
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

    <div id="uncheckTask" class="modal">
      <div class="modal-content">
        <h4>Uncheck this task ?</h4>
        <p>Are you sure, you want to re-work on this task ?</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" @click.prevent = "uncheckTask()">Yep</a>
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Leave it checked</a>
      </div>
    </div>

</div>



</template>

<script>
  module.exports={
    name: "App",
    data: function () {
      return {
        userData: {},
        tasks: [],
        yesterdayTask: [],
        uncheckId: null,
        projectID: null,
       }
    },

    watch:
    {
      projectID: function(id){
        this.getTaskByProject();
      }
    },

    methods:
    {

      fetchuserData: function()
      {
        this.$http.get('/userData').then(function({data}){
        //console.log(data);
        this.$set('userData',data);
        this.$set('projectID',data.projects[0].id);
        $('select').material_select();
        //this.getTaskByProject();
        this.getYesterdayTask();
        });
      },

      getTaskByProject: function(){
        //alert(this.projectID);
        this.$http.get('/api/task/'+this.projectID).then(function({data}){
          //console.log(data)
          this.$set('tasks', data);

        });
      },

      getYesterdayTask: function()
      {
        this.$http.get('/api/yesterday-task/'+this.projectID).then(function({data}){
          //console.log(data)
          this.$set('yesterdayTask', data);
        });
      },

      uncheckTaskModal($id)
      {
        $('#uncheckTask').openModal();
        this.$set('uncheckId',$id);
      },

      uncheckTask()
      {
        this.$http.get('/api/task/uncheck/'+this.uncheckId)
        .then(function({data}){
          if(data === 'true')
          {
            Materialize.toast('Task re-assigned successfully', 4000);
            this.getTaskByProject();
          }
          else
          {
            Materialize.toast(data, 4000);
          }
        });
      },

      logout()
      {
        this.$http.get('/api/logout')
        .then(function(){
        location.assign = '/';
       });
      }
    },

    events:
    {
      updateTask: function()
      {
        //console.log('fired');
        //this.tasks.push(data);
        this.getTaskByProject();
      },

      updateYesterdayTask: function()
      {
        this.getYesterdayTask();
      }
    },

    computed:
    {
      company: function()
      {
        return this.userData.company ? this.userData.company[0] : {} 
      },

      projects: function()
      {
        return this.userData.projects ? this.userData.projects : {} 
      },

    },

     ready: function()
    {
      this.fetchuserData();
    }
  }
</script>