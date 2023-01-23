let wrapper = document.getElementById("wrapper");
let menuButton = document.getElementById("menu-toggle");

let formCounter=1;
menuButton.onclick = function () {
    wrapper.classList.toggle("toggled");
};
 //login partie
function openModl(){
    $('#modalArticle').modal('show');
}
function loadDashboard(){
    window.location.href="http://localhost/PlanetDEV/View/dashboard.php"
}
function loadArticle(){
    window.location.href="http://localhost/PlanetDEV/View/articles.php"

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


function loadImage(){
    let name = document.getElementById("file").files[0].name;
    let form_data = new FormData();
    let ext = name.split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg','jpeg']) == -1)
    {
        alert("Invalid Image File");
    }
    let oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file").files[0]);
    let f = document.getElementById("file").files[0];
    let fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
        alert("Image File Size is very big");
    }
    else
    {
        form_data.append("title", $('#fArticleTitle').val());
        form_data.append("description", $('#fArticleDescr').val());
        form_data.append("cat_id", $('#fArticleCat').val());

        form_data.append("file", document.getElementById('file').files[0]);
        $.ajax({
            url:'http://localhost/PlanetDEV/Controller/user.inc.php',
            type: "POST",
            data : form_data,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                console.log(data)
                alert(data);
            },fail:function (data){
                alert(data)
            }
        });
    }
}

function addNewForm(){
    formCounter++;
    document.getElementById('FormsBody').innerHTML+=`<div id="div${formCounter}">
              <h1 class="h1 mt-4">Article ${formCounter}</h1>

              <div class="form-group">
                <label for="fArticleTitle" class="form-label h5">Title</label>
                <input class="form-control form-control-lg check" id="fArticleTitle" name="fArticleTitle" required type="text">
              </div>
              <div class="form-group">
                <label for="fArticleCat" class="form-label h5"></label>

                <select class="form-select" id="fArticleCat" name="fArticleCat" aria-label="Default select example">
                  <option selected>Select Category</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="form-group ">
                <label for="fArticleDescr" class="form-label h5">Description</label>
                <textarea class="form-control form-control-lg" id="fArticleDescr" name="fArticleDescr" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="file" class="form-label h5">Image (jpg ou png)</label>
                <input class="form-control form-control-lg check" id="file" name="file" required type="file">
              </div>
            </div>`;
}

