@extends('layouts.main')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs col-sm-6">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs bar_tabs" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title">Mosque Committee</h3></li>
                            <li class="nav-item">
                                <a href="{!! url('/mosque_committee/list')!!}" class="nav-link active" data-toggle="pill"  aria-selected="true">List Mosque Committee</a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! url('/mosque_committee/add')!!}" class="nav-link" aria-selected="false">Add Mosque Committee</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                        @if(session('message'))
                        <div class="alert alert-success"><span class="fa fa-check"></span><em> {{ session('message') }} </em></div>
                        @endif
                            </div>
                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mosque</th>
                            <th>Mobile Number</th>
                            <th>Role</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @if(!empty($mosque_data))
                                @foreach ($mosque_data as $key)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img src="{{ url('public/mosque_committee/'.$key->image) }}"  width="50px" height="50px" class="img-circle" ></td>
                                    <td>{{ $key->firstname.' '.$key->lastname }}</td>
                                    <td>{{ $key->address }}	</td>
                                    <td>{{ $key->mosque_name }}</td>
                                    <td>{{ $key->mobile_no }}</td>
                                    <td>{{ getUsersRole($key->role) }}</td>
                                    <td> 
                                        <form accept-charset="UTF-8" action="/make_payment" class="require-validation"
                                            data-cc-on-file="false"
                                            data-stripe-publishable-key="pk_test_51JIEUlL9sCoZ7ikA5ACNrQBYnDisUgJPRnkd37BHjE8JlVzO60vbtB3D9uIzCfEFv6DnskrcwAkBAF4AdyBKCEGI00dhvUYw3G"
                                            id="payment-form" method="post">
                                            {{ csrf_field() }}
                                            <div class='form-row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                        class='form-control' size='4' type='text'>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='col-xs-12 form-group card required'>
                                                    <label class='control-label'>Card Number</label> <input
                                                        autocomplete='off' class='form-control card-number' size='20'
                                                        type='text'>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='col-xs-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-4 form-group expiration required'>
                                                    <label class='control-label'> </label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='col-md-12'>
                                                    <div class='form-control total btn btn-info'>
                                                        Total: <span class='amount'>$300</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='col-md-12 form-group'>
                                                    <button class='form-control btn btn-primary submit-button'
                                                        type='submit' style="margin-top: 10px;">Pay »</button>
                                                </div>
                                            </div>
                                            <div class='form-row'>
                                                <div class='col-md-12 error form-group hide'>
                                                    <div class='alert-danger alert'>Please correct the errors and try
                                                        again.</div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
    $('.btn-danger').on('click', '.sa-warning', function() {
	  var url =$(this).attr('href');
        swal({   
            title: "Are You Sure?",
			      text: "You will not be able to recover this data afterwards!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#297FCA",   
            confirmButtonText: "Yes, delete!",   
            closeOnConfirm: false 
        }, function(){
			      window.location.href = url;
        });
    });

    $(function() {
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(e.target).closest('form'),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;

            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault(); // cancel on first error
            }
            });
        });
    });

    $form.on('submit', function(e) {
        if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('pk_test_51JIEUlL9sCoZ7ikA5ACNrQBYnDisUgJPRnkd37BHjE8JlVzO60vbtB3D9uIzCfEFv6DnskrcwAkBAF4AdyBKCEGI00dhvUYw3G'));
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection