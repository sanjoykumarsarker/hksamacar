$(function () {
  AOS.init({
    duration: 2000,
    once: true,
  });

  window.onscroll = function () {
    scrollHeader();
  };

  var header = $(".navbar-bottom");
  // var body = $("body");
  function scrollHeader() {
    if (window.pageYOffset > 130) {
      $(header).addClass("sticky");
    } else {
      $(header).removeClass("sticky");
    }
  }

  // navbar toggler script
  $(".navbar-toggler").on("click", function () {
    $(".collapse").toggleClass("show");
    $("body").toggleClass("layer-open");
    // $(header).toggleClass("sticky-not");
    $(".navbar-close").show();
  });
  $(".navbar-close").on("click", function () {
    $(".collapse").toggleClass("show");
    $(".navbar-close").hide();
    $("body").toggleClass("layer-open");
    // $(header).toggleClass("sticky-not");
    $(".dark-overlay").click(function () {
      $(".collapse").removeClass("show");
      $("body").removeClass("layer-open");
    });
  });

  const isToday = (someDate) => {
    const today = new Date();
    return (
      someDate.getDate() == today.getDate() &&
      someDate.getMonth() == today.getMonth() &&
      someDate.getFullYear() == today.getFullYear()
    );
  };

  let stamp = localStorage.getItem("stamp");


  if (stamp) {
    const myDate = new Date(parseInt(stamp));
    const is_today = isToday(myDate);
    if (!is_today) {
      localStorage.removeItem("stamp");
      localStorage.removeItem("bndate");
      localStorage.removeItem("cookie");
    }
  } else {
    localStorage.setItem("stamp", `${Date.now()}`);
    localStorage.setItem("bndate", `${oneDay()}`);
  }
  let bndate = localStorage.getItem("bndate");
  $("span[id='bn-date']").html(bndate);

});

$(function () {
  $('a[href="#search"]').on("click", function (event) {
    event.preventDefault();
    $("#search").addClass("open");
    $('body').addClass('search-open');
    $('#search > form > input[type="search"]').focus();
  });

  $("#search, #search button.close").on("click keyup", function (event) {
    if (
      event.target == this ||
      event.target.className == "close" ||
      event.keyCode == 27
    ) {
      $('body').removeClass('search-open');
      $(this).removeClass("open");
    }
  });
});
