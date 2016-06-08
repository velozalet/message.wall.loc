jQuery(document).ready(function(){


/** tooltip when hover an element */
    $("[data-toggle='tooltip']").tooltip();

/** Get count DOM with posts User in "Guest Book" & insert this number in header title "Wall of Message" */
    var domAllPostsCnt = $('div[id="wrap_post"]'); //console.dir(domAllPostsCnt.length);
    $('div.container-fluid > header > h3.text-center').append('<sub class="text-info">('+domAllPostsCnt.length+')</sub>');
    $('div.container-fluid > header > h3.text-center > sub:nth-child(3)').remove();

    /** Get count DOM with comments User for specific post & insert this number in block-button "Comments"*/
    //#wrap_post > div.column2.content.col-lg-9.col-md-9.col-sm-12.myself_post > label
    //var domAllPostsCnt = $('div[id="wrap_post"]'); //console.dir(domAllPostsCnt.length);
    //$('div.container-fluid > header > h3.text-center').append('<sub>('+domAllPostsCnt.length+')</sub>');
    //$('div.container-fluid > header > h3.text-center > sub:nth-child(3)').remove();


/** Lift buttons "Down" &  "Up" */
    $("#up").bind('click', function(event) {  //For lift button "Up"
         event.preventDefault();
        $("html,body").animate({"scrollTop":0},"slow");
    });

    $("#down").bind('click', function(event) {  //For lift button "Down"
        event.preventDefault();
        var height=$("body").height();
        //var height = $("html").height();
        $("html,body").animate({"scrollTop":height},"slow");
    });


/** change the chevron icon in the comment blocks when is blocks open/closed */
    $( "#wrap_post > div.column2 > label" ).each(function() {
        var $domLabelComments = $(this);
        var cnt = 0;

        $domLabelComments.bind('click', function(event) {
            cnt++;
            var $fafa = $domLabelComments.find("b > em.fa.fa-chevron-circle-up");
            $fafa.removeClass("fa-chevron-circle-up");
            $fafa.toggleClass("fa-chevron-circle-down", cnt % 2 === 0);
            $fafa.addClass("fa-chevron-circle-up");
        });

    });


/** Click on button "Comment": transfer value from 'data-idpost' & 'data-indicator' to Modal window "Create comments" */
    jQuery('#wrap_post > div.column2 > label > button').bind('click', function(event){
        //transfer value from 'data-idpost' to Modal window "Create comments" to (value) to <input type="hidden" name='id_post' value=""
        var $idParentPost = $(this).data("idpost");  //console.log($(this).data("idpost"));
        $('#modal_create_comment > div > div > div.modal-body > form > input[type="hidden"]:nth-child(2)').val($idParentPost);
        //transfer value from 'data-indicator' to Modal window "Create comments" to (value) to <input type="hidden" name='indicator' value=""
        var $indicator = $(this).data("indicator");
        $('#modal_create_comment > div > div > div.modal-body > form > input[type="hidden"]:nth-child(3)').val($indicator);
    });


/** Click on button "Edit Post": transfer value from 'data-idpostforedit' to Modal window "Edit Post"  and
                                 transfer text from parent post(<dd class="post_user">) to Modal window "Edit Post" into <texarea> */
    jQuery('#wrap_post > div.column2 > button.btn_edit_post').bind('click', function(event){
        //transfer value from 'data-idpostforedit' to Modal window "Edit Post" to (value) to <input type="hidden" name='id_post' value=""
        var $idParentPost = $(this).data("idpostforedit");  //console.log($idParentPost);
        $('#modal_edit_post > div > div > div.modal-body > form > input[type="hidden"]:nth-child(2)').val($idParentPost);
        //transfer text from parent post(<dd class="post_user">) to Modal window "Edit Post" into <texarea>
        var $textThisPost = $(this).prevAll().prevAll().find('dd.post_user').text();  //console.log($textThisPost);
        $('#modal_edit_post > div > div > div.modal-body > form > div > textarea').val($textThisPost);
    });


/** Click on button "Edit Comment": transfer value from 'data-idcommentforedit' to Modal window "Edit Comment"  and
 transfer text from parent comment(<dd class="post_user">) to Modal window "Edit Comment" into <texarea> */
    jQuery('#wrap_comments > div.myself_post > dl > button.btn_edit_comment').bind('click', function(event){
        //transfer value from 'data-idcommentforedit' to Modal window "Edit Comment" to (value) to <input type="hidden" name='id_post' value=""
        var $idParentComment = $(this).data("idcommentforedit");  //console.log($idParentComment);
        $('#modal_edit_comment > div > div > div.modal-body > form > input[type="hidden"]:nth-child(2)').val($idParentComment);
        //transfer text from parent post(<dd class="post_user">) to Modal window "Edit Comment" into <texarea>
        var $textThisComment = $(this).prevAll().text();  console.log($(this).prevAll().text());
        $('#modal_edit_comment > div > div > div.modal-body > form > div > textarea').val($textThisComment);

    });


}); //__/(document).ready
