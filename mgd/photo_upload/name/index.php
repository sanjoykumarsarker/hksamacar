<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="../assets/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/mdb/mdb.lite.min.css" />
  <script src="../assets/jquery.min.js"></script>
  <script src="../assets/bootstrap-4.4.1/js/bootstrap.min.js" ></script>
  <!-- <script src="../assets/mdb/popper.min.js"></script> -->
  <script src="../assets/mdb/mdb.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>ইংরেজি</th>
                <th>বাংলা</th>
                <th>Check</th>
              </tr>
            </thead>
            <tbody class="name">

            </tbody>
          </table>
        </div>
        <!-- <textarea rows="15" class="form-control"></textarea> -->
      </div>
    </div>
  </div>
  <script>
    $('document').ready(() => {
      const search = (arr, male, female) => {
        return arr.map(a => {
          let cd = "";
          let aa = a.replace(/[^A-Za-z]/g, ' ');
          if (aa.endsWith('DAS')) {
            aa.split(" ").forEach((d, i, g) => {
              let c = male.findIndex(bn => bn.en == d);
              cd += c >= 0 ? male[c].bn : ' ';
              if (i !== g.length - 1) {
                cd += " ";
              }
            });
          } else {
            aa.split(" ").forEach((d, i, g) => {
              let c = female.findIndex(bn => bn.en == d);
              cd += c >= 0 ? female[c].bn : ' ';
              if (i !== g.length - 1) {
                cd += " ";
              }
            });
          }

          return {
            en: a,
            bn: cd
          };
        });
      };

      let maleDic = '';
      $.getJSON(`male.json`, function(data) {
        maleDic = data;
      });

      let femaleDic = '';
      $.getJSON(`female.json`, function(data) {
        femaleDic = data;
      });

      $.get('all.php').done(function(data) {
        let names = Object.values(JSON.parse(data));                
        let withBangla = search(names, maleDic, femaleDic);

        let htmlData = withBangla.map((d, i) => {
          return `<tr><td>${i + 1}</td><td>${d.en}</td><td><input class="form-control" value="${d.bn}" type="text" name="finalname_b" ></td><td><input type="submit" value="Save" class="btn btn-success"></td></tr>`
        }).join('');

        $('.name').html(htmlData);
      });

      // $.get('all.php').done(function(data) {
      //   let names = Object.values(JSON.parse(data));
      //   let chunked = names.map(n => {
      //     let obj = [];
      //     let removed = n.replace(/[^A-Za-z]/g, ' ');
      //     let cleaned = removed.replace(/\s+/g,' ').trim();
      //     if (!cleaned.endsWith('DAS')) {            
      //       cleaned.split(' ').forEach(c => {
      //         if (c == 'DD' || c == 'DAS' || c == 'DASI' || c == '') {} else {
      //           obj = [...obj, {
      //             c
      //           }];
      //         }
      //       });
      //     }
      //     return obj;
      //   }).flat();
      //   // let uniq = [...new Set(chunked.map(item => item.c))].map(en=>({en, bn:" "}));
      //   let previous = femaleDic.map(m=>m.en);
      //   let uniq = [...new Set(chunked.map(item => item.c))]
      //             .filter( function( el ) {
      //               return !previous.includes( el );
      //             }).map(en=>({en, bn:" "}));
      //   $('textarea').val(uniq.map(JSON.stringify));
      //   console.log(uniq);
      // })

    })
  </script>

  <script>
    const dic = [{
        en: "Aviram",
        bn: "অভিরাম"
      },
      {
        en: "Gopa",
        bn: "গোপ"
      },
      {
        en: "DD",
        bn: "দেবী দাসী"
      },
      {
        en: "Das",
        bn: "দাস"
      },
      {
        en: "Mahabandhu",
        bn: "মহাবন্ধু"
      },
      {
        en: "Gopal",
        bn: "গোপাল"
      },
      {
        en: "Rasik",
        bn: "রসিক"
      },
      {
        en: "Kanai",
        bn: "কানাই"
      },
      {
        en: "Prahallad",
        bn: "প্রহ্লাদ"
      },
      {
        en: "Maharaj",
        bn: "মহারাজ"
      },
      {
        en: "Anadi",
        bn: "অনাদি"
      },
      {
        en: "Ananda",
        bn: "আনন্দ"
      },
      {
        en: "Nitai",
        bn: "নিতাই"
      },
      {
        en: "Mukunda",
        bn: "মুকুন্দ"
      }
    ];

    const devotees = [
      "Aviram Gopa Das",
      "Mahabandhu Gopal Das",
      "Rasik Kanai Das",
      "Prahallad Maharaj Das",
      "Anadi Ananda Nitai Das",
      "Anadi Mukundam DD"
    ];

    const search = (arr, dic) => {
      return arr.map(a => {
        let cd = "";
        a.split(" ").forEach((d, i, g) => {
          let c = dic.findIndex(bn => bn.en == d);
          cd += c >= 0 ? dic[c].bn : ' ';
          if (i !== g.length - 1) {
            cd += " ";
          }
        });
        return {
          en: a,
          bn: cd
        };
      });
    };

    console.log(search(devotees, dic));
  </script>

  <?php
  
  ?>
</body>

</html>