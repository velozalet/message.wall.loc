<!-- MODAL WINDOW BLOCK -->
<div class="modal fade" id="modal_edit_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog"> <!--modal-sm / modal-lg-->
        <div class="modal-content">

            <!--Header of modal window-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel"><em class='fa fa-lg fa-comments'></em> Edit Comment </h3>
            </div>
            <!--/Header of modal window-->

            <!--Content of modal window-->
            <div class="modal-body">

                <!--form-->
                <form class='form-inline' action="controllers/edit_comment.prc.php" method="POST"> <!-- controllers/save_comment.prc.php -->
                    <div class="input-group">
                        <span class="input-group-addon"> <em class='fa fa-tasks'></em> </span>
                        <textarea class='form-control input-lg edit_textarea' name='text_post' rows="5" cols="88" maxlength="500"  style="resize: none" required></textarea>
                    </div>

                    <input type="hidden" name='id_post' value=""> <!-- value transfer through JS(/assets/js/main.js) -->
                    <br><br>
                    <button type='submit' name='btn_modal_edit_comment' class='btn btn-sm btn-success'><em class='fa fa-lg fa-comment'></em> Edit Comment </button>
                </form>
                <!--/form-->

            </div>
            <!--/Content of modal window-->

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Closed</button>
            </div>

        </div> <!-- modal-content. END -->
    </div> <!-- modal-dialog. END -->
</div>
<!--/MODAL WINDOW BLOCK -->