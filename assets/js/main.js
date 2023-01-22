let wrapper = document.getElementById("wrapper");
let menuButton = document.getElementById("menu-toggle");
menuButton.onclick = function () {
    wrapper.classList.toggle("toggled");
};
//login partie
function openModl(){
    $('#modalArticle').modal('show');
}
function checkLogin(){
    if(!($("#inputEmail").val()=='')  && !($("#inputPassword").val()=='')){
        $.post("http://localhost/PlanetDEV/Controller/CheckLogin.php", {email:$("#inputEmail").val(),password:$("#inputPassword").val()},
            function (data) {

                if(data==="true"){
                    console.log("true");
                    location.href='http://localhost/PlanetDEV/index.php'
                }else{
                    $('#checkLabel').html("Email or password incorrect")
                    $('#checkLabel').removeClass('d-none');
                }
            }
        ).fail(function(data){
            console.log(data);
        });
    }else{
        $('#checkLabel').html("Email or password can't be empty")
        $('#checkLabel').removeClass('d-none');
    }


}

