function setSessionStartTime(duration=null){
    if(duration != null){
        startSession = $("#session_start_time").val();
        if (startSession !== "") {
          var startSessionHours = startSession.split(":")[0];
          var startSessionMinutes = startSession.split(":")[1];
          var todaysDate = new Date();
          todaysDate.setHours(startSessionHours);
          todaysDate.setMinutes(startSessionMinutes);
          var add_minutes = function (todaysDate, duration) {
        return new Date(todaysDate.getTime() + duration*60000);
        }
      return add_minutes(todaysDate, duration);
        }
    }else{
      setSessionStopTime();
    }
}

function setSessionStopTime() {
  startSession = $("#session_start_time").val();
  document.getElementById("session_stop_time").disabled = true;
  if (startSession) {
    var duration = $('#duration').val();
    var result = setSessionStartTime(duration)
    setSessionStopTimeValue(result);
  }
    }

    function setSessionStopTimeValue(time){
      time = new Date(time);
      sessionStopHours = time.getHours();
      sessionStopMinutes = time.getMinutes();
      
      // 0's are skipped in javascript, so prepending 0 for hours and minutes
      if(sessionStopMinutes.toString().length == 1){
        sessionStopMinutes = '0' + sessionStopMinutes;
      }
      if(sessionStopHours.toString().length == 1){
      sessionStopHours = '0' + sessionStopHours;
      }
      sessionStopValue = sessionStopHours + ':' + sessionStopMinutes;
      document.getElementById("session_stop_time").value = sessionStopValue;
      document.getElementById("session_stop_time").disabled = true;
    }

    function validateFields(){
      // Enable Session End Time before form submit
      document.getElementById("session_stop_time").disabled = false;
    }