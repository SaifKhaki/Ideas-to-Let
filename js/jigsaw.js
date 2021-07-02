$(document).ready(function(){
    changeState($("#notExtendedPoints_jigsaw>.jigsaw"), "rgb(166, 242, 255)");

    //function for changing background as well as giving focus to input field
    function changeState(var1, color){
        var1.css("background-color", color);
        var1.parent().find("span.t").css("background-color", color);
    }
    //changing background on click
    $("#jigsawMode textarea").on("click", function(){
        changeState($(this).parent(), "rgb(166, 242, 255)");
        $(this).focus();
    });
    $("#jigsawMode textarea").focusout(function (e) { 
        if ($(this).val() == "") {
            changeState($(this).parent(), "rgb(199, 199, 199)");
        } 
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////
    var $dock = 7;
    $("#modes").dblclick(function(event){
        event.preventDefault();
    });
    //Extending on click of parent jigsaw
    $("#jigsawPoints>div>.jigsaw").on("click", function(){
        //for extending Idea
        $jigsawDepth = $(this).index();
        if ($jigsawDepth == 5 || 11) {
            $(this).find("span").eq(1).addClass("b");
        }
        
        if ($("#jigsawMode").children().length != 0) {
            //for the extending of an idea
            if ($jigsawDepth > $dock) {
                $jigsawDepth--;
            }
            $dock = $jigsawDepth;
            //for assign this value to php
            $("#jigsawIndex").val($dock);
            
            $("#jigsawMode").removeClass("d-none");
            $("#jigsawMode").detach().insertAfter($(this));
            $("#jigsawMode").find(".d-none").eq(0).prev().find("textarea").focus();
            $("#descriptionMode").removeClass("d-none");
            $("#descriptionMode").detach().insertAfter($("#modes>div li").eq($jigsawDepth));
        }
        else if($("#jigsawMode").children().length == 0 && $(".problemDescriptionMode").children().length != 0){
            //for extending a problem
            $(this).next("#problemJigsawMode").toggleClass("d-none").find("textarea").focus();
            if ($jigsawDepth == 0) {
                $(".problemDescriptionMode").eq($jigsawDepth).toggleClass("d-none");   
            } else {
                $(".problemDescriptionMode").eq($jigsawDepth/2).toggleClass("d-none");
            }
        }
        else{
            $(".extensions .extensionPoints").addClass("d-none");
            $(".extensions").not($(this).next().find(".extensions")).addClass("d-none");
            $(this).next().find(".extensions").toggleClass("d-none");
            changeState($(".jigsawExtensions>.extensions>.jigsaw"), "rgb(166, 242, 255)");
        }
    });
    //clicking on extensions k andar wali jigsaw
    $(".extensions>.jigsaw").on("click", function(){
        $(".extensionPoints").not($(this).next().find(".extensionPoints")).addClass("d-none");
        $(this).next().find(".extensionPoints").toggleClass("d-none");
        changeState($(".points>.extensionPoints>.jigsaw"), "rgb(255, 243, 184)");
    });
    
    ////////////////////////////////////////////////////////////////////////////////////////
    //modebutton changing on click
    $("#modeButton button").on("click", function(){
        $(this).toggleClass("active");
        $(this).toggleClass("bg-scheme2");
        $(this).siblings().toggleClass("active");
        $(this).siblings().toggleClass("bg-scheme2");
        $("#modes>div").eq(1).toggleClass("d-none");
        $("#modes>div").eq(2).toggleClass("d-none");
    });
    //function for adding jigsaw pieces downwards
    function addDownwards(ev, inputVar){
        ev.data.direction = "bottom";
        var nextpiece = $(inputVar).parent().next();
        nextpiece.removeClass("d-none");
        changeState($("#jigsawMode .jigsaw").eq($(inputVar).parent().index()).next(), "rgb(166, 242, 255)");
        nextpiece.find("textarea.noscroll").focus();
    }
    //functionality for the short key of tab key
    $("#jigsawMode textarea").on("keydown",{
        direction: "notSpecified"
    }, function(event){
        changeState($(this), "rgb(166, 242, 255)");
        var depth = $(this).parent().index();
        //to edit the value from jigsaw mode to description mode live
        $("#descriptionMode li").eq(depth).find("p").eq(1).addClass("d-none");
        if (event.key == "Enter") {
            $("#descriptionMode li").eq(depth).find("p").html($("#descriptionMode li").eq(depth).find("p").html() + "<br>");
        }else{
            $("#descriptionMode li").eq(depth).find("p").html($("#descriptionMode li").eq(depth).find("p").html() + event.key);
        }
        //action on pressing tab
        if (event.keyCode == 9 && $(this).val() != ""){
            event.preventDefault();
            $("#jigsawMode .jigsaw").eq(depth).find("textarea").val($(this).val());
            $("#jigsawMode .jigsaw").eq(depth).next().removeClass("d-none");
            $("#descriptionMode li").eq(depth).next().removeClass("d-none");
            $("#jigsawMode .jigsaw").eq(depth).next().find("textarea").focus();
            if (depth != 5) {
                $("#jigsawMode .jigsaw").eq(depth).find("span").eq(1).addClass("b");
                addDownwards(event, this);
            }
        }
    });
    
    $("#problemJigsawMode textarea").on("keydown",{
        direction: "notSpecified"
    }, function(event){
        changeState($(this), "rgb(166, 242, 255)");
        var depth = $(this).closest("#problemJigsawMode").index();
        //to edit the value from jigsaw mode to description mode live
        if (event.key == "Enter") {
            $(".problemDescriptionMode").eq(Math.floor(depth/2)).find("p").html($(".problemDescriptionMode").eq(Math.floor(depth/2)).find("p").html() + "<br>");
        }else{
            $(".problemDescriptionMode").eq(Math.floor(depth/2)).find("p").html($(".problemDescriptionMode").eq(Math.floor(depth/2)).find("p").html() + event.key)
        }
        if (event.keyCode == 9 && $(this).val() != ""){
            event.preventDefault();
            $(this).closest("#problemJigsawMode").next().trigger("click");
            
        }
    });

    autosize(document.getElementsByClassName("noscroll"));
});
