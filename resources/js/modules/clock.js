function currentTime() {
	let date = new Date(); /* creating object of Date class */
	let hour = date.getHours();
	let min = date.getMinutes();
	let sec = date.getSeconds();
	let midday = "";

	/* Check if is afternoon */
	if (hour >= 12) {
		$('.clock').addClass('clock--afternoon');
	} else {
		$('.clock.clock--afternoon').removeClass('clock--afternoon');
	}

	hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour); /* assigning hour in 12-hour format */

	hour = updateTime(hour);
	min = updateTime(min);
	sec = updateTime(sec);

	document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

	let t = setTimeout(currentTime, 1000); /* setting timer */

	$('.clock').each(function() {
	  $(this).html($(this).text().replace(/([^\x00-\x80]|[\w!])/g, "<span class='letter'>$&</span>"));
	});
}

function updateTime(k) { /* appending 0 before time elements if less than 10 */
  if (k < 10) {
	return "0" + k;
  }
  else {
	return k;
  }
}

if ( $('.clock').length ) {
	currentTime();
}
