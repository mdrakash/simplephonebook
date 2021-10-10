function adduser(){
    var name=$('#name').val();
    var phone=$('#phone').val();
    var username=$('#username').val();

$.ajax({
    url:"php/function.php",
    type:"post",
    data:{
        name:name,
        phone:phone,
        username:username,
    },
    success:function(data,status){
        $('#exampleModal').modal('hide');
        display();
    }
});

};

function display(){
    var username=$('#username').val();
    var display="true";
    $.ajax({
        url:"php/function.php",
        type:"post",
        data:{
            display:display,
            username:username
        },
        success:function(data,status){
            $('#displaytable').html(data);
        }
    });
};

$(document).ready(function(){
    display();
});
