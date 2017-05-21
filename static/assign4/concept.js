var mainCanvas = document.querySelector("#concept");
var mainContext = mainCanvas.getContext("2d");

var canvasWidth = mainCanvas.width;
var canvasHeight = mainCanvas.height;

function drawCircle() {
  mainContext.clearRect(0, 0, canvasWidth, canvasHeight);

  // color in the background
  mainContext.fillStyle = "#EEEEEE";
  mainContext.fillRect(0, 0, canvasWidth, canvasHeight);

  // draw the circle
  mainContext.beginPath();

  var radius = 175;
  mainContext.arc(225, 225, radius, 0, Math.PI * 2, false);
  mainContext.closePath();

  // color in the circle
  mainContext.fillStyle = "#006699";
  mainContext.fill();
}
drawCircle();
