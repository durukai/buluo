function setTab(name,name2,cursel,n){
 for(i=1;i<=n;i++){
  var menu=document.getElementById(name+i);
  var con=document.getElementById(name2+i);
  menu.className=i==cursel?"current":"";
  con.style.display=i==cursel?"block":"none";
 }
}
