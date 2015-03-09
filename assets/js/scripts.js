$(function(){
	var timer;

	$('#start').click(function() {
		$("#saveDialog").fadeOut();
		timer = setInterval( updateTime, 100);
	});

	$('#stop').click(function(){
		clearInterval(timer);
		saveDialog();
		updateDisplay();
	});
});

var h = 0;
var m = 15;
var s = 0;
var ms = 0
function updateTime()
{
	++ms;
	if( ms == 10 )
	{
		ms = 0;
		++s;
	}
	if( s == 60 )
	{
		s = 0;
		++m;
	}
	if( m == 60 )
	{
		m = 0;
		++h;
	}
	updateDisplay();
}

function updateDisplay()
{
	$("#hours").html(h);
	$("#minutes").html(m);
	$("#seconds").html(s);
	$("#msecs").html(ms);
}

function clearTime(){ h = m = s = ms = 0; }

function saveDialog()
{
	$("#saveDialog").fadeIn();
	$('input[name="hours"]').val(getHours());
}

function getHours()
{
	return h + (Math.ceil(m/60 * 4) / 4).toFixed(2);
}