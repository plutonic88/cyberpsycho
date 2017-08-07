
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));

	
window.EventListeners = new Vue({



});



Vue.component('node',{



	props : ['id', 'neighbors', 'cla', 'nodevalues'],

	template: `<div class="node"  v-bind:id="id" @mousemove="mouseMove" >
	<button @click="tentativeattack"  class="btn node" v-bind:class="classobject" >
		<p v-if="this.nodevalue > 0" class="progress progress-bar" style="text-align: center; width='50%';">Node Id: {{this.nodenames[this.id]}}</p>
		<div v-if="this.nodevalue > 0"  class="progress">
			
	  		<div class="progress-bar bg-warning" role="progressbar" v-bind:style="styleobjectValue"  aria-valuemin="0" aria-valuemax="100"></div>
			<div style="padding=2px;">V: {{nodevalue}}</div>
		</div>
		<div v-if="this.nodevalue > 0"  class="progress">
		  
		  <div class="progress-bar bg-info" role="progressbar" v-bind:style="styleobjectCost"  aria-valuemin="0" aria-valuemax="100"></div>
		  <div style="padding=2px;">C: {{cost}}</div>
		</div>
		<div v-if="this.nodevalue == 0">
		 	<p> PASS </p>
		</div>

	</button>
	
	</div>`,


	data : function()
	{
		return {

			nei : this.neighbors,
			nid: this.id,
			owner: 0, // defender 0 attacker 1
			nodevalue: this.nodevalues[0], // node value, cost of atatck, timerequired
			cost: this.nodevalues[1],
			timerequired: this.nodevalues[2],
			possessioncounter : 0,
			publicnodes : [0,1,2,3,4,5], 

			previous_class : '',
			nodetimer : 0,

			prevclass : '', // reset this in every round
			nomoveallowed : false,
			classObject : {

				  public:  this.cla[0],
  				  normal: 	this.cla[1],
  				  possible:  this.cla[2],
				  attacked:   this.cla[3],
				  tentative_attacked : false
				
			},

			nodenames: ["A", "B", "C", "D", "E", "PASS"],
		
			styleObjectValue : {

				 width : (8*this.nodevalues[0]) + '%',
				 height : '10px'
				
			},

			styleObjectCost : {

				 width : (8*this.nodevalues[1]) + '%',
				 height : '10px'
				
			},

			styleObjectTime : {

				 width : this.nodetimer + '%',
				 height : '10px'
				
			},





		};
	},



	computed : {


		classobject: function()
		{
			return this.classObject
		},


		styleobjectValue : function()
		{
			return this.styleObjectValue;
		},

		styleobjectCost : function()
		{
			return this.styleObjectCost;
		},

		styleobjectTime : function()
		{
			return this.styleObjectTime;
		}


		



	},


	methods: {

		mouseMove(e)
		{
			//console.log(' mouse move on node '+ this.id + ' ....'+ e.pageX);
			//save to DB
			var vm = this;

			EventListeners.$emit('mouseon',vm.id, e.pageX, e.pageY);

		}, 

		tentativeattack() {


			var vm = this;

			// this is attacker's move
			// emit an event that attacker made a move
			// in the parent only update the move as tentative



			if(vm.nomoveallowed==false)
			{

				if(vm.classObject.public == true || vm.classObject.possible==true || vm.classObject.tentative_attacked == true || vm.classObject.attacked==true)
				{

					EventListeners.$emit('change-to-tentative',vm.id);

					if(vm.classObject.possible==true || vm.previous_class === '')
					{
						vm.previous_class = 'possible';
					}
					else if(vm.classObject.attacked==true || vm.previous_class === '')
					{
						vm.previous_class= 'attacked';
					}
					else if(vm.classObject.public==true || vm.previous_class === '')
					{
						vm.previous_class = 'public';
					}
					else if(vm.classObject.normal==true || vm.previous_class === '')
					{
						vm.previous_class = 'normal';
					}

					var timenow = Date.now();

					EventListeners.$emit('attackerMovedtentative', vm.id, vm.neighbors, timenow);
				}
				else
				{
					//console.log('Need to attack public or possible or tentative nodes');

				}
			}

			

		},




		isPublic(id){



			var vm = this;

			for(var i=0;i< vm.publicnodes.length; i++)
			{
				if(vm.publicnodes[i]==id)
				{
					return true;
				}
			}
			return false;

		},

		savePrevClass(){

			var vm = this;

			if(vm.classObject.possible==true)
			{
				vm.prevclass = 'possible';
			}
			else if(vm.classObject.attacked==true)
			{
				vm.prevclass = 'attacked';
			}
			else if(vm.classObject.public==true)
			{
				vm.prevclass = 'public';
			}
			else if(vm.classObject.normal==true)
			{
				vm.prevclass = 'normal';
			}
			




		}


	},

	created()

	{
		var vm = this;

		EventListeners.$on('reset-prev-class', function(id)
		{
				

				vm.prevclass = '';
		});


		EventListeners.$on('set_nomoveallowed', function(val){
			

			vm.nomoveallowed = val;
		});





		EventListeners.$on('sendtimer', function(time)
			{
				vm.nodetimer = (vm.nodevalues[2]/time)*100;
				vm.styleObjectTime.width = vm.nodetimer + '%';
				console.log('nodetimer '+ vm.nodetimer);
			});


		EventListeners.$on('restore-previous-class', function(id)
		{
				

				
				if(vm.id == id)
				{
					console.log('restore-previous-class '+ vm.previous_class + ' id '+ id);
					vm.classObject.tentative_attacked = false;
					if(vm.previous_class == 'attacked')
					{
						vm.classObject.attacked = true;

					}
					else if(vm.previous_class == 'possible' && vm.isPublic(vm.id)!=true)
					{
						vm.classObject.possible = true;

					}
					else if(vm.isPublic(vm.id)==true)
					{
						vm.classObject.public = true;

					}
					else if(vm.previous_class == 'normal')
					{
						vm.classObject.normal = true;

					}
				}

				//vm.prevclass = '';
		});



		EventListeners.$on('change-to-tentative', function(id){

			// this node is clicked for tentative attack

			if(vm.nomoveallowed==false)
			{


				if(vm.id==id)
				{
					vm.savePrevClass();
					vm.classObject.tentative_attacked = true;
					if(vm.prevclass == 'attacked')
					{
						vm.classObject.attacked = false;

					}
					else if(vm.prevclass == 'possible')
					{
						vm.classObject.possible = false;

					}
					else if(vm.prevclass == 'public')
					{
						vm.classObject.public = false;

					}
					else if(vm.prevclass == 'normal')
					{
						vm.classObject.normal = false;

					}
					


				}
				
				if(vm.classObject.tentative_attacked==true && vm.id != id)
				{
					vm.classObject.tentative_attacked = false;
					if(vm.prevclass == 'attacked')
					{
						vm.classObject.attacked = true;

					}
					else if(vm.prevclass == 'possible')
					{
						vm.classObject.possible = true;

					}
					else if(vm.prevclass == 'public')
					{
						vm.classObject.public = true;

					}
					else if(vm.prevclass == 'normal')
					{
						vm.classObject.normal = true;

					}

				}
			}



		});


		EventListeners.$on('change-to-normal', function(idd){


			// if this event id mean to be for the id
			if(vm.id == idd)
			{
				

				//console.log('on change-to-normal event....node '+ idd);
				// change color if not public 
				//if(vm.classObject.public != true)
				//{
					
					if(vm.isPublic(vm.id)==true)
					{
						vm.classObject.public = true;
						vm.previous_class = 'public';
					}
					else
					{
						vm.classObject.normal = true;
						vm.previous_class = 'normal';

					}
					
					vm.classObject.attacked = false;
					vm.classObject.possible = false;
					vm.classObject.tentative_attacked = false;
				//}


				

				// change owner
				vm.owner = 0;

				// reset the possessioncounter
				vm.possessioncounter = 0;

			}

		});





		EventListeners.$on('defender-change-to-normal', function(idd){


			// if this event id mean to be for the id
			if(vm.id == idd)
			{

				console.log('on defender-change-to-normal event....node '+ idd);
				// change color if not public 
				//if(vm.classObject.public != true)
				//{
					//if(vm.id==vm.publicnodes[0])
					//{
					//	vm.classObject.public = true;
					//}
					//else
					//{
					//	vm.classObject.normal = true;

					//}
					
					//vm.classObject.attacked = false;
					//vm.classObject.possible = false;
				//}


				

				// change owner
				vm.owner = 0;

				// reset the possessioncounter
				vm.possessioncounter = 0;

			}

		});



		EventListeners.$on('change-to-attacked', function(idd){


			

			// if this event id mean to be for the id
			//console.log('here i am .....fcuk u ######### this-id '  +vm.id + ' idd '+ idd);
			if(vm.nodevalue == 0 )
			{
				vm.classObject.normal = false;
				vm.classObject.attacked = false;
				vm.classObject.possible = false;
				vm.classObject.public = true;
				vm.classObject.tentative_attacked = false;
			}
			else if(vm.id == idd )
			{
				vm.previous_class = 'attacked';
				console.log('change-to-attacked event....node '+ idd);
				// change color if not public 
				//if(vm.classObject.public != true)
				//{
					vm.classObject.normal = false;
					vm.classObject.attacked = true;
					vm.classObject.possible = false;
					vm.classObject.public = false;
					vm.classObject.tentative_attacked = false;
				//}


				

				// change owner
				vm.owner = 1;

				// reset the possessioncounter
				//vm.possessioncounter = 0;

			}

		});


		


		EventListeners.$on('collectpoints', function(attackeraction){

			

			console.log('ON...... event   collectpoints');
			console.log( 'id: '+vm.nid+' vm.possessioncounter '+ vm.possessioncounter + ' owner '+ vm.owner);

			if(vm.id==attackeraction && (attackeraction!==""))
			{
				console.log('emitting event returningpoint from '+vm.id + ', value '+ (-vm.cost));

				EventListeners.$emit('returningpoint', (-vm.cost), vm.id);
			}


			if(vm.possessioncounter < vm.timerequired 
			&& vm.owner==1 && vm.classObject.attacked==true) // else if possessioncounter >= 0, and owner is attckr then just increment the possessioncounter
			{
				vm.possessioncounter += 1;
				console.log('Incrmenting possessioncounter to ' + vm.possessioncounter  + ', node  '+ vm.id);
			}


			if((vm.possessioncounter==vm.timerequired) 
			&& vm.owner==1 && vm.classObject.attacked==true) // owner is attckr
			{
				// reset the counter
				vm.possessioncounter = 0;
				// emit event returningpoint

				console.log('emitting event returningpoint from '+vm.id + ', value '+ vm.nodevalue);

				EventListeners.$emit('returningpoint', vm.nodevalue, vm.id);

			} 




		});


		

		
		





	}


});










	new Vue({

	
	el:"#app2",


	data : {
		//props : ['user_id'],
		//user_id : '',
		nodenames: ["A", "B", "C", "D", "E","PASS"],
		attacker_perround_cost : 0,
		attacker_perround_gain : 0,
		defender_sequence : '',
		attacker_sequence : '',
		pointscollected : false,
		starttime : '',
		currentroundstarttime : '',
		attacker_tentative_move : '', // reset the variable when you start a round
		tentative_time_attacker_moved : '', 
		attackerconfirmedmoved : false,
		returndata : '',
		datetime : '',
		TIME_LIMIT : 15,
		ROUND_LIMIT : 5,
		timer : 15,
		numberofround : 1,
		attackermoved : false,
		defendermoved: false,
		attackerpoints : 0,
		attackeraction : '',
		msgtoplayer : 'Click start',
		currentattackset : [], 
		possibleattackset : [0,1,2,3,4,5], // initially only the public nodes
		public : [0,1,2,3,4,5],
		newattackneighbors : [], // need to be resetted in every round
		adjacencymatrix : [
					
					[0, 1, 1, 0],
					[1, 0, 1, 1],
					[1, 1, 0, 1],
					[0, 1, 1, 0]
		],

		defenderteststrategy : [0,2,0],
		round_start_time : [0, 15000, 30000, 45000, 60000, 75000],
		defenderaction : '',
		defstrategycounter : 0, 

		//user_id : '',

		gamehistory : {


			gameid : 1,
			userid : window.user_id,
			defender_action : '',
			attacker_action : '',
			time_defender_moved : '',
			time_attacker_moved : '',
			defender_points : 0,
			attacker_points : 0



		},

		eyeCord : {
			left: 20 + 'px',
			top: 20 + 'px',
			'z-index' : 1
		},

		timenow : '',
		timenow2 : '',






	},



	methods : {




			loadconfig: function()
			{

			},

			gotonextgame: function()
			{
				//window.location.href = "http://127.0.0.1:8000/games/1/"+ window.defordertype; 
				window.location.href = "http://cyberpsycho.cs.utep.edu/games/1/"+ window.defordertype; 
				//window.location.href = "http://129.108.156.42/games/1/"+ window.defordertype;

			},


			 momentt: function (date) 
			 {

     			 return moment(date);
   			 },


			date: function (date) 
			{
	      		return moment(date).toISOString().slice(0, 19).replace('T', ' ');
	   		},

	   		saveGameInItToDB: function()
	   		{
	   			var vm = this;

	   			axios.post('/gamehistory/saveinit', {
	   				user_id : window.user_id,
	   				game_id : vm.gamehistory.gameid,
	   				start_time : vm.starttime

	   			}).then(response => this.returndata = response.data);


	   		},


	   		saveToDataBase: function()
	   		{
	   			var vm = this;

	   			if(vm.defenderaction === '' && vm.defendermoved==false)
	   			{
	   				vm.makeDefenderMove();
	   			}
	   			console.log('*********** DB   vm.defendermoved  '+ vm.defendermoved);
	   			var def_tmp =  (vm.gamehistory.time_defender_moved - vm.starttime); 
	   			console.log('*********** saving in history database vm.gamehistory.defender_action '+ vm.defenderaction);
	   			var def_tmp =  (vm.gamehistory.time_defender_moved - vm.starttime); 
	   			var def_move_time = vm.giveAdjustedTime(def_tmp);

	   			var attckr_tmp = (vm.gamehistory.time_attacker_moved - vm.starttime);
	   			var attckr_move_time = vm.giveAdjustedTime(attckr_tmp);
	   			vm.gamehistory.attacker_action = vm.attackeraction;

	   			if(vm.gamehistory.attacker_action==='')
	   			{
	   				attckr_move_time = '';
	   			}



	   			var gain = "";
	   			var cost = "";

	   			if(vm.attacker_perround_gain >0 )
	   			{
	   				gain += ", gained (+"+vm.attacker_perround_gain+")pts, ";
	   			}
	   			if(vm.attacker_perround_gain===0)
	   			{
	   				gain += ", ";
	   			}
	   			if(vm.attacker_perround_cost<0)
	   			{
	   				cost += "lost ("+vm.attacker_perround_cost+")pts, ";
	   			}



	   			

	   			var d_act = "";

	   			if(vm.defenderaction == 5)
	   			{
	   				d_act += "defender PASSED"
	   			}
	   			else
	   			{
	   				d_act += "defender defended node "+ vm.nodenames[vm.defenderaction];
	   			}

	   			if(vm.gamehistory.attacker_action < 5 && vm.gamehistory.attacker_action!== '')
	   			{
	   				$('<p style="font-size: 70%;">Round '+vm.numberofround +': <span style="color: red"> You attacked node '+vm.nodenames[vm.gamehistory.attacker_action]+gain+cost+'</span> <span style="color: green">'+d_act+'</span></p>').appendTo('#log');
	   			}
	   			else if(vm.gamehistory.attacker_action == 5)
	   			{
	   				$('<p style="font-size: 70%;">Round '+vm.numberofround +': <span style="color: red">You PASSED ' +gain+cost+'</span> <span style="color: green">'+d_act+'</span></p>').appendTo('#log');
	   			}
	   			else
	   			{
	   				$('<p style="font-size: 70%;">Round '+vm.numberofround +': <span style="color: red">You attacked NONE '+gain+cost+'</span> <span style="color: green">'+d_act+'</span></p>').appendTo('#log');
	   			}


	   			vm.attacker_perround_cost = 0;
	   			vm.attacker_perround_gain = 0;



	   			if(vm.defender_sequence ==="")
	   			{
	   				vm.defender_sequence = vm.defenderaction;
	   			}
	   			else
	   			{
	   				vm.defender_sequence = vm.defender_sequence + ","+vm.defenderaction;
	   			}

	   			if(vm.attacker_sequence === "")
	   			{
	   				vm.attacker_sequence = vm.attackeraction;
	   			}	
	   			else if(vm.attackeraction < 5 && vm.attackeraction!== '')
	   			{
	   				vm.attacker_sequence = vm.attacker_sequence+ ","+vm.attackeraction;
	   			}
	   			else 
	   			{
	   				vm.attacker_sequence = vm.attacker_sequence+",5";
	   			}
	   			






	   			axios.post('/gamehistory/save', {
	   				user_id : window.user_id,
	   				gameid : vm.gamehistory.gameid,
	   				round : vm.numberofround,
	   				defender_action : vm.defenderaction,
	   				attacker_action : vm.gamehistory.attacker_action,
	   				time_defender_moved : def_move_time,
	   				time_attacker_moved : attckr_move_time,
	   				defender_points : vm.gamehistory.defender_points,
	   				attacker_points : vm.attackerpoints

	   			}).then(response => this.returndata = response.data);
	   		},

	   		giveAdjustedTime: function(time)
	   		{
	   			var vm = this;

	   			//console.log('tttttttttttt round '+ vm.numberofround + ' time >>>>> '+ time);

	   			var time2 = vm.round_start_time[(vm.numberofround-1)] + time ;

	   			//console.log('tttttttttttt round '+ vm.numberofround + ' time2 >>>>> '+ time2); 

	   			if(vm.numberofround< vm.ROUND_LIMIT)
	   			{
	   				if(time2 >  vm.round_start_time[(vm.numberofround+1)])
	   				{
	   					time2 = vm.round_start_time[(vm.numberofround+1)] - 100;  
	   				}
	   			}

	   			

	   			if(time2< 0)
	   			{
	   				time2 = '';
	   			}

	   			//console.log('tttttttttttt round '+ vm.numberofround + ' time2 >>>>> '+ time2); 

	   			return time2;

	   		},


	   		saveToDataBaseTentative: function()
	   		{
	   			var vm = this;

	   			if(vm.defenderaction === '')
	   			{
	   				vm.makeDefenderMove();
	   			}



	   			var def_tmp =  (vm.gamehistory.time_defender_moved - vm.starttime); 
	   			var def_move_time = vm.giveAdjustedTime(def_tmp);

	   			var attckr_tmp = (vm.gamehistory.time_attacker_moved - vm.starttime);
	   			var attckr_move_time = vm.giveAdjustedTime(attckr_tmp);
	   			

	   			//
	   			//console.log('*********** saving in database');
	   			console.log('*********** saving in tentative database vm.gamehistory.defender_action '+ vm.defenderaction);
	   			axios.post('/gamehistory/savetentative', {
	   				user_id : window.user_id,
	   				gameid : vm.gamehistory.gameid,
	   				round : vm.numberofround,
	   				defender_action : vm.defenderaction,
	   				attacker_action : vm.gamehistory.attacker_action,
	   				time_defender_moved : def_move_time,
	   				time_attacker_moved : attckr_move_time,
	   				defender_points : vm.gamehistory.defender_points,
	   				attacker_points : vm.attackerpoints

	   			}).then(response => this.returndata = response.data);

	   		},

	   		saveEyeCordToDB(pageX, pageY)
	   		{
	   			var pageCoords = "( " + pageX + ", " + pageY + " )";
	   			
	   			var vm = this;


	   			var def_tmp =  moment(Date.now()).valueOf() - vm.starttime; 
	   			var mousetime = vm.giveAdjustedTime(def_tmp);

	   			//console.log(pageCoords + ' '+ mousetime);

	   			axios.post('/gamehistory/saveeye', {
	   				user_id : window.user_id,
	   				game_id : vm.gamehistory.gameid,
	   				round : vm.numberofround,
	   				timer : mousetime,
	   				eye_x : pageX,
	   				eye_y : pageY


	   			}).then(response => this.returndata = response.data);

	   		},

	   		saveMouseCordToDB(pageX, pageY)
	   		{
	   			var pageCoords = "( " + pageX + ", " + pageY + " )";
	   			
	   			var vm = this;


	   			var def_tmp =  moment(Date.now()).valueOf() - vm.starttime; 
	   			var mousetime = vm.giveAdjustedTime(def_tmp);

	   			//console.log(pageCoords + ' '+ mousetime);

	   			axios.post('/gamehistory/savemouse', {
	   				user_id : window.user_id,
	   				game_id : vm.gamehistory.gameid,
	   				round : vm.numberofround,
	   				timer : mousetime,
	   				mouse_x : pageX,
	   				mouse_y : pageY


	   			}).then(response => this.returndata = response.data);

	   		},

	   		saveMouseOnNodeToDB(nodeid, pageX, pageY)
	   		{
	   			var pageCoords = "( " + pageX + ", " + pageY + " )";
	   			
	   			var vm = this;


	   			var def_tmp =  moment(Date.now()).valueOf() - vm.starttime; 
	   			var mousetime = vm.giveAdjustedTime(def_tmp);

	   			//console.log(pageCoords + ' '+ mousetime);

	   			axios.post('/gamehistory/savemouseonnode', {
	   				user_id : window.user_id,
	   				game_id : vm.gamehistory.gameid,
	   				node_id : nodeid,
	   				round : vm.numberofround,
	   				timer : mousetime,
	   				mouse_x : pageX,
	   				mouse_y : pageY


	   			}).then(response => this.returndata = response.data);

	   		},


	 


	   		confirmAttack : function()
	   		{
	   			var vm = this;
	   			// TODO
	   			// work with all necessary avriables
	   			// set the attcker move
	   			// set defender move
	   			if(vm.attacker_tentative_move !== '')
			     {
			      	
			      		

			      	EventListeners.$emit('attackerMovedconfirmed', vm.attacker_tentative_move, vm.newattackneighbors, moment(Date.now()).valueOf());
			      }
	   			

	   		},


			startTimer : function()
			{
				var vm = this
	      		var timer = null
	      		vm.timer = vm.TIME_LIMIT

	      		

	      		var now = Date.now();
	      		vm.starttime = moment(now).valueOf();

	      		//var now2 = Date.now();
	      		
	      		//var timenow2 = moment(now2).valueOf();


	      		//console.log('game started on '+ (timenow2 - timenow));


	      		
	      		vm.saveGameInItToDB();
	      		vm.msgtoplayer = 'Move before timer goes down to 0';
	      		$("#nodebuttons").removeClass("disable");
	      		$("#nodebuttons").removeClass("visible");
	      		$("#startbutton").addClass("disable");
	      		$("#startbutton").addClass("visible");
	      		$("#confirmbutton").removeClass("visible");

	      		$('#app2').mousemove(function(e){
	      		  
	      		 // vm.saveMouseCordToDB(e.pageX, e.pageY);
	      		});


	      		console.log('userid ************ '+ vm.gamehistory.userid);








	      		EventListeners.$emit('sendtimer', vm.timer);


	      		var now = Date.now();

	      		vm.timenow = moment(now).valueOf();
	      		

	      		timer = setInterval(function() 
	      		{

	      			console.log('Round ****************** '+ vm.numberofround);

	      			//vm.pointscollected = false;

	      			

	      			if(vm.timer==vm.TIME_LIMIT)
			      	{
			      		if(vm.defenderaction === '')
			      		{
			      			vm.makeDefenderMove();
			      		}
			      	}

			      	if(vm.timer==0 && vm.numberofround==vm.ROUND_LIMIT)
			        {

			        	//vm.timer = 'Done...!'
			        	//EventListeners.$emit('last-round-update');
			        	if(vm.pointscollected==false)
			        	{
			        		console.log('calling collectpoints from last round 66666666666 ');
			        		//EventListeners.$emit('collectpoints');
			        	}
			        	vm.msgtoplayer = 'Game End';
			        	console.log('Game end , numberofround ' + vm.numberofround);
			        	$("#startbutton").addClass("disable");
			        	$("#confirmbutton").addClass("disable");

			        	$("#nodebuttons").addClass("disable");


			        	if(window.done === 'yes')
			        	{

			        		$('#nextbutton').removeClass("visible");
			        		$('#nextbutton').removeClass("disable");
			        	}
			        	else
			        	{
			        		$('#nextgamebutton').removeClass("visible");
			        		$('#nextgamebutton').removeClass("disable");
			        	}


			        	$("#confirmbutton").addClass("visible");


			        	console.log("Def seq : "+ vm.defender_sequence);
			        	console.log("Attckr seq : "+ vm.attacker_sequence);



			          	return clearInterval(timer)

			        }

			        vm.pointscollected = false;
			        
			        

			      	if(vm.timer>0)
			        {
			      		vm.timer -= 1;
			      		
			      		

			      	}

			      	if(vm.attacker_tentative_move !== '' && vm.timer<=12)
			      	{
			      		$("#confirmbutton").removeClass("disable");
			      	}

			      	
			      	if(vm.timer <= 1)
			      	{
			      		EventListeners.$emit('set_nomoveallowed', true);
			      	}

			      	if(vm.timer == 0 && vm.numberofround <= vm.ROUND_LIMIT) 
			      	{
			      		console.log('>>>>>>>>> vm.attacker_tentative_move '+ vm.attacker_tentative_move );

			      		if(vm.attacker_tentative_move !== '')
			      		{
			      			
			      			
			      			//EventListeners.$emit('attackerMovedconfirmed', vm.attacker_tentative_move, vm.newattackneighbors, vm.tentative_time_attacker_moved);
			      		}
			      		else
			      		{
				      		//console.log('checking exit conditionss &&&&&&&&&&&&&&&&&&');
				        	//vm.timer = 'wait...!';
				        	EventListeners.$emit('checkExitCondition');
			        	}
			            //return clearInterval(timer)
			        }

			      	console.log('vm.defendermoved '+vm.defendermoved + ', vm.attackermoved '+ vm.attackermoved);


			      	if((vm.defendermoved==true && vm.attackermoved==true) || (vm.attacker_tentative_move !== '' && vm.timer==0))
			      	{

			      		// the attack is possible if it's inside possivle attack set

			      		$("#nodebuttons").addClass("disable");
			      		if(vm.timer==0)
			      		{
			      			vm.attackermoved = true;
							//console.log('attackermoved is set to ' + vm.attackermoved );
							vm.attackeraction = vm.attacker_tentative_move;
							//vm.newattackneighbors = neighbors; 

							// what should I do ? tentative move or when time runs out ?
							vm.gamehistory.time_attacker_moved = moment(Date.now()).valueOf();//vm.date(Date.now());//(vm.tentative_time_attacker_moved);
							vm.gamehistory.attacker_action = vm.attacker_tentative_move;
			      		}

			      		
			      		vm.gamehistory.defender_action = vm.defenderaction;
			      		vm.gamehistory.attacker_action = vm.attackeraction;



			      		var possibleindex = vm.isInPossibleAttackSet(vm.possibleattackset, vm.attackeraction);
			      		var attackindex = vm.isInAttackSet(vm.currentattackset, vm.attackeraction);

			      		console.log('hereeeeeeeeeee 1 '+ possibleindex + '   '+ attackindex);
			      		if(possibleindex > -1 || attackindex > -1)
			      		{


							vm.attackermoved = false;
							vm.defendermoved = false;

							console.log('hereeeeeeeeeee 2');
							
				      		EventListeners.$emit('bothmoved',vm.defenderaction, vm.attackeraction);
				      		
			      		}
			      		else
			      		{
			      			//console.log('Invalid attack ##########');

			      		}
			      		console.log('hereeeeeeeeeee 3');
			      		
			      	}


			      	
			      

		      
		      }, 1000)

			},


			//checks whether the attacked 
			isInPossibleAttackSet : function(possibleattackset, attackeraction)
			{
				
				for(var i =0; i<possibleattackset.length; i++)
				{
					//console.log('innnn ******* i '+ i);
					if(possibleattackset[i] == attackeraction)
					{
						//console.log('found '+attackeraction+' in possible attack set ');
						return i;
					}
				}
				//console.log('didnt found '+attackeraction+' in possible attack set ');
				return -1;

			},


			//checks whether the attacked 
			isInAttackSet : function(attackset, attackeraction)
			{
				for(var i=0; i<attackset.length; i++)
				{
					if(attackset[i] == attackeraction)
					{
						//console.log('found '+attackeraction+' in  attack set ');
						return i;
					}
				}
				//console.log('didnt found '+attackeraction+' in  attack set ');
				return -1;

			},


			defenderBHVRLStrategy : function()
			{
				var vm = this;

				// axios request server for strategy 
				var def_ac = -1;


				console.log('9999999999999   defender defenderBHVRLStrategy... ' + vm.timer);


				axios.get('/defstrategyfullinfo', {
				    params: {
				      numberofround: vm.numberofround,
				      defender_sequence: vm.defender_sequence,
				      attacker_sequence: vm.attacker_sequence
				    }
				  })
				  .then(function (response) {
				   // console.log(response);
				    console.log("lalalalalalala got response "+response.data["way"]);
				    vm.defenderaction = response.data["def_strat"];
				    vm.gamehistory.time_defender_moved = moment(Date.now()).valueOf();//vm.date(Date.now());
				     //vm.defenderaction = defaction;
				     console.log('Defender action maximizing $$$$$$$$ action '+ vm.defenderaction);
				    // console.log('defendermoved is ' + vm.defendermoved );
				    vm.defendermoved = true;
				    
				  })
				  .catch(function (error) {
				    console.log(error);
				  });

				  //return def_ac;


				 
				



			},



			// function to make a move for defender
			makeDefenderMove : function()
			{

				var vm = this;
				var defaction = 5;
				//console.log('1111111111   defender moved.... timer ' + vm.timer);

				if(window.defendertype === 0) //random
				{
					//console.log('1111111111   defender random move.... timer ' + vm.timer);
					defaction = vm.defenderteststrategy[vm.defstrategycounter];
					if(vm.defenderteststrategy.length>vm.defstrategycounter)
					{
						vm.defstrategycounter += 1;
					}
					vm.gamehistory.time_defender_moved = moment(Date.now()).valueOf();//vm.date(Date.now());
					 vm.defenderaction = defaction;
					 console.log('Defender action random %%%%%%% '+ vm.defenderaction + ' counter  '+ vm.defstrategycounter);
					// console.log('defendermoved is ' + vm.defendermoved );
					vm.defendermoved = true;
				}
				else if(window.defendertype === 1) // maximizing expected utility
				{
					console.log('1111111111   defender maximizing move.... timer ' + vm.timer);
					vm.defenderBHVRLStrategy();	

				}


				 
				//console.log('defendermoved is set to ' + vm.defendermoved );


			},


			// after both players move we need to update the 
			// currentattackset, possibleattackset
			// also removes defender action from the attackset 
			updateAttackSets: function()
			{
				var vm = this;

				// a) update attack set

				var attacksetindex = vm.isInAttackSet(vm.currentattackset, vm.attackeraction);

				if(attacksetindex == -1)
				{
					vm.currentattackset.push(vm.attackeraction);
				}

				// remove attacker action from possibleattackset
				var indx = vm.isInPossibleAttackSet(vm.possibleattackset, vm.attackeraction);
				if(indx > -1)
				{
					vm.possibleattackset.splice(indx, 1);
				}


				

				
				// b) update possible attack set 
				var index = vm.isInPossibleAttackSet(vm.possibleattackset, vm.defenderaction);

				if(index == -1)
				{
					vm.possibleattackset = vm.possibleattackset.concat(vm.defenderaction);
				}

				





				


				

				// c) remove defender action from attack set
				// find the index of the element
				var index = vm.isInAttackSet(vm.currentattackset, vm.defenderaction);
				
				var foundinattackset = false;

				if(index > -1 )
				{
					foundinattackset = true;
					//console.log('removing node '+ vm.defenderaction + ' index '+ index);
					vm.currentattackset.splice(index, 1);
					//console.log(' $$$$$$$ Current attack set ');
					for (var i = 0; i <vm.currentattackset.length ; i++) 
					{
		    			//console.log(vm.currentattackset[i] + ' ');
					}

				}
				else
				{
					//console.log('defender action is not in current attack set ');
				}


				//console.log(' $$$$$$$ Current attack set ');
				for (var i = 0; i <vm.currentattackset.length ; i++) 
				{
		    		//console.log(vm.currentattackset[i] + ' ');
				}

				return foundinattackset;

			},



			hasAttackNeighbor: function(attackset, defenderaction)
			{
				var vm = this;

				for(var i=0; i<vm.adjacencymatrix[defenderaction].length; i++)
				{
					if(vm.adjacencymatrix[defenderaction][i]==1)
					{

						var hasneighbor = vm.isInAttackSet(attackset, i);
						if(hasneighbor > -1)
						{
							return true;
						}
					}
				}
				return false;
			},

			// make the nodes to normal where defender made move
			// also make the possible nodes to normal if it's a neighbor of defender action
			updateDefenderNeighbors : function()
			{

				var vm = this;

				// ALso we need to update the possible attackset
				//for every neighbor of defender action
				for(var j=0; j<vm.adjacencymatrix[vm.defenderaction].length; j++)
				{
					if(vm.adjacencymatrix[vm.defenderaction][j]==1) // if there is an edge
					{
						var neighbor = j;

						// first check if it;s in possible atatckset


						var possibleindex = vm.isInPossibleAttackSet(vm.possibleattackset, neighbor);

						if(possibleindex > -1)
						{
							//console.log('neighbor ' + neighbor + ' is in possibleattackset ');
							//console.log('need to update as normal ifffffff  doesnt have any neighbor in attackset');
							// check if neighbor has any neighbor who is in attackset

							var neighborhasattacksetneighbor = false;

							for(var k=0; k<vm.adjacencymatrix[neighbor].length; k++)
							{
								if(vm.adjacencymatrix[neighbor][k]==1)
								{
									var neineighbor = k;
									// check if neineighbor is in attackset
									var attackindex = vm.isInAttackSet(vm.currentattackset, neineighbor);
									if(attackindex > -1)
									{
										//console.log('%%%%% found neighbor of node '+ neineighbor + ' in attackset');
										//console.log('No need to update as normal it  has  neighbor  in atatckset');
										neighborhasattacksetneighbor = true;
										break;
									}
									
								}
							}
							if(!neighborhasattacksetneighbor)
							{	
								//console.log('%%%%% found no neighbor of node '+ neineighbor + ' in attackset');
								//console.log('need to update as normal it  has  neighbor  in atatckset');

								EventListeners.$emit('change-to-normal', neighbor);

								//console.log('removing node '+neighbor+' from possible attackset'); 

								vm.possibleattackset.splice(possibleindex, 1);

								//console.log(' $$$$$$$ possible attack set ');
								for (var i = 0; i <vm.possibleattackset.length ; i++) 
								{
					    			//console.log(vm.possibleattackset[i]);

								}



							}



						}
						else
						{
							//console.log('neighbor ' + neighbor + ' is not in possibleattackset ');
							//console.log('Dont need to update');
						}
					}
				}
			}



	

	},


	computed : {

		eyecord()
		{
			return this.eyeCord;
		} 

	},



	created () {



				



				//webgazer.begin();



			$("#nodebuttons").addClass("disable");
			$("#confirmbutton").addClass("disable");
			//$("#startbutton").removeClass("disable");


			var vm = this;


		//	webgazer.setGazeListener(function(data, elapsedTime) {
		//	    if (data == null) {
		//	        return;
		//	    }
			//    var xprediction = data.x; //these x coordinates are relative to the viewport 
		//	    var yprediction = data.y; //these y coordinates are relative to the viewport

		//console.log(' eye coords ************* '+ xprediction + ' '+ yprediction ); 
			    //elapsed time is based on time since begin was called
			    //vm.saveEyeCordToDB(xprediction, yprediction);
			    //vm.eyeCord.left = xprediction + 'px';
			   // vm.eyeCord.top = yprediction + 'px';



		//	}).begin();


			



			//load the configurations
			axios.get('/config').then(function(response){

				console.log(response.data);
				
				vm.TIME_LIMIT = response.data['TIME_LIMIT'];
				vm.ROUND_LIMIT = response.data['ROUND_LIMIT'];
				vm.timer = response.data['timer'];
				var rand_defenderteststrategy = response.data['rand_defenderteststrategy'];
				var max_defenderteststrategy = response.data['max_defenderteststrategy'];
				vm.possibleattackset = response.data['possibleattackset'].split(",");
				vm.public = response.data['public'].split(",");


				// round_start_time
				for(var i=0; i<vm.ROUND_LIMIT; i++)
				{
					if(i==0)
					{
						vm.round_start_time[i] = 0;
					}
					else
					{
						vm.round_start_time[i] = vm.round_start_time[i-1] + (vm.TIME_LIMIT*1000)
					}
				}




				console.log('TIME_LIMIT: '+ vm.TIME_LIMIT);
				console.log('ROUND_LIMIT: '+ vm.ROUND_LIMIT);
				console.log('vm.timer: '+ vm.timer);
				console.log('rand_defenderteststrategy: '+ rand_defenderteststrategy);
				console.log('max_defenderteststrategy: '+ max_defenderteststrategy);
				console.log('vm.possibleattackset: '+ vm.possibleattackset);
				console.log('vm.timer: '+ vm.timer);
				console.log('vm.public: '+ vm.public);
				console.log('vm.round_start_time: '+ vm.round_start_time);



				if(window.defendertype===0)// random
				{
					//vm.defenderteststrategy = [0,2,0];
					vm.defenderteststrategy = rand_defenderteststrategy.split(",");
				}
				else if(window.defendertype===1) // maximize expected utility
				{
					//vm.defenderteststrategy = [3,4,2];
					vm.defenderteststrategy = max_defenderteststrategy.split(",");
				}

				console.log('vm.defenderteststrategy: '+ vm.defenderteststrategy);

			});





			vm.datetime = vm.date(Date.now());


			EventListeners.$on('mouseon', function(nodeid, x, y)
			{
				//console.log('node '+ nodeid + ' x:'+x+ ', y:'+y);
				//vm.saveMouseOnNodeToDB(nodeid, x, y);

			});


			EventListeners.$on('checkExitCondition', function()
			{



				//console.log('checking exit condition...timer ' + vm.timer + ' vm.attackermoved  ' + vm.attackermoved );

				var foundinattackset = vm.isInAttackSet(vm.currentattackset, vm.defenderaction);
				if(foundinattackset==true)
				{
					EventListeners.$emit('change-to-normal', vm.defenderaction);
				}

				$("#nodebuttons").addClass("disable");



				console.log('calling collectpoints from checkExitCondition 66666666666666');
				if(vm.pointscollected==false)
				{
					EventListeners.$emit('collectpoints', vm.attackeraction);
				}


				vm.saveToDataBase();



				// reset gamehisotry variables
				// Is it necessary???

				vm.attacker_tentative_move = '';
				EventListeners.$emit('set_nomoveallowed', false);
				EventListeners.$emit('reset-prev-class', vm.attackeraction);

				// reset 
				if(vm.numberofround<vm.ROUND_LIMIT)
				{
					// reset the timer 
				    vm.timer = vm.TIME_LIMIT;
					vm.numberofround += 1;
				}
				//console.log('after collecting points ************** numberofround '+ vm.numberofround + ' timer '+ vm.timer);
				vm.attackeraction = '';
				vm.defenderaction = '';
				//vm.msgtoplayer = 'make a move before timer goes down to 0';

				$("#nodebuttons").removeClass("disable");
				$("#confirmbutton").addClass("disable");

				var now = Date.now();
	      		vm.starttime = moment(now).valueOf();



				// if attacker didn't move end the game
				if(vm.attackermoved == false && vm.timer==0)
				{

					//var now2 = Date.now();
					//vm.timenow2 = moment(now2).valueOf();
					//console.log('milliseconds passed '+ (vm.timenow2-vm.timenow));

					//vm.numberofround = vm.ROUND_LIMIT;
					//console.log(' Game end ...attacker didnt move' );
				}
				
		});



			EventListeners.$on('returningpoint', function(nodevalue, nodeid)
			{

				if(nodevalue<0)
				{
					vm.attacker_perround_cost += nodevalue;
				}
				else if(nodevalue>0) 
				{
					vm.attacker_perround_gain += nodevalue;
				}

				vm.attackerpoints += nodevalue;

				//console.log('received points '+ nodevalue + ' from node '+ nodeid);



			});


			EventListeners.$on('attackerMovedtentative', function(id, neighbors, tentative_time_attacker_moved)
			{


				// just update the tentative move
				//$("#confirmbutton").removeClass("disable");
				console.log('attacker tentative move '+ id)
				vm.attacker_tentative_move = id;
				vm.tentative_time_attacker_moved = moment(tentative_time_attacker_moved).valueOf();//vm.date(tentative_time_attacker_moved);

				//console.log('tttttttttt   attacker tentative attacked  node ' + id + ', tentative time' + vm.tentative_time_attacker_moved);
				//console.log('attacker_tentative_move is ' + vm.attacker_tentative_move );

				vm.attackeraction = id;
				vm.newattackneighbors = neighbors; 
				vm.gamehistory.time_attacker_moved = vm.tentative_time_attacker_moved;
				vm.gamehistory.attacker_action = id;


				vm.saveToDataBaseTentative();


			});




		// Event when attacker made a move and we need to set the attackermoved : true;

		EventListeners.$on('attackerMovedconfirmed', function(id, neighbors, time_attacker_moved){

			//console.log('222222222   confirming attack......attacker attacked  node ' + id );
			//console.log('attackermoved is ' + vm.attackermoved );
			
			vm.attackermoved = true;
			//console.log('attackermoved is set to ' + vm.attackermoved );
			vm.attackeraction = id;
			vm.newattackneighbors = neighbors; 
			vm.gamehistory.time_attacker_moved = time_attacker_moved;
			vm.gamehistory.attacker_action = id;
			

		});



		

		//event listener when both defender and atatcker completed their moves
		// handler for bothmoved
		EventListeners.$on('bothmoved', function(defenderaction, attackeraction){


			console.log('%%%%%%%%% bothmoved, defenderaction '+ defenderaction + ' attackeraction '+ attackeraction);
			//console.log('Timer is '+ vm.timer);
			vm.msgtoplayer = 'wait...';
			vm.timer = 0;
			//console.log('Timer is reset to '+ vm.timer);





			
			//TODO disable every button click or disable the whole div :D
			
			//$("#app2").addClass("disable");
			





			// save the data to the server
						

			// emit an event 
			

			if(vm.defenderaction != vm.attackeraction)
			{
					EventListeners.$emit('change-to-attacked', vm.attackeraction);
					// update the attack sets
					var foundinattackset = vm.updateAttackSets();

					//console.log('foundinattackset '+ foundinattackset);


					

					

					



					// dispatch an event to set the defender action as normal 
					// if the defender action(the node) was not normal already


					//var possibleindex = vm.isInPossibleAttackSet(vm.possibleattackset, vm.defenderaction);

					// if a defender action is in possible atack set we don't do anyt ing 
					// becasue it will still have a atatcked node as neigbor 

					
					if(foundinattackset)
					{
						
						

						EventListeners.$emit('change-to-normal', vm.defenderaction);
						
						// update defender action neighbor n
						// if  n has a neighbor in attackset then don't update
						// if n has no neigbor inatatckset then update to normal
						//console.log('@@@@@@ updating neighbors of defender action '+ vm.defenderaction);
						// we make a node normal if it's in atatck set
						// and make the neighbors of these nodes as normal if they don;t have any neighbor in attackset
						//vm.updateDefenderNeighbors();


					}
					else
					{
						// we don;t need to dispatch an event if defender action is not in attck set
						// if it's in possible atatckset that won't make any difference. 
						//console.log('defender action is not in attackset..So we dont need to update the graph ');
					}
			}
			else
			{
				EventListeners.$emit('restore-previous-class', vm.defenderaction);
			}
			


			// we need to dispatch event to collect points

			console.log('calling collectpoints from bothmoved 66666666666');
			EventListeners.$emit('collectpoints', vm.attackeraction);
			vm.pointscollected = true;


			
			//console.log('after collecting points ************** numberofround '+ vm.numberofround + ' timer '+ vm.timer);

			console.log(' $$$$$$$ Current attack set ');
			for (var i = 0; i <vm.currentattackset.length ; i++) 
			{
	    		console.log(vm.currentattackset[i] + ' ');
			}



			console.log(' $$$$$$$ possible attack set ');
			for (var i = 0; i <vm.possibleattackset.length ; i++) 
			{
				console.log(vm.possibleattackset[i]);

			}


			//save to database
			vm.saveToDataBase();



			// reset gamehisotry variables
			// Is it necessary???

			vm.attacker_tentative_move = '';
			EventListeners.$emit('set_nomoveallowed', false);
			EventListeners.$emit('reset-prev-class', vm.attackeraction);

			// reset 
			if(vm.numberofround<vm.ROUND_LIMIT)
			{
				// reset the timer 
			    vm.timer = vm.TIME_LIMIT;
				vm.numberofround += 1;
			}
			//console.log('after collecting points ************** numberofround '+ vm.numberofround + ' timer '+ vm.timer);
			vm.attackeraction = '';
			vm.defenderaction = '';
			vm.msgtoplayer = 'make a move before timer goes down to 0';

			$("#nodebuttons").removeClass("disable");
			$("#confirmbutton").addClass("disable");


			var now = Date.now();
	      	vm.starttime = moment(now).valueOf();


			






		});




	}


	

});




