<html>
<head>
<title>Countdown timer</title>

<script Language="JavaScript">

minutesToCount = 1;

function startclock() {

  if (minutesToCount!=0) {
    finalTime = new Date();
    minutesEnd = finalTime.getMinutes() + minutesToCount;
    finalTime.setMinutes(minutesEnd, finalTime.getSeconds(), finalTime.getMilliseconds());
    minutesToCount = 0;
  }

  currentTime = new Date();
  milliSecLeft = finalTime.getTime() - currentTime.getTime();
  currentTime.setTime(milliSecLeft);

  //Calculate and format the time elements
  minutes = currentTime.getMinutes();
  if (minutes < 1) { minutes = '0' + minutes; }
  seconds = currentTime.getSeconds();
  if (seconds < 1) { seconds = '0' + seconds; }
  milliseconds = currentTime.getMilliseconds();

  //Display the time left
  timeLeftText = minutes + ':' + seconds + ':' + milliseconds;
  document.getElementById('timeLeft').innerHTML = timeLeftText;

  //Recall the function if there is time left - or display end time
  if (milliSecLeft > 0) {
    setTimeout("startclock()",1);
  } else {
    document.getElementById('timeLeft').innerHTML = 'Time is up';
    showNuke();
  }
}

function showNuke() {
	var element = document.getElementById('nuke');
    element.style.display = 'block';
}

</script>

</head>

<body onLoad="">
<img style="display: none;" id="nuke" width="300" src="https://i.ytimg.com/vi/4R7pZOAWQrk/maxresdefault.jpg" />
<br>
  Time Left: <span id="timeLeft"></span>
<br><br>
<button onclick="startclock();">Start</button>
</body>

</html>