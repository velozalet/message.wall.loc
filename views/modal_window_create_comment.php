<!-- MODAL WINDOW BLOCK -->
<div class="modal fade" id="modal_create_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-sm"> <!--modal-sm / modal-lg-->
        <div class="modal-content">

            <!--Header of modal window-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel"><em class='fa fa-lg fa-comments'></em> Create Comment</h3>
            </div>
            <!--/Header of modal window-->

            <!--Content of modal window-->
            <div class="modal-body">

                <!--form-->
                <form class='form-inline' action="controllers/save_comment.prc.php" method="POST"> <!-- controllers/save_comment.prc.php -->
                    <div class="input-group">
                        <span class="input-group-addon"> <em class='fa fa-tasks'></em> </span>
                        <textarea class='form-control input-lg' name='text_post' rows="5" cols="88" maxlength="300" title="Максимально 300 символов" placeholder="Text comment" style="resize: none" required></textarea>
                    </div>

                    <input type="hidden" name='id_post' value=""> <!-- value transfer through JS(/assets/js/main.js) -->
                    <input type="hidden" name='indicator' value=""> <!-- value transfer through JS(/assets/js/main.js) -->
                    <input type="hidden" name='id_user' value="<?=$_COOKIE["user_id_in_fb"];?>">
                    <input type="hidden" name='name_user' value="<?=$_COOKIE["user_name_in_fb"];?>">
                    <input type="hidden" name='gender_user' value="<?=$_COOKIE["user_gender_in_fb"];?>">
                    <input type="hidden" name='email_user' value="<?=$_COOKIE["user_email_in_fb"];?>">
                    <input type="hidden" name='avatar_user' value="<?=$_COOKIE["user_avatar_in_fb"];?>">
                    <input type="hidden" name='link_user' value="<?=$_COOKIE["user_link_in_fb"];?>">
                    <input type="hidden" name='time_create' value="<?=time();?>">
                    <br><br>
                    <button type='reset' class='btn btn-sm btn-default'><em class='glyphicon glyphicon-remove'></em> Clear form</button>
                    <button type='submit' name='btn_modal_create_comment' class='btn btn-sm btn-success'><em class='fa fa-lg fa-paperclip'></em> Create comment </button>
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