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


function addNewForm(){
    formCounter++;
    document.getElementById('FormsBody').innerHTML+=`<form id="form${formCounter}">

            <div class="FormContainer" id="div${formCounter}">
              <h1 class="h1 mt-4">Article ${formCounter}</h1>

              <div class="form-group">
                <label for="fArticleTitle" class="form-label h5">Title</label>
                <input class="form-control form-control-lg check"  name="fArticleTitle" required type="text">
              </div>
              <div class="form-group">
                <label for="fArticleCat" class="form-label h5"></label>

                <select class="form-select"  name="fArticleCat" aria-label="Default select example">
                  <option selected>Select Category</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="form-group ">
                <label for="fArticleDescr" class="form-label h5">Description</label>
                <textarea class="form-control form-control-lg" name="fArticleDescr" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="file" class="form-label h5">Image (jpg ou png jpge)</label>
                <input class="form-control form-control-lg check"  name="file" required type="file">
              </div>
            </div>
            </form> `;
}

function insertIntoDb(){
    let formData = new FormData();
    for(let i=0; i<formCounter;i++){
        if(checkImage(document.getElementsByName('file')[i].files[0])){
                formData.append("functionName", "insertInto");
                formData.append("file", document.getElementsByName('file')[i].files[0]);
                formData.append("title", document.getElementsByName('fArticleTitle')[i].value);
                formData.append("description", document.getElementsByName('fArticleDescr')[i].value);
                formData.append("cat_id", document.getElementsByName('fArticleCat')[i].value);
                $.ajax({
                    url:'http://localhost/PlanetDEV/Controller/user.inc.php',
                    type: "POST",
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        alert(data);
                        console.log(data)

                    },fail:function (data){
                        alert(data)
                    }
                });
                clearFormData(formData);

        }else{
            alert("invalid format");
        }
    }


}

function clearFormData(formData) {
    let arr=["file","title","description","cat_id","functionName"];
    for(let i=0; i<arr.length; i++) {
        formData.delete(arr[i]);
    }



}

function  checkImage(img){
    let name = img.name;
    let ext = name.split('.').pop().toLowerCase();
    console.log(ext+"          "+name);
    return $.inArray(ext, ['png', 'jpg', 'jpeg']) != -1;
}
showData();
function  showData(){
    $.ajax({
        url:'http://localhost/PlanetDEV/Controller/user.inc.php',
        type: "POST",
        data : {functionName:"getArticle",funcId:1},
        dataType:"json",
        success: function (data){
            loadData(data);
        },fail: function (data){
            console.log(data);
        }
    })
}

function loadData(data){
    for (let i=0; i<data.length; i++) {
        document.getElementById("loadArticles").innerHTML+=`
             <tr>
                    <td><img src="../assets/images/${data[i].image}" alt="article img" height="25px" width="45px"/></td>
                    <td>${data[i].title}</td>
                    <td>${data[i].date}</td>
                    <td>${data[i].username}</td>
                    <td>
                         <button type="button" onclick="" class="mt-2 btn btn-primary">Open</button>
                         <button type="button" onclick="" class="mt-2 btn btn-danger">delete</button>
                    </td>
              </tr>
        `;
    }

}