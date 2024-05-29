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
        bn: cd.trim()
      };
    });
  };
postMessage(i);