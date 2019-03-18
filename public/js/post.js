
$(document).ready(function () {

$('.viewComments').click(function () {
       var ID=$(this).attr('id');

    $.ajax({
        type:"get",
        url:"status/"+ID+"/comments",
       /* data:"post_id="+ID,*/
        dataType:'json',
        cache:false,
        success:function (data) {/*Array of objects*/
            /*console.log(data);*/
            $.each(data,function (index,item) {/*Multiple objects*/
               /* console.log(item);*/
                $.each(item,function (key,value) {/*Each object ko multiple data such as comment ,created at, post_id,comment_id*/
                /* console.log(value);*/
                    $("#view_comments"+ID).append("<div class='form-control' style='margin-bottom: 7px;'><li style='list-style: none;'><a href="+value.user_id+"><img src=images/"+value.user.avatar+" height='22' width='22' style='border-radius: 10%;'> "+value.user.firstname+" "+value.user.lastname+"</a> at "+value.created_at+"<br>"+value.comment+"</li></div>");
                });

            });
            $("#view"+ID).remove();
            $("#three_comments"+ID).remove();

        }
    });
    return false;
     /*Won't let opening url*/
});

});
