@extends('layouts.app')

@section('page_title', 'EMI Calculator')

@section('content')
        
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(frontend/images/backgrounds/page-header-bg-1-1.jpg);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>/</li>
                    <li><a href="javascript::">Emi Calculator</a></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
                <h2>{{ (session('langCode') == 'en') ? "EMI Calculator" : "ই.এম.আই ক্যাল্কুলেটর" }}</h2>
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <div class="card shadow">
                            <div class="card-header">
                                <strong>{{ __('message.how_much_you_need') }}</strong>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="mb-3">
                                        <label for="">Loan Amount</label>
                                        <div class="input-group">
                                            <input type="number" name="laon_amount" id="loan_amount" class="form-control" value="100000" onkeyup="calculator()">
                                            <span class="input-group-text">BDT</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Interest Rate</label>
                                        <div class="input-group">
                                            <input type="number" name="rate" id="rate" class="form-control" value="10" onkeyup="calculator()">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="">Loan Period</label>
                                        <div class="input-group">
                                            <input type="number" name="period" id="period" class="form-control" value="12" onkeyup="calculator()">
                                            <span class="input-group-text">Years</span>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><strong>EMI</strong></span>
                                            <input type="text" id="result" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><strong>Total Payment</strong></span>
                                            <input type="text" id="total_pay" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="my-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><strong>Total Interest</strong></span>
                                            <input type="text" id="total_interest" class="form-control" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br>
                        <a href="{{ route('contact') }}" class="btn btn-primary my-5 p-3">Contact to support</a>
                    </div><!-- /.col-lg-8 -->
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-details -->

@endsection

@push('js')
    <script>
        
        var calculator = () => {
            var loan_amount = $("#loan_amount").val();
            var rate = $("#rate").val();
            var years = $("#period").val();
            var months = years * 12;

            let r = rate / (12 * 100);
            let x = (1 + r);
            let y = Math.pow(x, months);

            let output = (loan_amount * r * y) / (y - 1);
            let total_pay = output * months;
            let profit = total_pay - loan_amount;
            

            $("#result").val(output.toFixed(2));
            $("#total_pay").val(total_pay.toFixed(2));
            $("#total_interest").val(profit.toFixed(2));
        }

        calculator();
        
    </script>
@endpush