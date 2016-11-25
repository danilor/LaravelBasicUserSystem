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

    });
    $.getJSON( url, { 'ids': ids } ,  function( data ) {
        if( data.error.stat == false ){

            $.each(data.data.comments,function(index,value){
                $( "["+attr_name+"='"+index+"']").html("("+value.total_comments+")");
                $.each(value.comments,function(index2,value2){
                    aux = html_structure;
                    $( "["+attr_name_2+"='"+index+"']").append("" + aux.replaceAll('[USERIMAGE]',value2.user_avatar).replaceAll('[USERNAME]',value2.user_name).replaceAll('[COMMENT_CONTENT]',value2.content).replaceAll('[DATE]',value2.updated_at) + "");
                });
            });
            $(this).removeClass(class_name);

        }
    });
}

function convertDateToReadable(){

    $(".date_need_format").each(function(){

    });
}
/**
 * Init document ready
 */
$( document).ready(function(e){
    setUpComments();
});

