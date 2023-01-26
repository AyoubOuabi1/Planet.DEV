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
    window.location.href="http://localhost/PlanetDEV"
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
    let newform = document.getElementById('form1').cloneNode(true);
    newform.getElementsByClassName('ttl')[0].innerHTML ='Article'+formCounter
    document.getElementById('FormsBody').appendChild(newform);

}
function checkValidation(){
    for(let i = 0; i <formCounter; i++) {
        if(document.getElementsByName('file')[i].files.length===0||document.getElementsByName('fArticleTitle')[i].value==" " || document.getElementsByName('fArticleDescr')[i].value==" " || document.getElementsByName('fArticleCat')[i].options[document.getElementsByName('fArticleCat')[i].selectedIndex].value<1 ) {
            alert("please remplire tous les champs")
            break;
        }else {
            insertIntoDb();
        }
    }
}

function insertIntoDb(){
    let formData = new FormData();
    for(let i=0; i<formCounter;i++){
        if(checkImage(document.getElementsByName('file')[i].files[0])){
                formData.append("functionName", "insertArticle");

                formData.append("file", document.getElementsByName('file')[i].files[0]);
                formData.append("title", document.getElementsByName('fArticleTitle')[i].value);
                formData.append("description", document.getElementsByName('fArticleDescr')[i].value);
                formData.append("cat_id", document.getElementsByName('fArticleCat')[i].options[document.getElementsByName('fArticleCat')[i].selectedIndex].value);
                $.ajax({
                    url:'http://localhost/PlanetDEV/Controller/user.inc.php',
                    type: "POST",
                    data : formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {


                        Swal.fire(
                            'Good job!',
                            'Article Successfully',
                            'success'
                        )
                        showData();

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
    return $.inArray(ext, ['png', 'jpg', 'jpeg','jfif']) != -1;
}
showData();
function  showData(){
    document.getElementById("loadArticles").innerHTML="";
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
    document.getElementById("loadArticles").innerHTML="";
    for (let i=0; i<data.length; i++) {
        let arr = data[i];
        console.log(arr);
        document.getElementById("loadArticles").innerHTML+=`
             <tr>
                    <td><img src="../assets/images/${data[i].image}" alt="article img" height="25px" width="45px"/></td>
                    <td>${data[i].title}</td>
                    <td>${data[i].date}</td>
                    <td>${data[i].username}</td>
                       <td>${data[i].categoryName}</td>
                    <td>
                         <button type="button" onclick="loadModalData(${data[i].id})" class="mt-2 btn btn-primary" >Open</button>
                         <button type="button" onclick="deleteArticle(${data[i].id})" class="mt-2 btn btn-danger">delete</button>
                    </td>
              </tr>
        `;
    }

}


function loadModalData(slectedId){
    console.log(slectedId)
    $('#modalArticleData').modal('show');

    $.ajax({
        url:'http://localhost/PlanetDEV/Controller/user.inc.php',
        type: "POST",
        data : {functionName:"getArticle",funcId:1},
        dataType:"json",
        success: function (data){
            for(var i=0; i<data.length;i++){
                if(data[i].id==slectedId){
                    $("#fArticleTitleModal").val(data[i].title);
                    $("#arctImg").attr("src", "../assets/images/"+data[i].image);
                    $("#fArticleCatData").val(data[i].catId);
                    $('#arctDate').val(data[i].date);
                    $("#arctUser").val(data[i].username);
                    $("#fArticleDescrModal").val(data[i].description);
                    $("#modelFooterData").html(`
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >cancel</button>
                        <button type="button" id="addArtcBtn" class="btn  btn-primary text-white"  data-bs-dismiss="modal" onclick="updateArticale(${data[i].id})" >Save Changes</button>
                    `)
                }
            }
        },fail: function (data){
            console.log(data);
        }
    })
}
function getArticleBySearch(){
     document.getElementById("loadArticles").innerHTML="";
    $.ajax({
        url:'http://localhost/PlanetDEV/Controller/user.inc.php',
        type: "POST",
        data : {functionName:"getArticle",funcId:2,inpt:$("#searchInput").val()},
        dataType:"json",
        success: function (data){

            loadData(data);
        },fail: function (data){
            console.log(data);

        }
    })
}
function deleteArticle(selectedId){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'http://localhost/PlanetDEV/Controller/user.inc.php',
                type: "POST",
                data : {functionName:"deleteArticle",id:selectedId},
                dataType:"json",
                success: function (data){

                },fail: function (data){
                    console.log(data);
                }
            });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );
            window.location.reload();


        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })

}


function updateArticale(id){
    let formData = new FormData();
    let select = document.getElementById('fArticleCatData');
    let value = select.options[select.selectedIndex].value;
    if(checkImage(document.getElementById('Datafile').files[0])){
        formData.append("functionName", "updateArticle");
        formData.append("file", document.getElementById('Datafile').files[0]);
        formData.append("id", id);
        formData.append("title", document.getElementById('fArticleTitleModal').value);
        formData.append("description", document.getElementById('fArticleDescrModal').value);
        formData.append("cat_id", value);
        $.ajax({
            url:'http://localhost/PlanetDEV/Controller/user.inc.php',
            type: "POST",
            data : formData,
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                showData();
                Swal.fire(
                    'Good job!',
                    'Article Updated Successfully',
                    'success'
                )
                $('#modalArticleData').modal('hide');

            },fail:function (data){
                alert(data)
            }
        });
        clearFormData(formData);

    }else{
        alert("invalid format");
    }


}

