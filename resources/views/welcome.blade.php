<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/jquery.autocomplete.css')}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <style>
        @media (min-width: 768px) {
            em {
                width: 8.33333333%;
            }
        }

        em {
            display: inline-block;
            width: 8.33333333%;
        }

        span.is-invalid {
            display: block;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 18px;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: #d43f3a;
        }

        span.valid {
            display: block;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 18px;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: #3c763d;
        }
    </style>
</head>
<body>
@inject('fieldGenerator', 'App\Services\FieldTypeGenerator')

<div class="container" id="app">
    <h1>Feedback-Formular</h1>
    <form class="" method="post">
        @foreach($fields as $field)
            {{$fieldGenerator->generate($field)}}
        @endforeach
        {{csrf_field()}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset('js/jquery.autocomplete.js')}}"></script>
<script src="{{asset('assets/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script>

    function CommaFormatted(Num) {
        Num += '';
        Num = Num.replace('.', '');
        x = Num.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        if (x1 + x2 >= 2000) {
            return 2000;
        }
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        return x1 + x2;
    }

    $(document).ready(function () {
        var prefixAlter = '19',
            $form = $('form'),
            postfixCost = ' €',
            inputVal,
            $alter = $("input[data-type='alter']"),
            $cost = $("input[data-type='cost']"),
            $autocomplete = $("input[data-type='autocomplete']"),
            $rating = $("div[data-type='rating']"),
            autocompleteList = ['Augsburg', 'München', 'Berlin', 'Ammersee', 'Münchhausen', 'Münster', 'Köln', 'Schwabmünchen'];
        $alter.val(prefixAlter);
        $cost.val("0" + postfixCost);
        $form.submit(false);
        $autocomplete.autocomplete({
            source: [autocompleteList]
        });

        $rating.rating();

        $alter.on('keyup change', function () {
            inputVal = $(this).val();
            if (inputVal.substr(0, prefixAlter.length) !== prefixAlter) {
                $(this).val(prefixAlter + inputVal.substr(prefixAlter.length - 1))
            }
        });
        /** todo: I LOSE 4 Hours!!! for this.. T_T*/
        $cost.on('keyup change', function () {
            inputVal = CommaFormatted(parseInt($(this).val().replace(/\D+/g, "")));
            if (!inputVal || inputVal === 'NaN') {
                inputVal = 0;
            }
            $(this).val(inputVal + postfixCost);
        });
        function setIcons() {
            $.each($.validator.messages, function (item) {
                $.validator.messages[item] = '&times;';
            })
        }

        setIcons();


        $form.validate({
            validClass: "is-valid",
            success: function (label) {
                label.addClass("valid").text("✓")
            },
            highlight: function (element) {
                $(element).removeClass("is-valid").addClass("is-invalid");
                $(element).closest(".form-group").find('em').find("span").removeClass("valid");
            },
            ignore: ".ignore",
            errorClass: "is-invalid",
            errorElement: "span",
            wrapper: "em",
            errorPlacement: function (error, element) {
                error.appendTo(element.closest('.form-group'));
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "{{route("submit")}}",
                    type: "POST",
                    dataType: "json",
                    data: $(form).serializeArray(),
                    success: function (response) {
                        if (response.message) {
                            alert(response.message);
                            setTimeout(function () {
                                location.reload()
                            }, 2000)
                        }
                    }
                });
                return false;
            }
        })
    });

</script>
</body>
</html>
