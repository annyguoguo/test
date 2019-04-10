function change()
{
    var inner=document.getElementsByClassName("inner");
    var pro=document.getElementsByClassName("pro");
    for(var i=0;i<3;i++)
    {
        if(inner[i].value!="")
        {
            pro[i].style.color="rgb(40, 136, 200)";
            pro[i].style.bottom=30+"px";
            pro[i].style.fontSize=24+"px"; 
        }
        else
        {
            pro[i].style.color=null;
            pro[i].style.bottom=null;
            pro[i].style.fontSize=null;
        }
    }
}
var fire=document.getElementById("fire");
var left,bottom,time,delay;
for(var i=0;i<36;i++)
{
    var div=document.createElement("div");
    div.className="fly";
    fire.appendChild(div);
    left=Math.random()*42-27;
    bottom=Math.random()*44-170;
    time=Math.random()*1+0.7;
    delay=Math.random()*3;
    div.style.left=left+"px";
    div.style.bottom=bottom+"px";
    div.style.animationDuration=time+"s";
    div.style.animationDelay=delay+"s";
}