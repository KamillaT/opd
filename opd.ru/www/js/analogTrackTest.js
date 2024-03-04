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
        if (value === 30) {
            clearInterval(intervalNumber);
        }
    }, 1000);
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
        const reaction = document.getElementById('reaction')
        if (event.key === "ArrowLeft") {
            direction = "left";
            if (direction === "right") {
                resistance = 2;
            } else {
                resistance = 0.5;
            }
        }
        const pointRight = currentPosition + point.offsetWidth;
        const markLeft = mark.offsetLeft;
        const markRight = mark.offsetLeft + mark.offsetWidth;
        const distanceFromMark = Math.min(Math.abs(pointRight - markLeft), Math.abs(currentPosition - markRight));
        const reactions = distanceFromMark / 10;
        reactionValues.push(reactions.toFixed(2));
        reaction.innerText = `Cкорость реакции на изменение движения шарика: ${reactionValues[reactionValues.length - 1]} с/шарик`;
    });

    function hitPercentageCalculator(progress) {
        const deviation = Math.abs(currentPosition + point.offsetWidth / 2 - mark.offsetLeft - mark.offsetWidth / 2 + mark.offsetWidth / 2 - point.offsetWidth / 2);
        const boxWidth = box.offsetWidth;
        const deviationPercentage = ((boxWidth / 2 - deviation) / (boxWidth / 2)) * 100;
        deviationValues.push(Math.abs(deviationPercentage.toFixed(2)));
        testScore.innerText = `Процент отклонения от средней границы: ${deviationValues[deviationValues.length - 1]}%`;
    }

    setInterval(() => {
        hitPercentageCalculator(progress);
    }, 2000);

    setTimeout(() => {
        clearInterval(pointMovingInternal);
        clearInterval(randomDirectionInterval);
        startButton.style.display = "block";
        const reactionAverage = reactionValues.reduce((acc, val) => acc + Number(val), 0) / reactionValues.length;
        const deviationAverage = deviationValues.reduce((acc, val) => acc + Number(val), 0) / deviationValues.length;
        reaction.innerText = ` Средняя скорость реакции на изменение движения шарика: ${reactionAverage.toFixed(2)} с/шарик`;
        testScore.innerText = `Среднее отклонение от средней границы: ${deviationAverage.toFixed(2)}%`;
        document.getElementById("avg_time").value = reactionAverage.toFixed(2);
        document.getElementById("correct").value = deviationAverage.toFixed(2);
        document.getElementById("score").value = deviationAverage.toFixed(2);
        document.getElementById("submit-button").click();
    }, 30000);}
 startButton.addEventListener("click", startObjectMoving);
