(function(){const r={wrapper:"[data-counter-wrapper]",counter:"[data-counter]"},n=()=>{setInterval(c,1e3)},c=()=>{const t=Date.parse("2023-10-07T19:00:00")-Date.now(),s=Math.floor(t/(1e3*60*60*24)),a=Math.floor(t/(1e3*60*60)%24),e=Math.floor(t/(1e3*60)%60);e<10&&(e=`0${e}`);const o=Math.floor(t/1e3%60);o<10&&(o=`0${o}`);const u=document.querySelector(r.counter);u.textContent=`${s}:${a}:${e}:${o}`,document.querySelector(r.wrapper).classList.remove("is-hidden")};n()})();