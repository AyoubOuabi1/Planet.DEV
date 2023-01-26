<!-- articles MODAL -->
<div aria-hidden="true" aria-labelledby="exampleModalCenterTitle"   class="modal fade" id="modalArticle" role="dialog"
     tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h2 id="modaltitle">Article Detail</h2>
      </div>
      <div class="modal-body">
        <!--begin form-->

          <div id="FormsBody">
            <form id="form1" >
              <div class="FormContainer" id="div1">
                <h1 class="h1 ttl" >Article 1</h1>
                <div class="form-group">
                  <label for="fArticleTitle" class="form-label h5">Title</label>
                  <input class="form-control form-control-lg check" id="fArticleTitle" name="fArticleTitle" required type="text">
                </div>
                <div class="form-group">
                  <label for="fArticleCat" class="form-label h5"></label>

                  <select class="form-select" id="fArticleCat" name="fArticleCat" aria-label="Default select example">
                    <option selected disabled>Select Category</option>
                      <?php  foreach(User::getCategories() as $category){
                          $id=$category["id"];
                          $name=$category["catName"];
                          echo "<option value='$id'>$name</option>";

                      } ?>
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
              </div>
            </form>

          </div>




          <div class="modal-footer" id="modelFooter">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >cancel</button>
            <button type="button" id="addNewFormBtn" class="btn  btn-primary text-white" onclick="addNewForm()" >Add new Form</button>
            <button type="button" id="addArtcBtn" class="btn  btn-primary text-white"  data-bs-dismiss="modal"  onclick="checkValidation()" >Save</button>
          </div>

        <!--end form-->
      </div>

    </div>
  </div>
</div>

<!-- TASK MODAL DELETE AND UPDATE-->