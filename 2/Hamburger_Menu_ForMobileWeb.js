var lines_container=document.getElementById("lines_container");
var line_1=document.getElementById("line_1");
var line_2=document.getElementById("line_2");
var lines=document.getElementsByClassName("line");
var bag=document.getElementById("bag");
var header=document.getElementById("header");
var list=document.getElementsByClassName("list");
var lists=document.getElementById("lists");
var list_search=document.getElementsByClassName("list_search")
//菜单点击出现与收回
lines_container.onclick=function(){
    if(lines_container.name=="lines_container_")
    {
        //菜单按钮打开动画
        line_1.setAttribute("name","line_1_on");
        line_2.setAttribute("name","line_2_on");
        line_1.style.top="23.5px";
        line_2.style.bottom="23.5px";
        setTimeout("line_2.setAttribute('name','line_2_on_');", 300 );
        //header背景变黑
        header.style.backgroundColor="rgba(0, 0, 0, 1)";
        //购物包飞出
        setTimeout("bag.style.right='-50px'", 200 );
        //菜单栏出现
        setTimeout("list[0].style.opacity='1',list[0].style.transform='none'", 300 );
        setTimeout("list[1].style.opacity='1',list[1].style.transform='none'", 350 );
        setTimeout("list[2].style.opacity='1',list[2].style.transform='none'", 400 );
        setTimeout("list[3].style.opacity='1',list[3].style.transform='none'", 450 );
        setTimeout("list[4].style.opacity='1',list[4].style.transform='none'", 500 );
        setTimeout("list[5].style.opacity='1',list[5].style.transform='none'", 550 );
        setTimeout("list[6].style.opacity='1',list[6].style.transform='none'", 600 );
        setTimeout("list[7].style.opacity='1',list[7].style.transform='none'", 650 );
        header.style.height="887px"
        //更改lines_container name为lines_container_on
        lines_container.setAttribute("name","lines_container_on");
    }
    else
    {
        //菜单按钮关闭动画
        line_1.setAttribute("name","line_1_");
        line_2.setAttribute("name","line_2_off");
        line_1.style.top="20px";
        line_2.style.bottom="20px";
        setTimeout("line_2.setAttribute('name','line_2_');", 200 );
        //header背景变浅
        header.style.backgroundColor="rgba(0, 0, 0, 0.8)";
        //购物包飞回
        setTimeout("bag.style.right='12px'", 350 );
        //菜单栏收回
        setTimeout("list[0].style.opacity='0',list[1].style.transform='scale(1.1) translateY(-24px)'", 400 );
        setTimeout("list[1].style.opacity='0',list[1].style.transform='scale(1.1) translateY(-24px)'", 350 );
        setTimeout("list[2].style.opacity='0',list[2].style.transform='scale(1.1) translateY(-24px)'", 300 );
        setTimeout("list[3].style.opacity='0',list[3].style.transform='scale(1.1) translateY(-24px)'", 250 );
        setTimeout("list[4].style.opacity='0',list[4].style.transform='scale(1.1) translateY(-24px)'", 200 );
        setTimeout("list[5].style.opacity='0',list[5].style.transform='scale(1.1) translateY(-24px)'", 150 );
        setTimeout("list[6].style.opacity='0',list[6].style.transform='scale(1.1) translateY(-24px)'", 100 );
        setTimeout("list[7].style.opacity='0',list[7].style.transform='scale(1.1) translateY(-24px)'", 50 );
        header.style.height="48px"
        lists.style.opacity="0.8";
        //更改lines_container_on name为lines_container_
        lines_container.setAttribute("name","lines_container_");
    }
}

