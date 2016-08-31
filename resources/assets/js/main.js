var Vue = require('vue');

var VueRouter = require('vue-router');

var VueResource = require('vue-resource');


Vue.use(VueRouter);

Vue.use(VueResource);

var router = new VueRouter();

import App from '../../components/Layout.vue';

import Home from '../../components/Home.vue';

import NewsBroadcast from '../../components/NewsBroadcast.vue';

import Message from '../../components/Message.vue';

import Project from '../../components/Project.vue';


router.map
({
	'/':
	{
		component: Home,

	},

	'/newsbroadcast':
	{
		component: NewsBroadcast
	},

	'/message':
	{
		component: Message
	},

	'/project':
	{
		component: Project,
		//adminOnly: true
	}

});

router.start(App,'#app');