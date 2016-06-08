<!-- MODAL WINDOW BLOCK -->
<div class="modal fade" id="modal_create_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog"> <!--modal-sm / modal-lg-->
        <div class="modal-content">

            <!--Header of modal window-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel"><em class='fa fa-book'></em> Create Post</h3>
            </div>
            <!--/Header of modal window-->

            <!--Content of modal window-->
            <div class="modal-body">

                <!--form-->
                <form class='form-inline' action="controllers/save_post.prc.php" method="POST"> <!-- controllers/save_post.prc.php -->
                    <div class="input-group">
                        <span class="input-group-addon "> <em class='glyphicon glyphicon-user'></em> </span>
                        <input class="form-control input-lg" type="text" name='name_user1' size="25" value="<?=$_COOKIE["user_name_in_fb"];?>" disabled>
                    </div>
                    <div style='height:5px;'></div> <!--devider-->
                    <div class="input-group">
                        <span class="input-group-addon "> <em class='glyphicon glyphicon-envelope'></em> </span>
                        <input class="form-control input-lg" type="text" name='email_user1' size="25" value="<?=$_COOKIE["user_email_in_fb"];?>" disabled>
                    </div>
                    <div style='height:5px;'></div> <!--devider-->
                    <div class="input-group">
                        <span class="input-group-addon "> <em class='fa fa-quote-right'></em> </span>
                        <input class="form-control input-lg" type="text" name='title_post' size="25" value="" placeholder="Title topic" required>
                    </div>
                    <div style='height:5px;'></div> <!--devider-->
                    <div class="input-group">
                        <span class="input-group-addon "> <em class='fa fa-tasks'></em> </span>
                        <textarea class='form-control input-lg' name='text_post' rows="6" cols="28" maxlength="500" title="Максимально 500 символов" placeholder="Text topic" style="resize: none" required></textarea>

                    </div>

                    <input type="hidden" name='id_user' value="<?=$_COOKIE["user_id_in_fb"];?>">
                    <input type="hidden" name='name_user' value="<?=$_COOKIE["user_name_in_fb"];?>">
                    <input type="hidden" name='gender_user' value="<?=$_COOKIE["user_gender_in_fb"];?>">
                    <input type="hidden" name='email_user' value="<?=$_COOKIE["user_email_in_fb"];?>">
                    <input type="hidden" name='avatar_user' value="<?=$_COOKIE["user_avatar_in_fb"];?>">
                    <input type="hidden" name='link_user' value="<?=$_COOKIE["user_link_in_fb"];?>">
                    <input type="hidden" name='time_create' value="<?=time();?>">

                    <br><br>

                    <button type='reset' class='btn btn-lg btn-default'><em class='glyphicon glyphicon-remove'></em> Clear form</button>
                    <button type='submit' name='btn_modal_create_post' class='btn btn-lg btn-success'><em class='fa fa-lg fa-paperclip'></em> Create post </button>

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