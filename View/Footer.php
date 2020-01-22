<!--Footer de la aplicacion
	Hecho por: xa8678
	04/10/2019
-->

</article>

<script type="text/javascript">
    //script para traducir strings en el front
    var translator = $('body').translate({lang: localStorage['lang'], t: dict});

    $(".lang_selector").on('click', function(e) {
        e.preventDefault();
        var elLanguage = $(this).attr("data-value");
        translator.lang(elLanguage);
        localStorage['lang']=elLanguage;
    })
</script>

</div>
<footer>
	<br>
	<div class="trn">Creado</div>: 24-10-19
	<br>
    <div class="trn">Autor</div>: xa8678
</footer>
</body>
</html>

		