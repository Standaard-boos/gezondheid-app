window.onload = function () {
    var t = false

$('input').focus(function () {
var $this = $(this)

t = setInterval(

function () {
    if (($this.val() < 1 || $this.val() > 10) && $this.val().length != 0) {
        if ($this.val() < 1) {
            $this.val(1)
        }

        if ($this.val() > 10) {
            $this.val(10)
        }

    }
}, 50)
})

$('input').blur(function () {
    if (t != false) {
    window.clearInterval(t)
    t = false;
    }
})
}

