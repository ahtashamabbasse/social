$(document).ready(function () {
    var postId=0;
    $("body").delegate(".edit","click",function(){
        postId=$(this).attr("data-PostId");
        var status=$(".status"+postId).text();
        $("#edit_status_area").val(status)
        $("#myModal").modal();
    })
    $("#update_btn").on("click",function () {
        var status=$("#edit_status_area").val();
        $.ajax({
            url:urledit,
             type:"Post",
            dataType:"json",
            data:{post_id:postId,status:status,_token:_token},
            success:(function (data) {
                    $(".status"+postId).text(data.status);
                $("#myModal").modal("hide");
            })
        })
    })

    $(".like").on("click",function (event) {
        event.preventDefault();
        var isLike=event.target.previousElementSibling==null;
        var post_id=event.target.parentNode.parentNode.parentNode.dataset['postid']
        $.ajax({
            url:urlLike,
            method:"POST",
            data:{post_id:post_id,_token:_token,isLike:isLike},
            success:function (data) {
                event.target.innerText=isLike ? event.target.innerText=="Like"?event.target.innerText="Liked":"Like":event.target.innerText=="Dislike"?event.target.innerText="DisLiked":"Dislike";
                if(isLike)
                {
                    event.target.nextElementSibling.innerText="Dislike"
                }
                else
                {
                    event.target.previousElementSibling.innerText="Like";
                }
            }
        })

    })
})