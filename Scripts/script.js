$(function()
{
	$( document ).ready(function()
	{
        $("#hider").css("display", "block");
        $("#loadingAnimation").css("display", "block");
        var d = new Date();
        for(var i = 1; i <= 31; i++)
        {
            var date = i;
            if(i < 10)
            {
                date = "0" + i;
            }
            $("#datesArea").append("<div class='dateCircles' title='Add new event' id = '" + i + "'>" + date + "</div>");
            $("#datesArea").append("<div class='devider'></div>");
        }
        
        for(var i = 1; i <= 30; i++)
        {
            var date = i;
            if(i < 10)
            {
                date = "0" + i;
            }
            $("#datesArea").append("<div class='dateCircles' title='Add new event' id = '" + (i + 31) + "'>" + date + "</div>");
            $("#datesArea").append("<div class='devider'></div>");
        }
        
        $.post("loadOddEvents.php", function(data)
        {
            $("#leftSide").html(data);
        });
        
        $.post("loadEvenEvents.php", function(data)
        {
            $("#rightSide").html(data);
            $("#hider").css("display", "none");
            $("#loadingAnimation").css("display", "none");
        });
        
        var monthArray = new Array();
        monthArray[0] = "January";
        monthArray[1] = "February";
        monthArray[2] = "March";
        monthArray[3] = "April";
        monthArray[4] = "May";
        monthArray[5] = "June";
        monthArray[6] = "July";
        monthArray[7] = "August";
        monthArray[8] = "September";
        monthArray[9] = "October";
        monthArray[10] = "November";
        monthArray[11] = "December";
        var month = monthArray[d.getMonth()]; 
        var day = d.getDate();
        $("#currentDate").append(day + " " + month);
        
        $(window).scroll(function(event)
        {
            if($(window).scrollTop() < 2865)
            {
                $("#monthName").html("May");
            }
            else
            {
                $("#monthName").html("June");
            }
        });
        
        $("#goToDateButton").click(function()
        {
            $("#hider").css("display", "block");
            $("#dateChoser").css("display", "block");
        });
        
        $("#dateChoserCancel").click(function()
        {
            $("#hider").css("display", "none");
            $("#dateChoser").css("display", "none");
        });
        
        $("#dateChoserConfirm").click(function()
        {
            var multiplier = 0;
            if($("#monthSelector").val() == "June")
            {
                multiplier = 31;
            }
            
            if(($("#dateTextBox").val() != "") && ($("#dateTextBox").val() >0) && $("#dateTextBox").val() < 32)
            {
                if(multiplier == 31)
                {
                    if($("#dateTextBox").val() < 31)
                    {
                        var scrollAmount = (($("#dateTextBox").val() - 1 + 31) * 92 + 84);
                        $(window).scrollTop(scrollAmount);
                        $("#hider").css("display", "none");
                        $("#dateChoser").css("display", "none");
                    }
                }
                else
                {
                    var scrollAmount = (($("#dateTextBox").val() - 1) * 92 + 84);
                    $(window).scrollTop(scrollAmount);
                    $("#hider").css("display", "none");
                    $("#dateChoser").css("display", "none");
                }
            }
            else
            {
                $("#hider").css("display", "none");
                $("#dateChoser").css("display", "none");
            }
        });
        
        $("#currentDate").click(function()
        {
            var scrollAmount = d.getDate() - 1;
            if(d.getMonth() == 5)
            {
                scrollAmount += 31
            }
            
            scrollAmount *= 92;
            scrollAmount += 84;
            $(window).scrollTop(scrollAmount);
        });
        
        $("#addNewEventButton").click(function()
        {
            $("#hider").css("display", "block");
            $("#addNewEventGlobal").css("display", "block");
        });
        
        $("#cnegCancelButton").click(function()
        {
            $("#hider").css("display", "none");
            $("#addNewEventGlobal").css("display", "none");
        });
        
        $("#cnegConfirmButton").click(function()
        {
            var eventName = $("#cnegName").val();
            var eventLoc = $("#cnegLocation").val();
            var eventYName = $("#cnegYName").val();
            var eventDate = $("#cnegDate").val();
            var eventMonth = $("#cnegMonth").val();
            
            if(((eventMonth == "June") && eventDate < 31) || eventMonth == "May")
            {
                if((eventDate <= 31) && (eventDate > 0))
                {
                    if((eventLoc != "") && (eventName != "") && (eventYName != ""))
                    {
                        var parsedDate = parseInt(eventDate);
                        if(eventMonth == "June")
                        {
                            parsedDate += 31;
                        }
                        $.post("addNewEvent.php", {name : eventName, loc : eventLoc, yname : eventYName, date : parsedDate}, function(data)
                        {
                            if(data != "OK")
                            {
                                alert("Adding new event failed!");
                            }
                            else
                            {
                                location.reload(true);
                            }
                        });
                    }
                }
            }
            $("#hider").css("display", "none");
            $("#addNewEventGlobal").css("display", "none");
        });
        
        $(document).on("click", ".dateCircles", function()
        {
            var circleId = $(this).attr("id");
            var month = "May";
            var date = circleId;
            if(circleId > 31)
            {
                month = "June";
                date -= 31;
            }
            
            $("#hider").css("display", "block");
            $("#addNewEventGlobal").css("display", "block");
            $("#cnegDate").val(date);
            $("#cnegMonth").val(month);
        });
        
        var parentContainer;
        
        $(document).on("click", ".multipleEvents", function()
        {
            $(".container").css("display", "block");
            $(".hiddenEvent").css("display", "none");
            parentContainer = $(this).parent();
            parentContainer.css("display", "none");
            $("#h" + $(this).attr("id")).css("display", "block");
        });
        
        $(document).on("click", ".eventTitleIconBox", function()
        {
            parentContainer.css("display", "block");
            $(".hiddenEvent").css("display", "none");
        });
        
        $(document).on("click", ".showMenuButtons, .showMenuButtonsMulti, .showMenuButtonsRight, .showMenuButtonsMultiL", function()
        {
            var menuId = "#m" + $(this).attr("id");
            $(menuId).css("display", "block");
        });
        
        $(document).on("click", ".cancelButton", function()
        {
            var menuId = "#m" + $(this).attr("id");
            $(menuId).css("display", "none");
        });
        
        $(document).on("click", ".deleteButton", function()
        {
            var deleteId = $(this).attr("id");
            $.post("deleteEvent.php", {id : deleteId}, function(data)
            {
                location.reload(true);   
            });
        });
        
        var openedFinishWindowId = null;
        
        $(document).on("click", ".finishButton", function()
        {
            openedFinishWindowId = $(this).attr("id");
            $("#hider").css("display", "block");
            $("#finishEventWindow").css("display", "block");
        });
        
        $("#finishEventCancelButton").click(function()
        {
            openedFinishWindowId = null;
            $("#hider").css("display", "none");
            $("#finishEventWindow").css("display", "none");
        });
        
        $("#finishEventConfirmButton").click(function()
        {
            var finishName = $("#finishEventInput").val();
            if((finishName != "") && openedFinishWindowId != null)
            {
                $.post("finishEvent.php", {id : openedFinishWindowId, name : finishName}, function()
                {
                    location.reload(true); 
                });
            }
        });
    });
});








































































