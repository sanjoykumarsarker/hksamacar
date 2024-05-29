<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Dictionary</title>
    <link href="../assets/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/mdb/mdb.lite.min.css" />
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../assets/mdb/popper.min.js"></script>
    <script src="../assets/mdb/mdb.min.js"></script>

    <style>
        .snackbar-container {
            transition: all .5s ease;
            transition-property: top, right, bottom, left, opacity;
            font-family: Roboto, sans-serif;
            font-size: 14px;
            min-height: 14px;
            background-color: #070b0e;
            position: fixed;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            line-height: 22px;
            padding: 18px 24px;
            bottom: -100px;
            top: -100px;
            opacity: 0;
            z-index: 9999
        }

        .snackbar-container .action {
            background: inherit;
            display: inline-block;
            border: none;
            font-size: inherit;
            text-transform: uppercase;
            color: #4caf50;
            margin: 0 0 0 24px;
            padding: 0;
            min-width: min-content;
            cursor: pointer
        }

        @media (min-width:640px) {
            .snackbar-container {
                min-width: 288px;
                max-width: 568px;
                display: inline-flex;
                border-radius: 2px;
                margin: 24px
            }
        }

        @media (max-width:640px) {
            .snackbar-container {
                left: 0;
                right: 0;
                width: 100%
            }
        }

        .snackbar-pos.bottom-center {
            top: auto !important;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0)
        }

        .snackbar-pos.bottom-left {
            top: auto !important;
            bottom: 0;
            left: 0
        }

        .snackbar-pos.bottom-right {
            top: auto !important;
            bottom: 0;
            right: 0
        }

        .snackbar-pos.top-left {
            bottom: auto !important;
            top: 0;
            left: 0
        }

        .snackbar-pos.top-center {
            bottom: auto !important;
            top: 0;
            left: 50%;
            transform: translate(-50%, 0)
        }

        .snackbar-pos.top-right {
            bottom: auto !important;
            top: 0;
            right: 0
        }

        @media (max-width:640px) {

            .snackbar-pos.bottom-center,
            .snackbar-pos.top-center {
                left: 0;
                transform: none
            }
        }
    </style>
    <script src="snackbar/snackbar.min.js"></script>

</head>

