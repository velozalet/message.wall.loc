<?php
/*----------------------------------------------------
   Template to display all the Posts Users from DB
____________________________________________________*/
ob_start();  //content buffering start
$arr_all_posts = $O_GuestBook->f_GetPosts();
$arr_all_comments = $O_GuestBook->f_GetComments();


if( !is_array($arr_all_posts) ):
    echo $err_msg = '<p class="text-center alert-danger">Произошла ошибка при выводе записей (!)</p>';
elseif( empty($arr_all_posts) ):
    echo $err_msg = '<p class="text-center text-info">В <code>"Guest Book"</code> нет еще ни одной записи. Напишите сообщение и будете первым!</p>';
else:

    for($i=0, $cnt_all_posts=count($arr_all_posts); $i < $cnt_all_posts; ++$i){  //var_dump($arr_all_posts);  ?>

        <div data-key="<?=$arr_all_posts[$i]['id']; ?>">
<!-- DISPLAY ALL POSTS -->
            <div id="wrap_post">
                <div class="column1 content col-lg-3 col-md-3 col-sm-3">
                    <dl class="post_profile_user">
                        <dd class="avatar_user">
                            <img src="<?=$arr_all_posts[$i]['avatar_user']; ?>" alt="url avatar user">
                        </dd>
                        <dd class="name_user" data-iduser="<?=$arr_all_posts[$i]['id_user']; ?>">
                            <strong>Name: </strong><?=$arr_all_posts[$i]['name_user']; ?>
                            <br>
                            <a href="<?=$arr_all_posts[$i]['link_user']; ?>" class="link_to_profile_user" target="_blank">Facebook account User</a>
                        </dd>
                        <dd class="gender_user">
                            <strong><em class="fa fa-envelope"></em></strong> <?=$arr_all_posts[$i]['email_user']; ?>
                        </dd>
                        <dd class="gender_user">
                            <strong>Gender: <em class="fa fa-lg <?=$gend = ($arr_all_posts[$i]['gender_user'] == 'male') ? 'fa-male' : 'fa-female';?> "></em></strong> <?=$arr_all_posts[$i]['gender_user']; ?>
                        </dd>
                        <dd class="countpost_user">
                        </dd>
                    </dl>
                </div>
                 <!-- compare User ID  with User ID from cookie. If this is own post - select them another color to add class 'myself_post' -->
                <div class="column2 content col-lg-9 col-md-9 col-sm-12 <?=$self=( strval($_COOKIE["user_id_in_fb"]) == strval($arr_all_posts[$i]['id_user']) ) ? 'myself_post' : ''; ?>">
                    <dl class="post_content" data-idpost="<?=$arr_all_posts[$i]['id']; ?>">
                        <dt class="post_title"><?=$arr_all_posts[$i]['title']; ?></dt>
                        <dd class="post_datecreate pull-right"><i><?=date("d M Y, H:i",$arr_all_posts[$i]['time_create']); ?></i></dd>
                        <br>
                        <dd class="post_user">
                            <?=$arr_all_posts[$i]['text']; ?>
                        </dd>
                    </dl>

                    <input type="checkbox" id="my_checkbox-<?=$i+1;?>" class="btn btn-info">
                    <label for="my_checkbox-<?=$i+1;?>" class="btn btn-info">
                        <b><em class="fa fa-comments fa-lg"></em> Comments: <em class="fa fa-chevron-circle-up fa-lg"></em> </b> &nbsp;
                        <?php if( isset($_COOKIE["user_name_in_fb"]) || !empty($_COOKIE["user_name_in_fb"]) ):  //if User is login or not login ?>
                        <button type="button" class="btn btn-info btn-sm btn_comment" data-toggle="modal" data-target="#modal_create_comment" data-idpost="<?=$arr_all_posts[$i]['id']; ?>" data-indicator="0">
                            <em class='fa fa-lg fa-comment'></em> Comment
                        </button>
                        <?php endif; ?>
                    </label>
                <!--Insert button "Edit Post" if his post is property current User-->
                    <?php if( isset($_COOKIE["user_name_in_fb"]) || !empty($_COOKIE["user_name_in_fb"]) ):  //if User is login or not login
                                if( strval($_COOKIE["user_id_in_fb"]) == strval($arr_all_posts[$i]['id_user']) ){  //if this post is property active(login in) User ?>
                                    <button type="button" class="btn btn-success btn-xs pull-right btn_edit_post" data-toggle="modal" data-target="#modal_edit_post" data-idpostforedit="<?=$arr_all_posts[$i]['id']; ?>">
                                        <em class='fa fa-lg fa-paperclip'></em> Edit Post
                                    </button>
                                <?php } ?>
                    <?php endif; ?>
                <!--/Insert button "Edit Post" if his post is property current User-->
                    <br>
<!--/ DISPLAY ALL POSTS -->
<!-- DISPLAY COMMENTS to A SPECIFIC POST -->
                    <div class="blockcomment-<?=$i+1;?>">   <!--class="collapse"-->
                    <?php   //var_dump($arr_all_comments);
                    if( !is_array($arr_all_comments) ):
                        echo $err_msg = '<p class="text-center alert-danger">Произошла ошибка при выводе комментариев (!)</p>';
                    else:
                        for($k=0, $cnt_all_comments=count($arr_all_comments); $k < $cnt_all_comments; ++$k):
                            if( $arr_all_posts[$i]['id'] == $arr_all_comments[$k]['id_parent'] ): ?>
                                <div data-key="<?=$arr_all_comments[$k]['id']; ?>">

                                    <div id="wrap_comments">
                                        <div class="column1 content col-lg-3 col-md-3 col-sm-3">
                                            <dl class="post_profile_user">
                                                <dd class="avatar_user">
                                                    <img src="<?=$arr_all_comments[$k]['avatar_user']; ?>" alt="url avatar user">
                                                </dd>
                                                <dd class="name_user" data-iduser="<?=$arr_all_comments[$k]['id_user']; ?>">
                                                    <strong>Name: </strong><?=$arr_all_comments[$k]['name_user']; ?>
                                                    <br>
                                                    <a href="<?=$arr_all_comments[$k]['link_user']; ?>" class="link_to_profile_user" target="_blank">Facebook account User</a>
                                                </dd>
                                                <dd class="gender_user">
                                                    <strong>Gender: <em class="fa fa-lg <?=$gend = ($arr_all_comments[$k]['gender_user'] == 'male') ? 'fa-male' : 'fa-female';?> "></em></strong> <?=$arr_all_comments[$k]['gender_user']; ?>
                                                </dd>
                                                <dd class="countpost_user">
                                                </dd>
                                            </dl>
                                        </div>
                                        <!-- compare User ID  with User ID from cookie. If this is own post - select them another color to add class 'myself_post' -->
                                        <div class="column2 content col-lg-9 col-md-9 col-sm-12 <?=$self=( strval($_COOKIE["user_id_in_fb"]) == strval($arr_all_comments[$k]['id_user']) ) ? 'myself_post' : ''; ?>">
                                            <dl class="post_content" data-idpost="<?=$arr_all_comments[$i]['id']; ?>">
                                                <dd class="post_datecreate pull-right"><i><?=date("d M Y, H:i",$arr_all_comments[$k]['time_create']); ?></i></dd>
                                                <br>
                                                <dd class="post_user">
                                                    <?=$arr_all_comments[$k]['text']; ?>
                                                </dd>
                                            <!--Insert button "Edit Comment" if his post is property current User-->
                                                <?php if( isset($_COOKIE["user_name_in_fb"]) || !empty($_COOKIE["user_name_in_fb"]) ):  //if User is login or not login
                                                    if( strval($_COOKIE["user_id_in_fb"]) == strval($arr_all_comments[$k]['id_user']) ){  //if this post is property active(login in) User ?>
                                                        <button type="button" class="btn btn-success btn-xs pull-right btn_edit_comment" data-toggle="modal" data-target="#modal_edit_comment" data-idcommentforedit="<?=$arr_all_comments[$k]['id']; ?>">
                                                            <em class='fa fa-lg fa-comment'></em> Edit Comment
                                                        </button>
                                                    <?php } ?>
                                                <?php endif; ?>
                                             <!--/Insert button "Edit Post" if his post is property current User-->
                                            </dl>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                        <?php endfor ?>
                    <?php endif; ?>
                    </div>  <!--/ <div class="blockcomment-%">-->
                </div>
<!--/ DISPLAY COMMENTS to A SPECIFIC POST -->

            </div> <!--/ <div id="wrap_post">-->

        </div>  <!--/ data-key-->

    <?php } //__/loop for ?>

<?php endif; ?>


<?php require_once "modal_window_create_comment.php"; ?> <!--include modal window with form to send comment by post-->
<?php require_once "modal_window_edit_post.php"; ?> <!--include modal window with form edit own posts-->
<?php require_once "modal_window_edit_comment.php"; ?> <!--include modal window with form edit own comments-->

<br><br>

<?php
