<section id="how-work" class="pt-50 pb-50 section--bg">

       {{-- <h5>LOAN CALCULATOR</h5>--}}
    <div class="section-header text-center">
        <h2 class="section-title">LOAN CALCULATOR</h2>
    </div>
        <br>

    <div class="container">
        <div class="row">
            <div class="col-md">
                <img src="{{ getImage( 'assets/images/loans_calculator.jpg', '300x300') }}"/>
                <div>
                    <h3 class="m-4">Calculate your loan’s monthly repayment</h3>
                </div>

            </div>
            <div class="col-lg">
                <div class="contact-form-wrapper" >
                    <div class="shadow p-3 mb-5 bg-white rounded">

                        <form method="POST" action="">
                        @csrf

                        <!-- Loan Type -->
                            <div>

                                <!-- Loan Amount -->
                                <div class="row">
                                    <div class="col mx-4 mt-3">
                                        <h6>Loan Amount:(GHS)</h6>
                                    </div>

                                    <div class="col mx-1">
                                        <div class="form-group">

                                            <input type="email" class="form-control" id="loan_type" aria-describedby="loantypeHelp" placeholder="Amount">

                                        </div>
                                    </div>

                                </div>


                                <!-- Tenure Months -->
                                <div class="row">
                                    <div class="col mx-4 mt-3">
                                        <!--Show the number of months to the user-->
                                        <h6>Tenure (Months)</h6>
                                    </div>

                                    <div class="col mx-1">
                                        <div class="mt-2">


                                            <select class="block mt-1 w-full form-select " name="tenure_months" id="tenure_months" required>
                                                <option value="3" >3 Month </option>
                                                <option value="6">6 Months</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <!-- Loan Amount -->
                                <div class="row mt-3">
                                    <div class="col mx-4 mt-3">
                                        <h6>Interest Rate(%)</h6>
                                    </div>

                                    <div class="col mx-1">
                                        <div class="form-group">

                                            <input type="email" class="form-control" id="loan_type" aria-describedby="loantypeHelp" placeholder="3%" disabled>

                                        </div>
                                    </div>

                                </div>


                                <br>
                                <!-- Loan Application Submitt -->
                                <div class="flex items-center justify-end mt-4">

                                    <button type="submit" class="ml-4 btn btn-primary">Calculate</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



</section>

<script src="{{ asset('nice/js/jquery.min.js') }}"></script>

