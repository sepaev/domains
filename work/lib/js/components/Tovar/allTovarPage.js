<script>

$('td input').click(function (e) {

    var wr = $('#where').val()
    if (!wr) {
        url = document.location.href + "/?where=" + this.name + "=" + this.value
    } else {
        url = document.location.href + ";" + this.name + "=" + this.value
    }
    //alert(url)
    var enc = encodeURI(url);
    //alert(enc)
    var dec = decodeURI(enc);
    //alert(dec)
    window.location = dec
})
</script>