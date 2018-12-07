$(document).ready(function () {
    $("Form").on('submit', init.chek);

});

let init = (function () {
    function checkname(e) {
        e.preventDefault();
        let User = e.target[0].value;
        if(User.length >=1){
            $("#Index").hide();
            $("#user").html(User);
            $("#Main").show();
            setColors();
            $(".menu").on('click',showmenu);
        }}
    function showmenu(e) {
        let menu = "."+ e.target.id.slice(0,-4) +"short .select";
        if ($(menu).css("display") === "none"){
            $(".select").hide();
            $(menu).show();
            $(window).on('click',close);
            function close(ee) {
                if(e.target.id !== ee.target.id){
                    $(menu).hide();
                    $(window).off();
                }
            }
        }else {
            $(menu).hide();
        }
    }
    function setColors() {
        $(".Color input").each(function(e) {
            $(this).css("background-color",$(this)[0].value);
            $(this).css("color",$(this)[0].value);
        });
    }
    return{
        chek:checkname
    }
})();
