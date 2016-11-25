String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};
function setUpComments(){
    var ids = '';
    var url = '/status/get_status_comments';
    var class_name = 'need_comments';
    var attr_name = 'status_comments_id';
    var attr_name_2 = 'status_comments_area_id';
    var html_structure = '<div class="user-block"><div class="col-xs-1"><img class="img-circle img-bordered-sm" src="[USERIMAGE]" alt="[USERNAME]"></div><div class="col-xs-11"><span class="username"><a href="javascript:void(0);">[USERNAME]</a></span><span class="date_need_format">[DATE]</span><p>[COMMENT_CONTENT]</p></div></div>';
    $( '.' + class_name ).each(function(){
        ids += $(this).attr(attr_name) + '|';
        $(this).removeClass(class_name);
    });
    $.getJSON( url, { 'ids': ids } ,  function( data ) {
        if( data.error.stat == false ){
            $.each(data.data.comments,function(index,value){
                $( "["+attr_name+"='"+index+"']").html("("+value.total_comments+")");
                $( "["+attr_name_2+"='"+index+"']").html("");
                $.each(value.comments,function(index2,value2){
                    aux = html_structure;
                    $( "["+attr_name_2+"='"+index+"']").append("" + aux.replaceAll('[USERIMAGE]',value2.user_avatar).replaceAll('[USERNAME]',value2.user_name).replaceAll('[COMMENT_CONTENT]',value2.content).replaceAll('[DATE]',value2.updated_at) + "");
                });
            });
        }
    });
}
function convertDateToReadable(){

    $(".date_need_format").each(function(){

    });
}
function bindFormsBlock(){
    $(".formSubmitPageBlock").submit(function(e){
        $(this).block({message:'<center><img src="/img/loading.gif" alt=""></center>'});
    });
}

function bindCommentStatusAdd(){
    $(".comment_add").submit(function(e){
            var m = {message:'<center><img src="/img/loading.gif" alt=""></center>'};
            var form = $(this);
            form.block( m );
            var sid = $(this).attr("status_id");
            $( "["+"status_comments_area_id"+"='"+sid+"']").block( m );

            $.post( {
              url: $(this).attr( 'action' ),
              data: $(this).serialize(),
              success: function( data ) {
                    $( "["+"status_comments_area_id"+"='"+sid+"']").unblock();
                    form.unblock();
                    form.find("[name='content']").val("");
                    if( data.error.stat == true ){
                        errorNotification("Error adding the comment.");
                    }else{
                        successNotification("Comment added");
                        $(".comment_number_status_"+sid).addClass("need_comments");
                        setUpComments();
                    }
                }
            } );
            e.preventDefault();
    });
}
function errorNotification(t){
    notification(t,'error');
}

function successNotification(t){
    notification(t,'success');
}

function notification(t,type){
    var n = noty({
		text: t ,
		layout: 'top',
		theme: 'defaultTheme',
		timeout: 3000,
		type:type,
		/*
		 timeout: 3000,
		 maxVisible: 5,
		 closeWith: ['click'],
		 animation: {
		 open: 'animated bounceInLeft', // Animate.css class names
		 close: 'animated bounceOutLeft', // Animate.css class names
		 easing: 'swing', // unavailable - no need
		 speed: 500 // unavailable - no need
		 },
		 callback: {
		 onShow: function() {},
		 afterShow: function() {},
		 onClose: function() {},
		 afterClose: function() {},
		 onCloseClick: function() {},
		 },*/
	});
}

function bindMultipleFormValidation(){
    $(".need_form_validate").each(function(){
        $(this).validate({

        });
    });
}

/**
 * Init document ready
 */
$( document).ready(function(e){
    setUpComments();
    bindFormsBlock();
    bindCommentStatusAdd();
    bindMultipleFormValidation();
});

