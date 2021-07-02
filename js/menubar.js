$(document).ready(function(){
    
    
    $("#miniBar li").hover(function () {
        $(this).css("border-top", "2px solid #57E5FF");
    }, function () {
        $(this).css("border-top", "2px solid transparent");
        }
    );
    $height = $("#megaMenu").css("height");
    $("#separator").css("height", $height);
});