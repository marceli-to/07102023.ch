(function(){const r={wrapper:"[data-counter-wrapper]",counter:"[data-counter]"},n=()=>{setInterval(a,1e3)},a=()=>{const e=Date.parse("2023-10-07T19:00:00")-Date.now();let c=Math.floor(e/(1e3*60*60*24)),s=Math.floor(e/(1e3*60*60)%24),t=Math.floor(e/(1e3*60)%60);t<10&&(t=`0${t}`);let o=Math.floor(e/1e3%60);o<10&&(o=`0${o}`);const u=document.querySelector(r.counter);u.textContent=`${c}:${s}:${t}:${o}`,document.querySelector(r.wrapper).classList.remove("is-hidden")};n()})();