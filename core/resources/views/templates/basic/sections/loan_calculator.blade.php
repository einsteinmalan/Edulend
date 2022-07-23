



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
                    <div class="shadow p-3 mb-5 bg-white rounded" id="ticketTable">

                        <form method="GET" action="">
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

                                            <input type="text" class="entry_point form-control" id="loan_amount" aria-describedby="loantypeHelp" placeholder="Amount">

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


                                <!-- Monthly repayment Amount -->
                                <div class="row mt-3">
                                    <div class="col mx-4 mt-0">
                                        <h6>Monthly repayment (GHS)</h6>
                                    </div>

                                    <div class="col mx-1">
                                        <div class="form-group">

                                            <input type="email" class="repayment_amt form-control" id="amt_repayment" aria-describedby="loantypeHelp" placeholder="0`" disabled>

                                        </div>
                                    </div>

                                </div>


                                <br>
                                <!-- Loan Application Submitt -->
                                <div class="flex items-center justify-end mt-4">

                                   {{-- <button type="submit" class="ml-4 btn btn-primary">Calculate</button>--}}
                                    <input type="button"  class="btnSelect ml-4 btn btn-primary" onclick="calculateMonthly();" value="Calculate">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<script type="text/javascript">

    function calculateMonthly(){
        let num_month = document.getElementById("tenure_months").value;
        let amt_borrow = document.getElementById("loan_amount").value;
        document.getElementById("amt_repayment").value= (amt_borrow/num_month) + (amt_borrow/num_month)*0.03;

    }

</script>

<script src="{{ asset('nice/js/jquery.min.js') }}"></script>




<script>

   /* $("#ticketTable").on('click','.btnSelect',function() {

        var myModal = $('#ediiTickettype');

        var currentRow = $(this).closest("div");


        var amount_trx = currentRow.find('div.entry_point').html();



        $('#repayment_amt', myModal).val(colInvoice);



        return false;
    })*/
</script>

