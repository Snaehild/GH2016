(function() {

  var user_name, api_key, twitch_widget;
  
  user_name = "gamehaunt";
  api_key = "adyyz3ya3ko0smf08a91xv3vd7tjkmi";
  twitch_widget = $("#twitch-widget");

  twitch_widget.attr("href","http://gamehaunt.com/live/");

  $.getJSON('https://api.twitch.tv/kraken/streams/' + user_name + '?client_id=' + api_key + '&callback=?', function(data) {	
	  if (data.stream) {
		  twitch_widget.html("<img src='http://gamehaunt.com/online.jpg'></img></a>");
	  } else {
		  twitch_widget.html("<img src='http://gamehaunt.com/offline.jpg'></img></a>");
	  }  
  });

})();
