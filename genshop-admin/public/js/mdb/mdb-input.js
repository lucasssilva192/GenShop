document.onreadystatechange = function () {
    if (document.readyState === 'interactive') {
       let elementos = document.getElementsByClassName("form-outline");
       elementos.forEach(element => {
           element.insertAdjacentHTML('beforeend','<div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 94.4px;"></div><div class="form-notch-trailing"></div></div>'); 
       });
    }
  }