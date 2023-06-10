
let mymenue=document.querySelector("ul");
let toggl=document.getElementById("toggle-menue");

toggl.onclick=function(){
    mymenue.classList.toggle("Ulmenue");
}

let mypngUp=document.querySelector(".png_up");
// console.log(mypngUp);
window.onscroll=function(){
    if (window.scrollY>=600){
        mypngUp.style.display="block";

    }
    else {
        mypngUp.style.display="none";
    }
};
mypngUp.onclick=function(){
    window.scrollTo({
        left:0, top:0,
        behavior : "smooth",
    
    })
};
// let img_gal1=[
//     './b3.jpg',
//     './b4.jpg',
//     './b6.jpg'
   
// ];
// let i=0;
// let pic=$('.img_gal');
// setInterval(function(){
//     i=(i+i)%img_gal1.length
//     $(document).ready(function(){
//         pic.fadeOut(3000,()=>{
//     pic.attr('src',img_gal1[i]);
//             pic.fadeIn(3000);
           
//         });
//     });
// },3000);

// let seemorw=document.querySelector(".seemorw");
// let hide_seemorw=document.querySelector(".hide_seemorw");
// let step_Hide_more=document.getElementById("step_Hide_more");
// console.log(seemorw);
// seemorw.onclick=function(){
//     hide_seemorw.style.display="none";
//     step_Hide_more.style.display="flex";
//     step_Hide_more.after(hide_seemorw);
//     hide_seemorw.style.display="block";
   
  
// }

// let Login_overlay_up=document.getElementById("Login_overlay_up");
// let btnnav=document.getElementById("btnnav");
// let login=document.getElementById("login");
// let btnnav1=document.getElementById("btnnav1");

// btnnav1.onclick=function(){
//     Login_overlay_up.style.display="none";
   
//     if(login.style.display=="block")
//     {
//         login.style.display="none";
//     }
//     else{
//         login.style.display="block";
//     }
// }

// overlay_up


// btnnav.onclick=function(){
    
//     login.style.display="none";
//     if(Login_overlay_up.style.display=="block")
//     {
//         Login_overlay_up.style.display="none";
//     }
//     else{
//         Login_overlay_up.style.display="block";
//     }
// }

let close_overly=document.getElementById("login");
let close_window=document.getElementById("close_window");
let close_window1=document.getElementById("close_window1");
close_window.onclick=function(){
    close_overly.style.display="none";
    
    
   

}
close_window1.onclick=function(){
    Login_overlay_up.style.display="none";

}


