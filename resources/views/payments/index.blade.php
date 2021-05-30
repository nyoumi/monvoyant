<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Effectuer le paiement') }}
        </h2>
        <h4 class="font-semibold text-gray-600">
            {{ __('Vous êtes sur le point d \'effectuer le paiement de 300 Euros pour le pack 1') }}
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if (Session::has('success'))
                        <div class="alert alert-primary text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
        </h4>
                        <form role="form" action="{{ route('make-payment') }}" method="post" class="stripe-payment"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="stripe-payment">
                            @csrf

                            <p class="row">
                            {{ __('Veuillez remplir les informations de votre carte bancaire') }}

                            </p>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Nom du titulaire de la carte</label> <input class='form-control'
                                        size='8' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Numéro de la carte</label> <input autocomplete='off'
                                        class='form-control card-num' size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 595'
                                        size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>mois d'expiration</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' min="01" max="12" size='2' type='number'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Année d'expiration </label>
                                    <input  class='form-control card-expiry-year' placeholder='YYYY'
                                     size='4' type="number" min="1900" max="2099" step="1" value="2021" />
 
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 hidden error form-group'>
                                    <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                </div>
                            </div>

                            <div class="row" style="text-align: center; margin: auto;">
                            <div class="loader" id="loader" style="margin-bottom: 10px;margin: auto;display:none;"></div>

                                <button class="btn btn-success btn-lg btn-block" id="pay" style="margin: auto;" type="submit">Payer</button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {

        var $form = $(".stripe-payment");

        $('form.stripe-payment').bind('submit', function (e) {
            var $form = $(".stripe-payment"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),

                valid = true;
            $errorStatus.addClass('hidden');
         document.getElementById("pay").disabled =true;
         document.getElementById("loader").style.display = "block";



            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeRes);
            }

        });

        function stripeRes(status, response) {
            if (response.error) {
                document.getElementById("pay").disabled =false;
                document.getElementById("loader").style.display = "none";


                $('.error')
                    .removeClass('hidden')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

</script>
    </div>





</x-app-layout>
