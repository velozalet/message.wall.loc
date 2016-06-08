<?php  //btn_modal_edit_post
function __autoload($name_class) {  //load needs class when creating a class object
    require "../models/$name_class.php";
}

$O_GuestBookEditPost = new GuestBook();  //Object of GuestBook Class
?>
    <!--------------------------------------------------------------------------------------------------->
<?php
//var_dump($_POST);die;
if( $_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btn_modal_edit_post']) ):

    if( isset($_POST['text_post']) && !empty($_POST['text_post']) &&
        isset($_POST['id_post']) && !empty($_POST['id_post']) ){

        $text = $O_GuestBookEditPost->f_clearData($_POST['text_post'],'string_to_db_prepare');
        $id_post = $O_GuestBookEditPost->f_clearData($_POST['id_post'],'string_to_db_prepare');
        $id_post = (int)$id_post;

        if( !$O_GuestBookEditPost->f_updatePost($id_post, $text) ){
            echo $err_msg = '<p class="text-center alert-danger">Произошла ошибка при выводе записей (!)</p>';
        }
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/?login=true');
    }
    else {
        echo $err_msg = '<p class="text-center alert-danger">Заполните пожалуйста все поля формы(!)</p>';
    }

endif;