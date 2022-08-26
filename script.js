$(function(){
    $("form").submit(formSubmit);
    function restore() {
        $.ajax({
            url: "restore.php",
            type: "POST",
            success: function (data) {
                let response = JSON.parse(data);
                for (let value of response) {
                    let nextRow = "<tr>";
                    nextRow += "<td>" + $(".resultTable tr").length + "</td>";
                    nextRow += "<td>" + value.x + "</td>";
                    nextRow += "<td>" + value.y + "</td>";
                    nextRow += "<td>" + value.r + "</td>";
                    if(value.hit == 'true'){
                        nextRow += "<td class='theme-color'>" + value.hit + "</td>";
                    } else {
                        nextRow += "<td class='warning'>" + value.hit + "</td>";
                    }
                    nextRow += "<td>" +  value.attempt_time + "</td>";
                    nextRow += "<td>" + value.process_time + "</td>";
                    nextRow += "</tr>";
                    $(".resultTable").append(nextRow);
                }
            }
        });
    }
    $("#pop_up_panel").click(function(){
        $("#pop_up_message").slideUp(200);
        $("#pop_up_panel").fadeOut();
        //$("#pop_up_panel").removeClass("active");
    });
    restore();
});

export function formSubmit(event){
    event.preventDefault();
    $.ajax({
        url: "send_point.php",
        type: "POST",
        data: {x: getX(), y: getY(), r: getR()},
        success: function (data) {
            $("#y").val('');
            console.log(data);
            let response = JSON.parse(data);
            let nextRow = "<tr>";
            nextRow += "<td>" + $(".resultTable tr").length + "</td>";
            nextRow += "<td>" + response.x + "</td>";
            nextRow += "<td>" + response.y + "</td>";
            nextRow += "<td>" + response.r + "</td>";
            if(response.hit == 'true'){
                $("#pop_up_message").attr('src','img/hit.png');
                $("#pop_up_panel").css({"background": "radial-gradient( rgba(255, 255, 255, 0.679), rgb(255, 255, 255))"});
                nextRow += "<td class='theme-color'>" + response.hit + "</td>";
            } else {
                $("#pop_up_message").attr('src','img/miss.png');
                $("#pop_up_panel").css({"background": "radial-gradient( rgba(0, 0, 0, 0.679), rgb(0, 0, 0))"});
                nextRow += "<td class='warning'>" + response.hit + "</td>";
            }
            nextRow += "<td>" +  response.attempt_time + "</td>";
            nextRow += "<td>" + response.process_time + "</td>";
            nextRow += "</tr>";
            $(".resultTable").append(nextRow);
            $("#pop_up_message").hide();
            $("#pop_up_panel").hide().addClass("active").fadeIn('slow','linear');
            $("#pop_up_message").toggle();
        }
    });
    return false;
}
function getX(){
    return parseFloat($("#xValue").val());
}
function getR(){
    return parseFloat($("#rValue").val());
}
function getY(){
    return parseFloat($("#y").val());
}

