const box = document.getElementById("box");
const point = document.getElementById("point");
const startButton = document.getElementById("startButton");
const reaction = document.getElementById("reaction");
const testScore = document.getElementById("testScore");
const reactionValues = [];
const deviationValues = [];
const mark = document.createElement("div");
mark.classList.add("mark");
mark.style.left = (box.offsetWidth / 2 - 5) + "px";
box.appendChild(mark);
let currentPosition = 0;
let direction = "right";
let randomDirectionInterval;
let pointMovingInternal;
let resistance = 1;
let hitsAmount = 0;
let count = 0;

function startObjectMoving() {
    const progress = document.getElementById("progress");
    let value = 0;
    const intervalNumber = setInterval(() => {
        value ++;
        progress.value = value;
        if (value === 50) {
            clearInterval(intervalNumber);
        }
    },1000);
    startButton.style.display = "none";
    pointMovingInternal = setInterval(() => {
        if (direction === "right") {
            currentPosition += 10 * resistance;
            if (currentPosition >= box.offsetWidth - point.offsetWidth) {
                direction = "left";
            }
        } else {
            currentPosition -= 10 * resistance;
            if (currentPosition <= 0) {
                direction = "right";
            }
        }
        point.style.left = currentPosition + "px";
        const pointRight = currentPosition + point.offsetWidth;
        const markLeft = mark.offsetLeft;
        const markRight = mark.offsetLeft + mark.offsetWidth;
        if (pointRight >= markLeft && currentPosition <= markRight) {
            resistance = 0.8;
            if (currentPosition + ReadableByteStreamController.offsetWidth / 2 === markLeft + mark.offsetWidth / 2) {
                hitsAmount ++;
                hitPercentageCalculator(progress);
            }
        } else { 
            resistance = 1;
        }
    }, 20);

    randomDirectionInterval = setInterval(() => {
        if (Math.random() < 0.5) {
            direction = "left";
        } else {
            direction = "right";
        }
    }, 1000);
    document.addEventListener("keydown", (event) => {
        const 
    })
}
