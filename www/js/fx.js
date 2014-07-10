function fx() {
	$("a.addfx").on("click", function(e){
			$(this).next().slideToggle();
			e.preventDefault();
	});
	liveTime();
	liveDay();
	function liveTime() {
	if (new Date().getHours() < 10)
		hours = "0" + new Date().getHours();
	else
		hours = new Date().getHours();
	if (new Date().getMinutes() < 10)
		minutes = "0" + new Date().getMinutes();
	else
		minutes = new Date().getMinutes();
	if (new Date().getSeconds() < 10)
		seconds = "0" + new Date().getSeconds();
	else
		seconds = new Date().getSeconds();
	document.getElementById("liveTime").innerHTML = hours + ":" + minutes + ":" + seconds;
	setTimeout(liveTime, 100);
	}
	function liveDay() {
	switch (new Date().getDay()){
		case 0:
			day = "воскресенье";
			break;
		case 1:
			day = "понедкльник";
			break;
		case 2:
			day = "вторник";
			break;
		case 3:
			day = "среда";
			break;
		case 4:
			day = "четверг";
			break;
		case 5:
			day = "пятница";
			break;
		case 6:
			day = "суббота";
			break;
	}
	switch (new Date().getMonth()){
		case 0:
			month = "января";
			break;
		case 1:
			month = "февраля";
			break;
		case 2:
			month = "марта";
			break;
		case 3:
			month = "апреля";
			break;
		case 4:
			month = "мая";
			break;
		case 5:
			month = "июня";
			break;
		case 6:
			month = "июля";
			break;
		case 7:
			month = "августа";
			break;
		case 8:
			month = "сентября";
			break;
		case 9:
			month = "октября";
			break;
		case 10:
			month = "ноября";
			break;
		case 11:
			month = "декабря";
			break;
	}
	document.getElementById("liveDate").innerHTML = "Сегодня " + day + "<br />" + (new Date().getDate()) + " " + month +  " " + (new Date().getFullYear()) + " года";
	}
}