<script type="text/javascript">

var kk=	 "<?php echo $tm;?>" ;

function idleLogout( ) {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    function logout() {
        window.location.href = 'index.php';
        alert("You are logged out!");
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout, kk);  // time is in milliseconds
    }
}
 idleLogout();
</script> 