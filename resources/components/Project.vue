<template>

<div class="col s12">
	<a class="waves-effect waves-light btn modal-trigger" id="newProject" v-on:click="newProject">Add New Project</a>
 <div class="row">

      <div class="col s12 m4">
        <div class="card-panel white z-depth-2">
          some text
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel white z-depth-2">
     		some text
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel white z-depth-2">
          some text
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel white z-depth-2">
          some text
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel white z-depth-2">
          some text
        </div>
      </div>

    </div>
</div>




<!-- Modal Structure -->
<div id="addNewProject" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" @click.prevent class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>






</template>

<script>
	  module.exports = {
  	name: "Dashboard",
   //  data: function () {
   //    return {
   //      msg: 'Hello world!',
   //      userData: {}
   //     }
   //  },

   //  ready: function()
   //  {
   //  	this.$http.get('/userData').then(function({data}){
			// console.log(data);
			// this.$set('userData',data);  
   //  	});
   //  }
   methods:
   {
   	newProject: function()
   	{
   		$('#addNewProject').openModal();   	}
   }
  }
</script>