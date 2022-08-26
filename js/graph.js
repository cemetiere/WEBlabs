'use strict';
const canvas =document.getElementById('graph');
const ctx = canvas.getContext('2d');

const canvasWidth = canvas.clientWidth;
const canvasHeight = canvas.clientHeight;

const scaleX = 25;
const scaleY = 25;

const rField = document.getElementById("rValue");
let r = rField.value;

rField.addEventListener('change', redrawGraph);

function redrawGraph(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    r = rField.value;
    drawGraph();
}

function drawGraph(){
    ctx.beginPath();
    ctx.strokeStyle = '#f5f0e8';

    for (let i = 0; i<= canvasWidth; i = i + scaleX){
        ctx.moveTo(i,0);
        ctx.lineTo(i,canvasHeight);

    }
    ctx.stroke();
    for (let i = 0; i<= canvasHeight; i = i + scaleY){
        ctx.moveTo(0,i);
        ctx.lineTo(canvasWidth,i);

    }
    ctx.stroke();
    ctx.closePath();

    const xCenter = Math.round(canvasWidth/scaleX/2)*scaleX;
    const yCenter = Math.round(canvasHeight/scaleY/2)*scaleY;

    // quadrant
    ctx.beginPath();
    ctx.arc(xCenter,yCenter,100,0,-Math.PI/2,true);
    ctx.lineTo(xCenter,yCenter);
    ctx.lineTo(xCenter+100,yCenter);
    ctx.stroke();
    ctx.fillStyle = "violet";
    ctx.fill();
    ctx.closePath();

    // rectangle
    ctx.beginPath();
    ctx.moveTo(xCenter,yCenter);
    ctx.lineTo(xCenter+50,yCenter);
    ctx.lineTo(xCenter+50,yCenter+100);
    ctx.lineTo(xCenter,yCenter+100);
    ctx.lineTo(xCenter,yCenter);
    ctx.stroke();
    ctx.fill();
    ctx.closePath();

    // triangle
    ctx.beginPath();
    ctx.moveTo(xCenter,yCenter);;
    ctx.lineTo(xCenter-100,yCenter);
    ctx.lineTo(xCenter,yCenter-50);
    ctx.lineTo(xCenter,yCenter);
    ctx.stroke();
    ctx.fill();
    ctx.closePath();

    // axes
    ctx.beginPath();
    ctx.strokeStyle = '#000000';
    ctx.moveTo(xCenter,0);
    ctx.lineTo(xCenter,canvasHeight);
    ctx.moveTo(0,yCenter);
    ctx.lineTo(canvasWidth,yCenter);
    ctx.stroke();
    ctx.closePath();

    // axis arrows
    ctx.beginPath();
    const arrowIndent = 8;
    ctx.moveTo(xCenter-arrowIndent,arrowIndent);
    ctx.lineTo(xCenter,0);
    ctx.lineTo(xCenter+arrowIndent,arrowIndent);
    ctx.moveTo(canvasWidth-arrowIndent,yCenter-arrowIndent);
    ctx.lineTo(canvasWidth,yCenter);
    ctx.lineTo(canvasWidth-arrowIndent,yCenter+arrowIndent);
    ctx.stroke();
    ctx.closePath();


    // tick marks
    const labels = ['-R', '-R/2', '', 'R/2', 'R'];
    ctx.fillStyle = "black";

    for (let i=1; i<6; i++) {
        ctx.beginPath();
        ctx.moveTo(i*canvasWidth/6, canvasHeight/2-5);
        ctx.lineTo(i*canvasWidth/6, canvasHeight/2+5);
        ctx.moveTo(canvasWidth/2-5, i*canvasHeight/6);
        ctx.lineTo(canvasWidth/2+5, i*canvasHeight/6);
        ctx.stroke();

        ctx.textAlign = 'center';
        ctx.textBaseline = 'bottom';
        ctx.fillText(labels[i-1], i*canvasWidth/6, canvasHeight/2-7);

        ctx.textAlign = 'left';
        ctx.textBaseline = 'middle';
        ctx.fillText(labels[i-1], canvasWidth/2+7, canvasHeight - i*canvasHeight/6);
        ctx.closePath();
    }

    $.ajax({
        url: "restore.php",
        type: "POST",
        success: function (data) {
            let response = JSON.parse(data);
            for (let value of response) {
                const x = value.x / r * canvasWidth / 3 + canvasWidth / 2;
                const y = -value.y / r * canvasHeight / 3 + canvasHeight / 2;
                ctx.fillStyle = '#54cfff';
                ctx.beginPath();
                ctx.arc(x, y, 5, 0, Math.PI*2);
                ctx.fill();
            }
        }
    });

}
drawGraph();

export function drawCircle(x, y){
    ctx.fillStyle = '#54cfff';
    ctx.beginPath();
    ctx.arc(x,y,5,0,2*Math.PI);
    ctx.fill();
    ctx.closePath();
}

import {formSubmit} from '../script.js';

canvas.onclick = (e) => {
    /** @type {HTMLFormElement} */
    const form = document.getElementById("form");
    const rField = document.getElementById("rValue");
    drawCircle(e.offsetX, e.offsetY);
    let r = rField.value;
    let x = Math.round((2 * e.offsetX / canvasWidth - 1) * r * 1.5 * 100) / 100;
    let y = Math.round((-2 * e.offsetY / canvasHeight + 1) * r * 1.5 * 100) / 100;
    document.getElementById('xFromClick').disabled = false;
    document.getElementById('xFromClick').value = x;

    form['xValue'].value = x;
    form['y'].value = y;
    formSubmit(e);
}