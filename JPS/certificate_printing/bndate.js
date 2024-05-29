var mn = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];
const beng_month_name = new Array();
(beng_month_name[1] = "বৈশাখ"),
  (beng_month_name[2] = "জ্যৈষ্ঠ"),
  (beng_month_name[3] = "আষাঢ়"),
  (beng_month_name[4] = "শ্রাবণ"),
  (beng_month_name[5] = "ভাদ্র"),
  (beng_month_name[6] = "আশ্বিন"),
  (beng_month_name[7] = "কার্তিক"),
  (beng_month_name[8] = "অগ্রহায়ন"),
  (beng_month_name[9] = "পৌষ"),
  (beng_month_name[10] = "মাঘ"),
  (beng_month_name[11] = "ফাল্গুন"),
  (beng_month_name[12] = "চৈত্র");
var bmonth_len = "";
const Weekdays = new Array(
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
  ),
  bWeekdays = new Array(
    "রবি",
    "সোম",
    "মঙ্গল",
    "বুধ",
    "বৃহস্পতি",
    "শুক্র",
    "শনি",
    "রবি"
  ),
  bWeekdays1 = new Array(
    "রবি",
    "সোম",
    "মঙ্গল",
    "বুধ",
    "বৃহ:",
    "শুক্র",
    "শনি",
    "রবি"
  );

function convert(e) {
  var a,
    n = e.toString(),
    r = new Array();
  (r[1] = "১"),
    (r[2] = "২"),
    (r[3] = "৩"),
    (r[4] = "৪"),
    (r[5] = "৫"),
    (r[6] = "৬"),
    (r[7] = "৭"),
    (r[8] = "৮"),
    (r[9] = "৯"),
    (r[0] = "০"),
    (r[" "] = ""),
    (r["-"] = "-"),
    (a = "");
  for (var o = 0; o < n.length; o++) {
    a += r[n.substr(o, 1)];
  }
  return a;
}
var mas_len = [
  0,
  30.92569444,
  62.63289352,
  94.00184028,
  125.4761458,
  156.4885417,
  186.9247338,
  216.8066667,
  246.3155787,
  275.6427546,
  305.0935301,
  334.9103588,
  365.2587564814815
];

function ModernDate_to_Julianeday(e, a, n) {
  var r;
  return (
    a < 3 && ((e -= 1), (a += 12)),
    (r = Math.floor(365.25 * e) + Math.floor(30.59 * (a - 2)) + n + 1721086.5),
    e < 0 && ((r -= 1), e % 4 == 0 && 3 <= a && (r += 1)),
    2299160 < r &&
      (r = r + Math.floor((1 * e) / 400) - Math.floor((1 * e) / 100) + 2),
    r
  );
}

function Bangla_Date(e, a, n) {
  var r;
  r = 1938094.483733333;
  var o = ModernDate_to_Julianeday(e, a, n);
  if (o < r) " Date is not appropriate.\n";
  else {
    for (
      var t,
        m,
        k,
        l,
        h = o - r,
        _ = Math.floor(h / 365.2587564814815),
        y = r + 365.2587564814815 * _,
        s = 0;
      s < 12;
      s++
    )
      (t = y + mas_len[s]),
        (m = y + mas_len[s + 1]),
        o >= t &&
          o <= Math.floor(m) + 1.75 &&
          ((k = s + 1), (l = Math.floor(o - t) + 1));
    var d = [];
    for (s = 0; s < 12; s++) {
      lastday = y + mas_len[s];
      var f = new Date(calData(lastday + 1).toDateString());
      d.push(f.getMonth() + 1 + "/" + f.getDate() + "/" + f.getFullYear());
    }
    bmonth_len = d.join(",");
  }
  return new Array(_ + 1, k, l);
}

function oneDay(date = null) {
  var e = date ? new Date(date) : new Date();
  e.setTime(e.getTime() + 60 * (e.getTimezoneOffset() + 360) * 1e3);
  var a = e.getDate() + 1,
    n = e.getMonth(),
    r = e.getFullYear(),
    o = Bangla_Date(r, n + 1, a),
    t = ModernDate_to_Julianeday(r, n + 1, a),
    m = (Math.floor(t + 0.5) % 7);
  return ` ${bWeekdays[m]}বার, ${convert(o[2])} ${
    beng_month_name[o[1]]
  } ${convert(o[0])} বঙ্গাব্দ`;
}

function calData(jd) {
  with (Math) {
    (z1 = jd + 0.5),
      (z2 = floor(z1)),
      (f = z1 - z2),
      z2 < 2299161
        ? (a = z2)
        : ((alf = floor((z2 - 1867216.25) / 36524.25)),
          (a = z2 + 1 + alf - floor(alf / 4))),
      (b = a + 1524),
      (c = floor((b - 122.1) / 365.25)),
      (d = floor(365.25 * c)),
      (e = floor((b - d) / 30.6001)),
      (days = b - d - floor(30.6001 * e) + f),
      (kday = floor(days)),
      e < 13.5 ? (kmon = e - 1) : (kmon = e - 13),
      kmon > 2.5 && (kyear = c - 4716),
      kmon < 2.5 && (kyear = c - 4715),
      (hh1 = 24 * (days - kday)),
      (khr = floor(hh1)),
      (kmin = hh1 - khr),
      (ksek = 60 * kmin),
      (kmin = floor(ksek)),
      (ksek = floor(60 * (ksek - kmin))),
      kday < 10 && (kday = " " + kday),
      khr < 10 && (khr = "0" + khr),
      kmin < 10 && (kmin = "0" + kmin),
      ksek < 10 && (ksek = "0" + ksek);
    var dstr =
      mn[kmon - 1] + " " + kday + ", " + kyear + " " + khr + ":" + kmin + ":00";
    s = new Date(dstr);
  }
  return s;
}
