$(document).ready(function(){
	let target = $(document).find('.btc .c-stat__stat');
	$.ajax({
		dataType: "json",
		url: "https://api.coindesk.com/v1/bpi/currentprice/USD.json",
		success: function(data){
			target.text(data.bpi.USD.rate);
		}
	});
})