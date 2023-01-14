var search = document.getElementById("search");
var data = document.getElementById("main-content");

search.addEventListener("keyup", function () {
 
  var objAjax = new XMLHttpRequest();

  // cek kesiapan ajax
  objAjax.onreadystatechange = function () {
    if ((objAjax.readyState = 4 && objAjax.status == 200)) {
      data.innerHTML = objAjax.responseText;
    }
  };

  objAjax.open("GET", "data.php?search=" + search.value, "true");
  objAjax.send();
});

document.getElementById('selecturut').addEventListener('change', function () {
  var objAjax = new XMLHttpRequest();

  // cek kesiapan ajax
  objAjax.onreadystatechange = function () {
    if ((objAjax.readyState = 4 && objAjax.status == 200)) {
      data.innerHTML = objAjax.responseText;
    }
  };

  objAjax.open('GET', 'asc.php?search=' + this.value, 'true');
  objAjax.send();
});
