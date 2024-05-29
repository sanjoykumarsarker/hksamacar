<a href="#" class="float-right d-block d-sm-none pr-4 pt-3 text-white" id="bars">
  <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
</a>
<br />
<br />
<div class="col-sm-12 col-lg-12 text-center">
  <p>
    <img src="/front_images/hklogo.gif" width="100" alt="HKS" />
  </p>
  <h5 style="font-family: 'Leckerli One', cursive; color: white;">
    Hare Krishna Samacar
  </h5>
</div>

<div id="menu" class="d-none d-sm-block">
  <div id="accordion">

    <div class="card">
      <div class="card-header">
        <a class="card-link" href="/hks_dashboard.php"> Dashboard</a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse2">
          Agents
        </a>
      </div>
      <div id="collapse2" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="/hks_agent_new.php"> New Agent </a> <br />
          <a href="/hks_agent_book.php"> Agent Book </a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse3">
          Subscribers
        </a>
      </div>
      <div id="collapse3" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="/hks_subs_new.php"> New Subscriber </a> <br />
          <a href="/hks_subs_book.php"> Subscriber Book </a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">Customer</a>
      </div>
      <div id="collapse4" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="hkp_cust_new.php"> New Customer </a> <br />
          <a href="hkp_cust_book.php">Customer Book </a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
          Products
        </a>
      </div>
      <div id="collapse5" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="/hks_products.php">Hare Krishna Samacar</a> <br />
          <a href="hkp_products.php">Hare Krishna Publications</a> <br />
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
          Cash Memo
        </a>
      </div>
      <div id="collapse6" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="/hks_cash_book.php">Daily Cash Book </a> <br />
          <a href="/hks_cash_retail.php">Retail Sale </a> <br />
          <a href="/hks_cash_post.php">Courier & Post Office </a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse7">Send Articles</a>
      </div>
      <div id="collapse7" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="/hks_send_newspaper.php">Newspaper</a> <br />
          <a href="/hkp_send_books.php">Book</a> <br />
          <a href="/hkp_send_books_enq.php">Enquiry</a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse8">Accounts</a>
      </div>
      <div id="collapse8" class="collapse" data-parent="#accordion">
        <div class="card-body">
          <a href="cob_month.php">Monthly COB</a> <br />
          <a href="/hks_acc_summ.php">Expense Entry </a> <br />
          <a href="/hks_postage_entry.php">Postage Entry </a><br />
          <a href="/book_hisab">Books </a>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="/hks_communic.php">Communication </a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="/projects"> Projects </a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="/sms"> SMS </a>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="#"> Settings </a>
      </div>
    </div>
  </div>

  <div class="d-flex flex-column justify-content-around text-center mt-3">
    <?php include_once "hks_user.php" ;   ?>
    <p class="text-warning d-none d-lg-block mt-3">
      Powered by
      <a href="https://www.facebook.com/hksamacar/" target="_blank" class="text-white">&copy;hksamacarIT </a>
      <?php echo date("Y") ?>
    </p>
  </div>

</div>

</div> <!-- this extra div ending for parent scope -->

<script>
  window.onload = () => {

    $("#bars").on("click", function(e){
      e.preventDefault();
      $("#menu").toggleClass('d-none');
      $(this).find('.fa').toggleClass('fa-bars fa-times');
    });

  };
</script>