<script type="text/javascript">
function idleLogout( var log_time) {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    function logout() {
        window.location.href = 'index.php';
        alert("logout");
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, log_time);  // time is in milliseconds
    }
}

</script> 