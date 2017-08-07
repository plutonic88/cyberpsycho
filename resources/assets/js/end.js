require('./bootstrap');


var vm = new Vue({
  el: '#comm',

  data: 
  {
    commentlength : 0,
    message : ''

  },

  methods : {

  	countchar(){
  		this.commentlength = this.message.length; 
  	} 

  }


})