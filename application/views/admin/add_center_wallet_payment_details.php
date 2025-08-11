<?php include('header.php'); ?>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Wallet</h4>
                            <p class="card-description">
                                Please enter wallet details
                            </p>
                            <form class="forms-sample" name="bank_form" id="bank_form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php if (!empty($single)) {
                                                                                                            echo $single->id;
                                                                                                        } ?>">
                                    <input type="hidden" class="form-control" id="center_id" name="center_id" value="<?php if (!empty($single)) {
                                                                                                                            echo $single->center_id;
                                                                                                                        } else {
                                                                                                                            echo "0";
                                                                                                                        } ?>">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Transaction No *</label>
                                            <input type="text" autocomplete="off" class="form-control" id="transaction_id" name="transaction_id" placeholder="Transaction Number" value="<?php if (!empty($single)) {
                                                                                                                                                                                                echo $single->transaction_id;
                                                                                                                                                                                            } ?>">
                                            <div class="error" id="transaction_error"></div>
                                             <p style="color:red;text:bold;" id="unique_transaction"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Payment Date *</label>
                                            <input type="text" class="form-control datepicker" id="payment_date" name="payment_date" placeholder="Payment Date" value="<?php if (!empty($single) && $single->payment_date != "0000:00:00" && $single->payment_date != "1970:01:01") {
                                                                                                                                                                            echo date("d-m-Y", strtotime($single->payment_date));
                                                                                                                                                                        } ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Amount *</label>
                                            <input type="text" class="form-control discount" id="amount" name="amount" placeholder="Amount" value="<?php if (!empty($single)) {
                                                                                                                                                        echo $single->amount;
                                                                                                                                                    } ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Payment Status *</label>
                                            <select class="form-control discount" id="payment_status" name="payment_status">
                                                <!-- <option value="0" <?php if (!empty($single) && $single->payment_status == "0") { ?>selected="selected" <?php } ?>>Failed</option> -->
                                                <option value="1" <?php if (!empty($single) && $single->payment_status == "1") { ?>selected="selected" <?php } ?>>Success</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Center *</label>
                                            <select class="form-control" name="center" id="center">
                                                <option value="">Select Center</option>
                                                <?php if (!empty($centers)) {
                                                    foreach ($centers as $centers_result) { ?>
                                                        <option value="<?= $centers_result->id ?>" <?php if (isset($_GET['center']) && $_GET['center'] == $centers_result->id) { ?>selected="selected" <?php } ?>><?= $centers_result->center_name ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <button type="submit" id="" class="btn btn-primary mr-2">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('footer.php');
    $id = 0;
    if ($this->uri->segment(2) != "") {
        $id = $this->uri->segment(2);
    }
    ?>
    <script>
        $(document).ready(function() {
            jQuery.validator.addMethod("validate_email", function(value, element) {
                if (/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                    return true;
                } else {
                    return false;
                }
            }, "Please enter a valid Email.");
            $('#bank_form').validate({
                rules: {
                    transaction_id: {
                        required: true,
                    },
                    payment_date: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number: true,
                    },
                    center: {
                        required: true,
                    },
                },
                messages: {
                    transaction_id: {
                        required: "Please select transaction id",
                    },
                    payment_date: {
                        required: "Please select payment date",
                    },
                    amount: {
                        required: "Please enter amount",
                        number: "Please enter valid amount",
                    },
                    center: {
                        required: "Please select center",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                maxDate: 0,
                /*maxDate: "-12Y",
                minDate: "-80Y",
                yearRange: "-100:-0"*/
            });
        });
        
        
          $('#transaction_id').on('keyup', function() {
            var transaction_id = $(this).val();
            var id = "<?= $id ?>";
            
            if (transaction_id.trim() === '') {
                $('#unique_transaction').text('');
                $('#submit_btn').prop('disabled', false);
                return;
            }
            
            $.ajax({
                url: '<?= base_url() ?>admin/Ajax_controller/check_unique_transaction',
                method: 'POST',
                data: {
                    transaction: transaction_id,
                    id: id
                },
                success: function(response) {
                    if (response == "1") {
                        $('#unique_transaction').text('This transaction is already exits!');
                        $('#submit_btn').prop('disabled', true);
                    } else {
                        $('#unique_transaction').text('');
                        $('#submit_btn').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error checking transaction uniqueness:', error);
                }
            });
        });
    </script>