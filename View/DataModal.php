<!-- articles Detail MODAL -->
<div aria-hidden="true" aria-labelledby="exampleModalCenterTitle"   class="modal fade" id="modalArticleData" role="dialog"
     tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h2 id="modaltitle">Article Detail</h2>
      </div>
      <div class="modal-body">
        <!--begin form-->

          <div id="FormsBody">
            <div class="col-12 bg-red text-white h2 p-2 rounded-3 d-none " id="checkEmpty">

            </div>
            <form id="form1" >
              <div>
                <h1 class="h1">Article</h1>
                <div class="form-group">
                  <label for="fArticleTitleModal" class="form-label h5">Title</label>
                  <input class="form-control form-control-lg check" id="fArticleTitleModal" name="fArticleTitleModal" type="text">
                </div>
                <div class="form-group">
                  <label for="arctImg" class="form-label h5">Article Image</label>
                  <img alt="article image" width="240px" height="240px" class="form-control form-control-lg" id="arctImg" name="arctImg">

                </div>
                  <div class="form-group">
                      <label for="Datafile" class="form-label h5">update Image (jpg ou png)</label>
                      <input class="form-control form-control-lg check" id="Datafile" name="Datafile" required type="file">
                  </div>
                <div class="form-group">
                  <label for="fArticleCatData" class="form-label h5">Category</label>

                  <select class="form-select" id="fArticleCatData" name="fArticleCatData" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php  foreach(User::getCategories() as $category){
                        $id=$category["id"];
                        $name=$category["catName"];
                        echo "<option value='$id'>$name</option>";

                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="arctDate" class="form-label h5">Added in</label>
                  <input class="form-control form-control-lg check" id="arctDate" name="arctDate" type="text" readonly>
                </div>
                <div class="form-group">
                  <label for="arctUser" class="form-label h5">Added By</label>
                  <input class="form-control form-control-lg check" id="arctUser" name="arctUser" type="text" readonly>
                </div>
                <div class="form-group ">
                  <label for="fArticleDescrModal" class="form-label h5">Description</label>
                  <textarea class="form-control form-control-lg" id="fArticleDescrModal" name="fArticleDescrModal" rows="3"></textarea>
                </div>

              </div>
            </form>

          </div>
          <div class="modal-footer" id="modelFooterData">

          </div>

        <!--end form-->
      </div>

    </div>
  </div>
</div>

<!-- TASK MODAL DELETE AND UPDATE-->