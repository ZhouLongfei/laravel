(function() {
	var pusher = new Pusher('430f556a15b28f8e0fd4',{cluster:'ap1'});
	var channel = pusher.subscribe('demoChannel');
	window.App={};
	App.Notifier=function(){
		this.notify=function(message){
			var template=Handlebars.compile($('#flash-template').html());
			$(template({ message: 'Hello World'})).appendTo('body').fadeIn(300);
		}
	};
	channel.bind('PostWasPublished',function(data){
		(new App.Notifier).notify(data.title);
		
	});
})();
