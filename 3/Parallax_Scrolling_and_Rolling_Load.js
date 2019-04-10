$(document).ready(function(){
    var p=0;
    $(window).scroll(function(){
        var top=$(this).scrollTop();
        //page_1_bg1的位置获取
        var bg1_top=$("#page_1_bg1").css("background-position");
        bg1_top=Number(bg1_top.slice(4,-2));
        //page_1_bg2
        var bg2_top=$("#page_1_bg2").css("background-position");
        bg2_top=Number(bg2_top.slice(4,-2));
        //page_1_bg2
        var bg3_top=$("#page_2_bg1").css("background-position");
        bg3_top=Number(bg3_top.slice(4,-2));
        //视差滚动
        if(p<=top){                                                //下滚
            //page_1_bg1的视差滚动
            bg1_top=bg1_top-0.03*(top-p);
            $("#page_1_bg1").css({"background-position":"50% "+bg1_top+"px"});
            //page_1_bg2
            bg2_top=bg2_top-0.05*(top-p);
            $("#page_1_bg2").css({"background-position":"50% "+bg2_top+"px"});
            //page_2_bg1
            bg3_top=bg3_top-0.05*(top-p);
            $("#page_2_bg1").css({"background-position":"50% "+bg3_top+"px"});
            //page_3滚动动画，下滚入page_3加载
            if(bg3_top<6.2){
                $("#qblog_animate").addClass("qblog_animate_on");
            }
        }
        else{                                                       //上滚
            bg1_top=bg1_top+0.03*(p-top);
            $("#page_1_bg1").css({"background-position":"50% "+bg1_top+"px"});
            bg2_top=bg2_top+0.05*(p-top);
            $("#page_1_bg2").css({"background-position":"50% "+bg2_top+"px"});
            bg3_top=bg3_top+0.05*(p-top);
            $("#page_2_bg1").css({"background-position":"50% "+bg3_top+"px"});
            //page_3滚动动画，上滚出page_3重置
            if(bg3_top>6.2&&bg3_top<11.2){
                $("#qblog_animate").removeClass("qblog_animate_on");
            }
        }
        p=top;
    })
})