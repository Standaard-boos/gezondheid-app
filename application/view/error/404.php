<body class="fourbody">
<a href="javascript:history.back()">
    <svg height="0.8em" width="0.8em" viewBox="0 0 2 1" preserveAspectRatio="none">
        <polyline
                fill="none"
                stroke="#777777"
                stroke-width="0.1"
                points="0.9,0.1 0.1,0.5 0.9,0.9"
        />
    </svg> Terug
</a>
<div class="fourbackground-wrapper">
    <h1 id="visual">404</h1>
</div>
<p>Pagina niet gevonden</p>
</body>


<script>
    const visual = document.getElementById("visual")
    const events = ['resize', 'load']

    events.forEach(function(e){
        window.addEventListener(e, function(){
            const width = window.innerWidth
            const height = window.innerHeight
            const ratio = 45 / (width / height)
            visual.style.transform = "translate(-50%, -50%) rotate(-" + ratio + "deg)"
        });
    });
</script>