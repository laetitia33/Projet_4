function loadData(limitCount,pageCount,linkCount)
{
  var xmlhttp = new XMLHttpRequest();
  var url = "process.php?limitCount="+limitCount+"&pageCount="+pageCount+"&linkCount="+linkCount;
  
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
        var myArr = JSON.parse(this.responseText);
        
        setInterval(function() {
        document.getElementById("overlay").style.display = "none"; 
            
      },500);
        document.getElementById("showData").innerHTML = myArr.results;
          document.getElementById("showLinks").innerHTML = myArr.links;
          
      }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}



function changelimit(v) {
  loadData(v,1,1)
  return false;
}