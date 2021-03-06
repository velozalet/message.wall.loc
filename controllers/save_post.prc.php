<?php
function __autoload($name_class) {  //load needs class when creating a class object
    require "../models/$name_class.php";
}

$O_GuestBook = new GuestBook();  //Object of GuestBook Class
?>
<!--------------------------------------------------------------------------------------------------->
<?php
if( $_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btn_modal_create_post']) ):   //var_dump($_POST);

    if( isset($_POST['title_post']) && !empty($_POST['title_post']) &&
        isset($_POST['text_post']) && !empty($_POST['text_post']) ){

        //filter the only gotten data from the User ($_POST['title_post'] & $_POST['text_post'])
        $title = $O_GuestBook->f_clearData($_POST['title_post'],'string_to_db_prepare');
        $text = $O_GuestBook->f_clearData($_POST['text_post'],'string_to_db_prepare');

        $id_user = ( !empty($_POST['id_user']) ) ? $_POST['id_user'] : null;
        $name_user = ( !empty($_POST['name_user']) ) ? $_POST['name_user'] : null;
        $gender_user = ( !empty($_POST['gender_user']) ) ? $_POST['gender_user'] : null;
        $email_user = ( !empty($_POST['email_user']) ) ? $_POST['email_user'] : null;
        $avatar_user = ( !empty($_POST['avatar_user']) ) ? $_POST['avatar_user'] : null;
        $link_user = ( !empty($_POST['link_user']) ) ? $_POST['link_user'] : null;
        $time_create = ( !empty($_POST['time_create']) ) ? $_POST['time_create'] : null;

        if( !$O_GuestBook->f_SavePosts($id_user, $name_user, $gender_user, $email_user, $avatar_user, $link_user, $title, $text, $time_create) ) {
            echo $err_msg = '<p class="text-center alert-danger">Произошла ошибка при выводе записей (!)</p>';
        }
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/?login=true');
    }
    else {
        echo $err_msg = '<p class="text-center alert-danger">Заполните пожалуйста все поля формы(!)</p>';
    }

endif;

