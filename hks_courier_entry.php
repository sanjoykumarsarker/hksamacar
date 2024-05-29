<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Courier Entry</title>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha256-+nuEu243+6BveXk5N+Vbr268G+4FHjUOEcfKaBqfPbc=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="col-sm-12 col-md-12 contact-form" style="background-color: #ffd7eb;">
        <form id="contact" method="post" class="form"  role="form" target="hks_courier_entry_iframe" action="hks_courier_entry_iframe.php">
            <div class="row" style="background-color: #ffd7eb; padding: 10px 0px 0px 0px">
                <div class="col-xs-4 col-md-4 form-group" >
                    <div class="form-group row">
                        <label for="isn" class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold;">  ISSUE NUMBER</label>
                        <div class="col-sm-6" >
                            <input type="text" class="form-control" id ="isn" name="issue_number" placeholder="ISSUE NUMBER" required >
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-4 form-group" style="padding: 0px 0px 0px 0px">
                    <button class="btn btn-danger" id="loadIssue" >SHOW</button>
                </div>
            </div>
            <hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
        </form>
    </div>

        <iframe name="hks_courier_entry_iframe" height="780" width=100%  style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>


        <script>
        $('document').ready(function(){
            if (typeof(Storage) !== "undefined") {
                
                let input = $('#isn');
                if (sessionStorage.issue) {
                    input.val(sessionStorage.getItem('issue'));
                    $('#loadIssue').click();
                }
                input.on('change', function(){
                    sessionStorage.setItem("issue", $(this).val());                    
                });
            }
        // window.addEventListener('message', function (e) {
        //    console.log(e);
        // });
        //     function progress_bar(){
        //         $('.progress').removeClass('d-none');
        //         $(".progress-bar").animate({width: "100%"}, 2500);
        //         $('.progress').delay(3500).fadeOut();
        //     }
        //     function fade_section(){
        //         $('.load-table').animate({opacity: '0.1'}, "slow");
        //         $('.load-table').delay(1000).animate({opacity: '1'}, "slow");
        //     }
        //     function load(issue){
        //         fade_section();
        //         $('.load-table').load('/hks_courier_entry_iframe.php', {"issue_no":issue});
        //     }

        //     progress_bar();
        //     load(1008);

        //     $('#loadIssue').on('click', function(e){
        //         e.preventDefault();
        //         let num = $('input[name=issue_no]').val();
        //         load(num);

        //     setTimeout(() => {
        //         $('hks_submit').each(function(i, obj){
        //         $(obj).on('click', function(e){
        //             console.log(this);
        //             })
        //         })
        //     }, 5000);
        //     });


        });
    </script>
</body>
</html>
