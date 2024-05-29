<script type="text/javascript">
function idleLogout(  ) {
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
        t = setTimeout(logout, 200000);  // time is in milliseconds
    }
}
 idleLogout();
</script> 