<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @-webkit-keyframes ball {
  0% {
    top: 50%;
    left: 0%;
  }
  20% {
    top: 25%;
    left: 25%;
  }
  30% {
    top: 50%;
    left: 50%;
  }
  40% {
    top: 75%;
    left: 75%;
  }
  50% {
    top: 50%;
    left: 100%;
  }
  60% {
    top: 75%;
    left: 75%;
  }
  70% {
    top: 50%;
    left: 50%;
  }
  80% {
    top: 25%;
    left: 25%;
  }
  100% {
    top: 50%;
    left: 0%;
  }
}
@keyframes ball {
  0% {
    top: 50%;
    left: 0%;
  }
  20% {
    top: 25%;
    left: 25%;
  }
  30% {
    top: 50%;
    left: 50%;
  }
  40% {
    top: 75%;
    left: 75%;
  }
  50% {
    top: 50%;
    left: 100%;
  }
  60% {
    top: 75%;
    left: 75%;
  }
  70% {
    top: 50%;
    left: 50%;
  }
  80% {
    top: 25%;
    left: 25%;
  }
  100% {
    top: 50%;
    left: 0%;
  }
}
@-webkit-keyframes raketes {
  0% {
    transform: translateY(0);
  }
  20% {
    transform: translateY(10%);
  }
  25% {
    transform: translateY(-30%);
  }
  50% {
    transform: translateY(0);
  }
  60% {
    transform: translateY(25%);
  }
  80% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes raketes {
  0% {
    transform: translateY(0);
  }
  20% {
    transform: translateY(10%);
  }
  25% {
    transform: translateY(-30%);
  }
  50% {
    transform: translateY(0);
  }
  60% {
    transform: translateY(25%);
  }
  80% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
@-webkit-keyframes glitch {
  0% {
    color: white;
    transform: translateX(0) translateY(0%);
  }
  25% {
    color: #3498db;
    transform: translateX(1px) translateY(1px);
  }
  40% {
    color: #e74c3c;
    transform: translateX(-2px) translateY(-2px);
  }
  50% {
    color: #cccccc;
    transform: translateX(0) translateY(0);
  }
  80% {
    color: #3498db;
    transform: translateX(2px) translateY(2px);
  }
  90% {
    color: #e74c3c;
    transform: translateX(-1px) translateY(-1px);
  }
  100% {
    color: white;
    transform: translateX(0) translateY(0);
  }
}
@keyframes glitch {
  0% {
    color: white;
    transform: translateX(0) translateY(0%);
  }
  25% {
    color: #3498db;
    transform: translateX(1px) translateY(1px);
  }
  40% {
    color: #e74c3c;
    transform: translateX(-2px) translateY(-2px);
  }
  50% {
    color: #cccccc;
    transform: translateX(0) translateY(0);
  }
  80% {
    color: #3498db;
    transform: translateX(2px) translateY(2px);
  }
  90% {
    color: #e74c3c;
    transform: translateX(-1px) translateY(-1px);
  }
  100% {
    color: white;
    transform: translateX(0) translateY(0);
  }
}
@-webkit-keyframes changeColor {
  0% {
    color: #cccccc;
  }
  25% {
    color: #2ecc71;
  }
  50% {
    color: #e74c3c;
  }
  75% {
    color: #3498db;
  }
  100% {
    color: #cccccc;
  }
}
@keyframes changeColor {
  0% {
    color: #cccccc;
  }
  25% {
    color: #2ecc71;
  }
  50% {
    color: #e74c3c;
  }
  75% {
    color: #3498db;
  }
  100% {
    color: #cccccc;
  }
}
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
  font-family: "Press Start 2P", cursive;
  background-color: #212121;
}

h1,
h2,
p,
span,
textarea {
  font-family: "Press Start 2P", cursive;
}

.console {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
  padding: 10px;
  box-sizing: border-box;
}
.console .output {
  width: 100%;
  font-size: 12px;
  color: #cccccc;
}
.console .output span {
  line-height: 20px;
}
.console .output span.grey {
  color: #cccccc;
}
.console .output span.green {
  color: #2ecc71;
}
.console .output span.red {
  color: #e74c3c;
}
.console .output span.blue {
  color: #3498db;
}
.console .output pre {
  font-size: 9px;
  -webkit-animation: glitch 0.2s linear infinite;
          animation: glitch 0.2s linear infinite;
  -webkit-animation-play-state: paused;
          animation-play-state: paused;
}
.console .output pre:hover {
  -webkit-animation-play-state: running;
          animation-play-state: running;
}
.console .action {
  width: 100%;
  font-size: 14px;
  margin-top: 20px;
}
.console .action span {
  display: inline-block;
  width: 60px;
  /* float: left; */
  color: white;
}
.console .action textarea {
  width: calc(100% - 65px);
  float: left;
  background: none;
  border: none;
  color: white;
  padding: 0;
  margin: 0;
}
.console .action textarea:focus {
  outline: none;
}

span.seperator {
  font-size: 12px;
  -webkit-animation: changeColor 10s ease-in-out infinite;
          animation: changeColor 10s ease-in-out infinite;
}

.pong {
  display: inline-block;
  position: relative;
  width: 300px;
  height: 50px;
}
.pong:after {
  content: "";
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 4px;
  height: 4px;
  background-color: white;
  -webkit-animation: ball 6s linear infinite;
          animation: ball 6s linear infinite;
}
.pong b {
  display: inline-block;
  position: absolute;
  top: 50%;
  margin-top: -7px;
  transform: translateY(0);
}
.pong b.left {
  left: -10px;
  -webkit-animation: raketes 5s ease-in-out infinite;
          animation: raketes 5s ease-in-out infinite;
}
.pong b.right {
  right: -10px;
  -webkit-animation: raketes 5s ease-in-out 0.5s infinite;
          animation: raketes 5s ease-in-out 0.5s infinite;
}
    </style>
</head>
<body>
    <div class="console">
        <div class="output">
            <span>Initializing...</span><br/>
            <span class="green">0.0002ms ok!</span><br/>
            <span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>
            <pre contenteditable="false">    __  _______            _                     ______                       __   
       /  |/  / __ \___  _____(_)___ _____  _____   / ____/___  ____  _________  / /__ 
      / /|_/ / / / / _ \/ ___/ / __ `/ __ \/ ___/  / /   / __ \/ __ \/ ___/ __ \/ / _ \
     / /  / / /_/ /  __(__  ) / /_/ / / / (__  )  / /___/ /_/ / / / (__  ) /_/ / /  __/
    /_/  /_/_____/\___/____/_/\__, /_/ /_/____/   \____/\____/_/ /_/____/\____/_/\___/</pre></br>
            <span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>
            <span>Hope you have fun discovering all the <span class="red">hidden gems</span>!</span>
            </br>
            <span class="blue">type '<span class="grey">help</span>' to see a list of comands available <br/> or '<span class="grey">contact</span>' for a list of ways to contact me.</span><br>
        </div>
        <div class="action">
            <span>dev$ </span>
            <textarea class="input" name="input" cols="30" rows="1"></textarea>
        </div>
    </div>
    <script>
        // =====================
// Create required vars
// =====================
var output = $('.output');
var input = $('textarea.input');
var toOutput;

// Creates the event listner for the comands ==
// Yes this is a long one - could do with some
// improvements ===============================
input.keypress(function(e) {
	if (e.which == 13) {
		var inputVal = $.trim(input.val());
		//console.log(inputVal);

		if (inputVal == "help") {
			help();
			input.val('');
		} else if (inputVal == "ping") {
			pong();
			input.val('');
		} else if (inputVal == "about") {
			aboutMe();
			input.val('');
		} else if (inputVal == "contact") {
			contactMe();
			input.val('');
		} else if (inputVal == "clear") {
			clearConsole();
			input.val('');
		} else if (inputVal.startsWith("say") === true) {
			sayThis(inputVal);
			input.val('');
		} else if (inputVal.startsWith("sudo") === true) {
			sudo(inputVal);
			input.val('');
		} else if (inputVal == "time") {
			getTime();
			input.val('');
		} else if (inputVal == 'whats that sound' || inputVal == 'what\'s that sound' || inputVal == 'whats that sound?') {
			seperator();
			Output('<span class="blue">' + inputVal + '</span></br><span class="red">Machine Broken!</span></br>');
			seperator();
			input.val('');
		} else if (inputVal.startsWith("exit") === true) {
			Output('<span class="blue">Goodbye! Comeback soon.</span>');
			setTimeout(function() {
				window.open('https://codepen.io/MarioDesigns');
			}, 1000);
		} else {
			Output('<span>command not found</span></br>');
			input.val('');
		}
	}
});

// functions related to the commands typed
// =======================================

// prints out a seperator
function seperator() {
	Output('<span class="seperator">== == == == == == == == == == == == == == == == == ==</span></br>');
}

//clears the screen
function clearConsole() {
	output.html("");
	Output('<span>clear</span></br>');
}

// prints out a list of "all" comands available
function help() {
	var commandsArray = ['Help: List of available commands', '>help', '>about', '>contact', '>ping', '>time', '>clear', '>say'];
	for (var i = 0; i < commandsArray.length; i++) {
		var out = '<span>' + commandsArray[i] + '</span><br/>'
		Output(out);
	}
}

// prints the result for the pong command
function pong() {
	Output('<span>pong</span></br><span class="pong"><b class="left">|</b><b class="right">|</b></span></br>');
}

// function to the say command
function sayThis(data) {
	data = data.substr(data.indexOf(' ') + 1);
	Output('<span class="green">[say]:</span><span>' + data + '</span></br>');
}

// sudo?!? not really
function sudo(data) {
	data = data.substr(data.indexOf(' ') + 1);
	if (data.startsWith("say") === true) {
		data = "Not gona " + data + " to you, you don\'t own me!"
	} else if (data.startsWith("apt-get") === true) {
		data = "<span class='green'>Updating...</span> The cake is a lie! There is nothing to update..."
	} else {
		data = "The force is week within you, my master you not be!"
	}
	Output('<span>' + data + '</span></br>');
}

// function to get current time...not
function getTime() {
	Output('<span>It\'s the 21st century man! Get a SmartWatch</span></br>');
}

function aboutMe() {
	var aboutMeArray = ['>About:', 'Hi There!', 'I\'m Mario, a Digital Developer working [@wearecollider](http://www.wearecollider.com) during the day and a designer, freerider, pcbuilder, droneracer and science lover on my free time.', 'Fell free to follow me on twitter @MDesignsuk - see contact page.'];
	seperator();
	for (var i = 0; i < aboutMeArray.length; i++) {
		var out = '<span>' + aboutMeArray[i] + '</span><br/>'
		Output(out);
	}
	seperator();
}

function contactMe() {
	var contactArray = ['>Contact:', '[GitHub](https://github.com/Mario-Duarte)', '[BitBucket](https://bitbucket.org/Mario_Duarte/)', '[CodePen](https://codepen.io/MarioDesigns/)', '[Twitter](https://twitter.com/MDesignsuk)'];
	seperator();
	for (var i = 0; i < contactArray.length; i++) {
		var out = '<span>' + contactArray[i] + '</span><br/>'
		Output(out);
	}
	seperator();
}

// Prints out the result of the command into the output div
function Output(data) {
	$(data).appendTo(output);
}
    </script>
</body>
</html>