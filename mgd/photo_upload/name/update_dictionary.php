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
    <script src="../assets/bootstrap-4.4.1/js/bootstrap.min.js" ></script>
    <script src="../assets/mdb/popper.min.js"></script>
    <script src="../assets/mdb/mdb.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid">    
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
            const get_json = function(gender) {
                $.getJSON(`${gender}.json`, function(data) {
                    data.forEach(function(f, i) {
                        $(`.${gender}`).append(`
                            <form method="post" action="update_json.php">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="en" value="${f.en}">
                                    <input type="text" class="form-control" name="bn" value="${f.bn}">
                                    <input type="hidden" name="update" value="${gender}-${i}">                   
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-danger m-0 px-2 py-1 z-depth-0 waves-effect update" type="button" id="${gender}-${i}"><i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                            </form>
                            `);
                    })
                });
            }

            get_json('female');
            get_json('male');

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

            function confirmModal(callback) {
                $('#confirmModal').modal('show');

                $('#modal-yes').unbind('click');
                $('#modal-no').unbind('click');

                $('#modal-yes').click(function(e) {
                    e.stopPropagation();
                    $('#confirmModal').modal('hide');
                    callback(true);
                });

                $('#modal-no').click(function(e) {
                    e.stopPropagation();
                    $('#confirmModal').modal('hide');
                    callback(false);
                });

            }

            $('.card-body').on('click', '.update', function(e) {
                e.preventDefault();
                let btn = this;
                const send = function(res) {
                    if (res == true) {
                        $.post('update_json.php', $(e.target.form).serialize())
                            .done(data => alert('Successfully Updated!'))
                            .fail(err => console.log(err));
                    } else {
                        $.ajax({
                            url: 'update_json.php',
                            method: 'POST',
                            data: `delete=${btn.id}`
                        }).done(data => {
                            alert('Successfully Deleted!');
                        });
                    }
                }
                confirmModal(send);

            });

        });
    </script>
</body>

</html>