<body>
    <div class="container-fluid" id="app">
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Female Dictionary</div>
                    <div class="card-body female" style="overflow-y: scroll; max-height:80vh">
                        <form action="update_json.php" method="post">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="en" placeholder="English">
                                <input type="text" class="form-control" name="bn" placeholder="বাংলা">
                                <input type="hidden" name="save" value="female">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success m-0 px-2 py-1 z-depth-0 waves-effect" type="submit" id="button-addon2">Save</button>
                                </div>
                            </div>
                        </form>
                        <div class="input-group mb-2" v-for="(female, i) in females" :key="female.en+i">
                            <input type="text" class="form-control" name="en" :value="female.en">
                            <input type="text" class="form-control" name="bn" :value="female.bn">
                            <input type="hidden" name="update" :value="`female-${i}`">
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger m-0 px-2 py-1 z-depth-0 waves-effect update" type="button" :id="`female-${i}`"><i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Male Dictionary</div>
                    <div class="card-body male" style="overflow-y: scroll; max-height:80vh">
                        <form action="update_json.php" method="post">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="en" placeholder="English">
                                <input type="text" class="form-control" name="bn" placeholder="বাংলা">
                                <input type="hidden" name="save" value="male">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success m-0 px-2 py-1 z-depth-0 waves-effect" type="submit" id="button-addon2">Save</button>
                                </div>
                            </div>
                        </form>
                        <div class="input-group mb-2" v-for="(male, i) in males" :key="male.en+i">
                            <input type="text" class="form-control" name="en" :value="male.en">
                            <input type="text" class="form-control" name="bn" :value="male.bn">
                            <input type="hidden" name="update" :value="`male-${i}`">
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger m-0 px-2 py-1 z-depth-0 waves-effect update" type="button" :id="`male-${i}`"><i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <img src="https://i1.sndcdn.com/artworks-000190019108-08w7zh-t500x500.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <h4 class="mt-1 mb-2">What do you want?</h4>

                    <div class="mt-4 d-flex justify-content-center">
                        <button class="btn btn-cyan btn-sm waves-effect waves-light" id="modal-yes">Update
                        </button>
                        <button class="btn btn-danger btn-sm waves-effect waves-light" id="modal-no">Delete
                        </button>
                    </div>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>

    <script>
        function update_from_db() {
            function compare(a, b) {
                const f = a.en.toUpperCase();
                const n = b.en.toUpperCase();
                let comparison = 0;
                if (f > n) {
                    comparison = 1;
                } else if (f < n) {
                    comparison = -1;
                }
                return comparison;
            }


            $.get('getdic.php').done(data => {
                let devotees = JSON.parse(data);
                let parsedFemale = devotees.map(dev => {
                    let obj = [];
                    if (!dev.en.endsWith('DAS')) {
                        let en = dev.en.split(' ');
                        let bn = dev.bn.split(' ');
                        // if (en.length === bn.length) {
                        en.forEach((e, i) => {
                            if (e !== '') {
                                if (e === 'DD' || e === 'DASI') {

                                } else {
                                    obj = [...obj, {
                                        en: e,
                                        bn: bn[i]
                                    }];
                                }
                            }
                        });
                        // }
                    }
                    return obj;
                }).flat();

                female = devotees.map(d => {
                    let o = [];
                    if (d.en.replace(/\s+/g, ' ').trim().endsWith('DAS')) {
                        let en = d.en.replace(/\s+/g, ' ').trim().split(' ');
                        let bn = d.bn.replace(/\s+/g, ' ').trim().split(' ');
                        // o = [...o, d];
                        en.forEach((e, i) => {
                            if (e == 'DD' || e == 'DASI') {

                            } else {
                                o = [...o, {
                                    en: e,
                                    bn: bn[i]
                                }];
                            }
                        })
                    }
                    return o;
                }).flat();

                // console.log(female);
                let things = female.filter((thing, index, self) =>
                    index === self.findIndex((t) => (
                        t.en === thing.en
                    ))
                ).sort(compare).map(JSON.stringify);

                let finaldic = Array
                    .from(new Set(female.sort(compare).map(JSON.stringify)));
                // let final = finaldic.sort(compare);
                // let finaldic = Array.from(new Set(female.map(JSON.stringify)));
                // console.log(parsedFemale);
                // console.log(finaldic);
                // $('textarea').val(JSON.parse(finaldic).length);
                $('textarea').val(things);
            })
        }


        $(function() {
            // update_from_db();


            function onlyAllowOneCall(fn) {
                var hasBeenCalled = false;
                return function() {
                    if (hasBeenCalled) {
                        throw Error("Attempted to call callback twice")
                    }
                    hasBeenCalled = true;
                    return fn.apply(this, arguments)
                }
            }




            $('.card-body').on('keypress', '.update', function(e) {
                // e.preventDefault();
                if (e.which == 13) {
                    if (confirm('Are you sure')) {
                        $.post('update_json.php', $(e.target.form).serialize())
                            .done(data => Snackbar.show({
                                text: 'Successfully Updated!'
                            }))
                            .fail(err => console.log(err));
                    }
                }
            });

            $('.card-body').on('click', '.update', function(e) {
                e.preventDefault();
                let btn = this;
                let status = confirm('Are you sure');
                // const send = function(res) {
                if (status) {
                    $.post('update_json.php', $(e.target.form).serialize())
                        .done(data => Snackbar.show({
                            text: 'Successfully Updated!'
                        }))
                        .fail(err => console.log(err));
                }
                // } else {
                // $.ajax({
                //     url: 'update_json.php',
                //     method: 'POST',
                //     data: `delete=${btn.id}`
                // }).done(data => Snackbar.show({
                //     text: 'Successfully Deleted!'
                // }));
                // }
                // }
                // confirmModal(send);

            });

        });
    </script>
    <script type="module">
        import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

  createApp({
    data() {
      return {
        males: [],
        females:[]
      }
    },
    async mounted(){
        const urls = ['female.json', 'male.json'];
        Promise.all(urls.map(u=>fetch(u))).then(res =>
            Promise.all(res.map(res => res.json()))
        ).then(data => {
            this.males = data[1];
            this.females = data[0];
        }).catch(err=>console.log(err))
    }
  }).mount('#app')
</script>
</body>

</html>