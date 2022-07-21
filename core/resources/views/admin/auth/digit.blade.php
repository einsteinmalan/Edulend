@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
           {{-- <div class="form-wrapper">
                <h4 class="logo-text mb-15">@lang('Welcome to') <strong>{{__($general->sitename)}}</strong></h4>
                <p>{{__($pageTitle)}} @lang('to')  {{__($general->sitename)}} @lang('dashboard')</p>
                <form action="{{ route('admin.login') }}" method="POST" class="cmn-form mt-30">
                    @csrf
                    <div class="form-group">
                        <label for="email">@lang('Username')</label>
                        <input type="text" name="username" class="form-control b-radius--capsule" id="username" value="{{ old('username') }}" placeholder="@lang('Enter your username')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="pass">@lang('Password')</label>
                        <input type="password" name="password" class="form-control b-radius--capsule" id="pass" placeholder="@lang('Enter your password')">
                        <i class="las la-lock input-icon"></i>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.password.reset') }}" class="text-muted text--small"><i class="las la-lock"></i>@lang('Forgot password?')</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>--}}
            <div id="pinpad">

                <form >
                    <h4 class="logo-text mb-15">Please enter your <strong> PIN</strong></h4>


                    <input type="password" id="password" /> </br>

                    <input type="button" value="1" id="1" class="pinButton calc"/>

                    <input type="button" value="2" id="2" class="pinButton calc"/>

                    <input type="button" value="3" id="3" class="pinButton calc"/><br>

                    <input type="button" value="4" id="4" class="pinButton calc"/>

                    <input type="button" value="5" id="5" class="pinButton calc"/>

                    <input type="button" value="6" id="6" class="pinButton calc"/><br>

                    <input type="button" value="7" id="7" class="pinButton calc"/>

                    <input type="button" value="8" id="8" class="pinButton calc"/>

                    <input type="button" value="9" id="9" class="pinButton calc"/><br>

                    <input type="button" value="clear" id="clear" class="pinButton clear"/>

                    <input type="button" value="0" id="0 " class="pinButton calc"/>

                    <input type="button" value="enter" id="enter" class="pinButton enter"/>

                </form>

            </div>
        </div><!-- login-area end -->
    </div>

    <style>
        form {

            width: 390px;
            margin: 50px auto;
            background: #fff;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0px 5px 5px -0px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }


        input[type="text"] {
            padding: 0 40px;
            border-radius: 5px;
            width: 350px;
            margin: auto;
            border: 1px solid rgb(228, 220, 220);
            outline: none;
            font-size: 60px;
            color: transparent;
            text-shadow: 0 0 0 rgb(71, 71, 71);
            text-align: center;
        }

        input:focus {
            outline: none;
        }


        .pinButton {
            border: none;
            background: none;
            font-size: 1.5em;
            border-radius: 50%;
            height: 60px;
            font-weight: 500;
            width: 60px;
            color: transparent;
            text-shadow: 0 0 0 rgb(102, 101, 101);
            margin: 7px 20px;
        }


        .clear,
        .enter {
            font-size: 1em !important;
        }


        .pinButton:hover {
            box-shadow: #506ce8 0 0 1px 1px;
        }

        .pinButton:active {

            background: #506ce8;
            color: #fff;
        }


        .clear:hover {
            box-shadow: #ff3c41 0 0 1px 1px;
        }

        .clear:active {
            background: #ff3c41;
            color: #fff;
        }

        .enter:hover {

            box-shadow: #47cf73 0 0 1px 1px;

        }


        .enter:active {
            background: #47cf73;
            color: #fff;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script>
        $(document).ready(function () {

            const input_value = $("#password");

            //disable input from typing
            $("#password").keypress(function () {
                return false;

            });

            //add password

            $(".calc").click(function () {
                let value = $(this).val();
                field(value);
            });


            function field(value) {

                input_value.val(input_value.val() + value);

            }


            $("#clear").click(function () {

                input_value.val("");

            });



            $("#enter").click(function () {
                if(input_value.val() === "1234"){
                  //s  alert("Your PIN " + input_value.val() + " added");
                    window.location.href = "{{ route('admin.dashboards')}}";
                }else {
                    alert("Wrong PIN entered " );
                }
               // alert("Your password " + input_value.val() + " added");

            });

        });
    </script>

@endsection

