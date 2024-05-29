<?php include_once "../session_check.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hare Krishna Samacar</title>
    <link rel="shortcut icon" href="/favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script> -->
    <script src="/sms/vue.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- <script src="/assets/popup/js/jquery.popup.min.js"></script>
    <link rel="stylesheet" href="/assets/popup/css/popup.css"> -->
    <link rel="stylesheet" href="/assets/lala-alert/css/lala-alert.css">

    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div id="wrapper" class="col-md-2 col-xl-2">
                <?php include_once "../hks_sidebar.php";   ?>


                <div class="col-md-10 col-xl-10">
                    <!-- Page content -->
                    <div id="page-content-wrapper">

                        <!-- Keep all page content within the page-content inset div! -->
                        <div class="page-content inset p-2">
                            <div class="container mt-3" id="app">
                                <div class="row mb-3" v-cloak>
                                    <div class="col-md-8">
                                        <button class="btn btn-secondary mb-3 ml-auto" @click='openModal'><i class="fa fa-plus"></i> Add New</button>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(template, i) in templates" :key='i+"-tem"'>
                                                        <td>{{i+1}}</td>
                                                        <td class="cursor-pointer" @click.stop='selectTemplate(i)'>
                                                            <i class="fa fa-check-circle text-success" v-if="selectedItem===i"></i> {{template.name}}</td>
                                                        <td><span @click='changeStatus(i)' class='cursor-pointer badge badge-pill' :class="template.status==='1'?'badge-success':'badge-danger'">{{template.status==='1'?'Active':'Inactive'}}</span></td>
                                                        <td><button @click='editTemplate(i)' class='cursor-pointer badge btn-primary'>Edit</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <div class="card-header px-3 d-flex justify-content-between bg-success text-white align-items-center">
                                                <h4>Report</h4>
                                                <i @click='fetchReport' :class="fetchingReport?'fa-spin':''" class="fa fa-refresh cursor-pointer"></i>
                                            </div>
                                            <div class="card-body px-3">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h4>
                                                            Balance: {{sms_balance}}
                                                        </h4>
                                                        <h4>
                                                            Sent: {{sms_sent}}
                                                        </h4>
                                                    </div>
                                                    <i class="fa fa-envelope fa-3x text-danger"></i>
                                                </div>
                                                <div class="border-top small mt-1 d-flex justify-content-between">
                                                    <span><i class="fa fa-clock-o"></i> Valid upto {{validity_date}}</span>
                                                    <a href="recharge.php" class="badge badge-pill badge-primary text-white popup" target="_blank">Manage</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body" id="sms_form">
                                                <div v-if="sms_status" class="alert fade show" :class="sms_status.includes('Error')?'alert-danger':'alert-success'" role="alert">
                                                    <button type="button" class="close" @click="sms_status=''" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <p v-html="sms_status"></p>
                                                </div>
                                                <div class="dropleft">
                                                    <a href="#" class="float-right fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" @click.prevent="smsType='dynamic'" href="#">Dynamic</a>
                                                        <a class="dropdown-item" @click.prevent="smsType='static'" href="#">Static</a>
                                                    </div>
                                                </div>

                                                <form class="form px-2" @submit.prevent>
                                                    <div class="form-group" v-if="smsType==='static'">
                                                        <label for="numbers">Add Number <span class="text-danger">*</span></label> <span>{{totalRecipents}}</span>
                                                        <input v-model='sms.to' class="form-control" name="to" id="numbers" type="text" placeholder="01XXX XXX XXX, 01XXX XXX XXX">
                                                    </div>
                                                    <div class="form-group" v-else>
                                                        Total Number : <b>{{totalRecipents}}</b>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message">Message <span class="text-danger">*</span> <small class="text-muted">Max: বাংলা- ৭০ / Eng- 160</small></label>
                                                        <textarea @keypress="smsCharCount" maxlength="160" v-model="sms.text" name="message" id="message" class="form-control is-valid" rows="4" placeholder="Message Here..."></textarea>
                                                        <div class="valid-feedback">
                                                            <br>
                                                            {{sms.count?`Character Count: ${sms.count}` : ''}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button @click.prevent='sendSms' type="submit" class="btn btn-info btn-block">Send <i class="fa fa-paper-plane"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <small>
                                        b_month,
                                        b_next_month,
                                        b_prev_month,
                                        e_month',
                                        e_next_month,
                                        e_prev_month
                                    </small>
                                </div>
                                <!-- Modal -->

                                <div class="modal sms-create" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info text-white">
                                                <h5 class="modal-title text-uppercase">{{ mode + ' SMS'}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div v-if="create_update_status" class="alert fade show" :class="create_update_status.includes('Error')?'alert-danger':'alert-success'" role="alert">
                                                    <button type="button" class="close" @click="create_update_status=''" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    {{create_update_status}}
                                                </div>
                                                <div class="form">
                                                    <div class="form-group row">
                                                        <label for="numbers" class="col-sm-3 col-form-label">Title <span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="Title" v-model='selectedTemplate.name'>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="numbers" class="col-sm-3 col-form-label">Message <span class="text-danger">*</span>
                                                            <small class="text-info">বাংলা- ৭০ <br> Eng- 160</small>
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <textarea @keydown='characterCount' name="message" class="form-control is-valid" rows="3" maxlength="160" placeholder="Type Message Here ..." v-model='selectedTemplate.message'></textarea>
                                                            <div class="valid-feedback">
                                                                Maximum {{maxLimit}} Character. {{remaining?'Remaining: ' + remaining : ''}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-3">Status</div>
                                                        <div class="col-sm-9">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="status" v-model='selectedTemplate.status'>
                                                                <label class="custom-control-label" for="status">{{selectedTemplate.status==='1'?"Active":'Inactive'}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="numbers" class="col-sm-3 col-form-label">Settings</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="..." v-model='selectedTemplate.settings'>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="numbers" class="col-sm-3 col-form-label">Query</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="SELECT * FROM tblMem" v-model='selectedTemplate.query'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" v-if="mode==='update'" class="btn btn-danger" @click.prevent="deleteTemplate">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" @click.prevent="mode==='update'?updateData(): addNewTemplate()" class="btn btn-primary text-capitalize">{{mode}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <!-- Lala alert section -->
        <div id="lala-alert-container">
            <div id="lala-alert-wrapper"></div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
        <script src="/assets/lala-alert/js/lala-alert.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
        <script>
            // if (window.history.replaceState) {
            //     window.history.replaceState(null, null, window.location.href);
            // }

            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            const app = new Vue({
                el: '#app',
                data: () => ({
                    templates: [],
                    selectedTemplate: {},
                    sms: {},
                    maxLimit: 160,
                    remaining: '',
                    report: '',
                    loader: false,
                    sms_status: '',
                    create_update_status: '',
                    fetchingReport: false,
                    mode: '',
                    selectedItem: '',
                    totalRecipents: '',
                    smsType: 'static',
                    testMode: false,
                    all: ''
                }),
                computed: {
                    validity_date() {
                        return Array.isArray(this.report) ? this.report[1] : '?.';
                    },
                    sms_balance() {
                        return Array.isArray(this.report) ? Math.round(this.report[0] / this.report[2]) : '?';
                    },
                    sms_sent() {
                        return Array.isArray(this.report) ? this.report[3] : '?.';
                    },
                    checked_item() {
                        return id => this.selectedItem === id;
                    }
                },
                mounted() {
                    this.fetchData();
                    this.fetchReport();
                },
                methods: {
                    async fetchData() {
                        try {
                            const res = await axios.get('manage_template.php');
                            this.templates = res && res.data;
                        } catch (error) {
                            console.log(error);
                            createAlert(error.toString(), 'danger');
                        }
                    },
                    async updateData() {
                        try {
                            const res = await axios.put('manage_template.php', this.selectedTemplate);
                            this.create_update_status = res && res.data;
                            this.fetchData();
                            setTimeout(() => {
                                this.create_update_status = '';
                                $('.sms-create').modal('hide');
                            }, 3000);
                        } catch (error) {
                            this.create_update_status = error.toString();
                        }
                    },
                    async deleteTemplate() {
                        if (confirm("Ary you sure?")) {
                            try {
                                await axios.delete(`manage_template.php?id=${this.selectedTemplate.id}`);
                                createAlert('Successfully Deleted', 'success');
                            } catch (error) {
                                createAlert(error.toString(), 'danger');
                            }
                            $('.sms-create').modal('hide');
                            await this.fetchData();
                        }
                    },
                    async fetchReport() {
                        this.fetchingReport = true;
                        try {
                            const res = await axios.get('report.php');
                            this.report = res && res.data;
                        } catch (error) {
                            console.log(error);
                            createAlert(error.toString(), 'danger');
                        }
                        this.fetchingReport = false;
                    },
                    async selectTemplate(index) {
                        if (this.templates[index].status !== '1') {
                            createAlert('Please Make it Active First!', 'danger');
                            return;
                        }

                        this.selectedItem = this.selectedItem !== index ? index : '';
                        this.selectedTemplate = this.selectedItem === index ? this.templates[index] : {};
                        if (this.selectedItem === index) {
                            $("#sms_form").LoadingOverlay("show", {
                                image: "",
                                fontawesome: "fa fa-cog fa-spin"
                            });
                            const {
                                settings
                            } = this.selectedTemplate;
                            let options = '';
                            if (settings.length > 1) {
                                options = settings
                                    .split(';')
                                    .reduce((acc, txt) => Object.assign(acc, {
                                        [txt.split(':')[0]]: txt.split(':')[1]
                                    }), {});
                                this.smsType = options.method || 'static';
                                this.testMode = options.test === 'true' ? true : false;
                            }
                            try {
                                const res = await axios.post('get_numbers.php', {
                                    ...options,
                                    query: this.selectedTemplate.query
                                });

                                this.all = res && res.data && res.data.data;
                                this.totalRecipents = res.data && res.data.total;
                                this.sms = {
                                    to: res && res.data && res.data.data.map(num => num.mobile).filter(n => n).join(',') || '',
                                    text: this.selectedTemplate.message || ''
                                }

                            } catch (error) {
                                console.log(error);
                                createAlert(error.toString(), 'danger');
                            }
                            $("#sms_form").LoadingOverlay("hide");

                        } else {
                            this.totalRecipents = '';
                            this.sms = {}
                        }
                    },
                    async changeStatus(index) {
                        const template = this.templates[index];
                        try {
                            await axios.put('manage_template.php', {
                                ...template,
                                status: template.status === '1' ? '0' : '1'
                            });
                            this.templates = this.templates.map((a, i) => {
                                if (i !== index) return a;
                                return {
                                    ...a,
                                    status: a.status === '1' ? '0' : '1'
                                };
                            });
                            createAlert('Status Successfully Changed', 'success');
                        } catch (error) {
                            console.log(error);
                            createAlert(error.toString(), 'danger');
                        }
                    },
                    editTemplate(index) {
                        if (this.templates[index].status !== '1') {
                            createAlert('Please Make it Active First!', 'danger');
                            return;
                        }
                        this.selectedTemplate = this.templates[index];
                        this.mode = 'update';
                        this.create_update_status = '';
                        $('.sms-create').modal('show');
                    },
                    openModal() {
                        this.selectedTemplate = {};
                        this.create_update_status = '';
                        this.mode = 'create';
                        this.settingsLength = 1;
                        $('.sms-create').modal('show');
                    },
                    characterCount() {
                        if (this.selectedTemplate.hasOwnProperty('message') && this.selectedTemplate.message.length >= 0) {
                            this.remaining = this.maxLimit > 0 ? this.maxLimit - this.smsLengthCounter(this.selectedTemplate.message) : 0;
                        }
                    },
                    smsCharCount() {
                        if (this.sms.hasOwnProperty('text') && this.sms.text.length >= 0) {
                            this.sms.count = this.smsLengthCounter(this.sms.text);
                        }
                    },
                    async addNewTemplate() {
                        try {
                            const res = await axios.post('manage_template.php', this.selectedTemplate);
                            this.create_update_status = res && res.data;
                            this.selectedTemplate = {};
                            this.fetchData();
                            createAlert('New Template Successfully Added', 'success');
                            setTimeout(() => {
                                this.create_update_status = '';
                                $('.sms-create').modal('hide');
                            }, 3000);
                        } catch (error) {
                            this.create_update_status = error.toString();
                        }
                    },
                    async sendSms() {
                        if (confirm("Are you Sure?")) {
                            this.loader = true;
                            $("#sms_form").LoadingOverlay("show", {
                                image: "",
                                fontawesome: "fa fa-cog fa-spin"
                            });
                            const dynamic = ['details', 'dynamic'];
                            try {
                                const res = await axios.post('send.php', {
                                    to: dynamic.includes(this.smsType) ? 'no' : this.sms.to,
                                    text: this.sms.text,
                                    type: this.smsType,
                                    testing: this.testMode,
                                    all: dynamic.includes(this.smsType) ? this.all : ''
                                });

                                this.sms_status = res && res.data;
                                this.sms = {};
                                this.totalRecipents = '';
                                this.selectedItem = '';
                                this.selectedTemplate = {};
                                createAlert('SMS Successfully Sent! It will take some time.', 'success');
                            } catch (error) {
                                this.sms_status = error.toString();
                                createAlert(error.toString(), 'danger');
                            }
                            this.loader = false;
                            $("#sms_form").LoadingOverlay("hide");
                        }
                    },
                    smsLengthCounter(text) {
                        const gsm7bitExChar = "\\^{}\\\\\\[~\\]|€";
                        const gsm7bitExOnlyRegExp = RegExp("^[\\" + gsm7bitExChar + "]*$");

                        const countGsm7bitEx = function(text) {
                            var char2, chars;
                            chars = (function() {
                                var _i, _len, _results;
                                _results = [];
                                for (_i = 0, _len = text.length; _i < _len; _i++) {
                                    char2 = text[_i];
                                    if (char2.match(this.gsm7bitExOnlyRegExp) != null) {
                                        _results.push(char2);
                                    }
                                }
                                return _results;
                            }).call(this);
                            return chars.length;
                        };
                        return countGsm7bitEx(text);
                    }
                }
            })
        </script>
</body>

</html>