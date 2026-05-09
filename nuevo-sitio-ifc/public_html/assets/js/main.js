const b=document.getElementById('menuBtn'),m=document.getElementById('menu');if(b&&m){b.onclick=()=>{m.classList.toggle('open');b.setAttribute('aria-expanded',m.classList.contains('open'));};}
