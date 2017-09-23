<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/jquery.autocomplete.css')}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <style>

    </style>
</head>
<body>
@inject('fieldGenerator', 'App\Services\FieldTypeGenerator')

<div class="container" id="app">
    <h1>Feedback-Formular</h1>
    <form class="">
        @foreach($fields as $field)
            {{$fieldGenerator->generate($field)}}
        @endforeach
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset('js/jquery.autocomplete.js')}}"></script>
<script>

    function CommaFormatted(Num) {
        Num += '';
        Num = Num.replace(',', '');
        Num = Num.replace(',', '');
        Num = Num.replace(',', '');
        Num = Num.replace(',', '');
        Num = Num.replace(',', '');
        Num = Num.replace(',', '');
        x = Num.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        return x1 + x2;
    }

    $(document).ready(function () {
        var prefixAlter = '19',
            postfixCost = ' €',
            inputVal,
            $alter = $("input[data-type='alter']"),
            $cost = $("input[data-type='cost']"),
            $autocomplete = $("input[data-type='autocomplete']"),
            $rating = $("div[data-type='rating']"),
            autocompleteList = ['Augsburg', 'München', 'Berlin', 'Ammersee', 'Münchhausen', 'Münster', 'Köln', 'Schwabmünchen'];
        $alter.val(prefixAlter);
        $cost.val("0" + postfixCost);

        $autocomplete.autocomplete({
            source:[autocompleteList]
        });

        $rating.rating();

        $alter.on('keyup change', function () {
            inputVal = $(this).val();
            if (inputVal.substr(0, prefixAlter.length) !== prefixAlter) {
                $(this).val(prefixAlter + inputVal.substr(prefixAlter.length - 1))
            }
        });
        /** todo: FUCK THIS SHIT!!!!!!!!! I LOSE 4 Hours!!!*/
        $cost.on('keyup change', function () {
            inputVal = CommaFormatted(parseInt($(this).val().replace(/\D+/g, "")));
            if (!inputVal || inputVal === 'NaN') {
                inputVal = 0;
            }
            $(this).val(inputVal + postfixCost);
        })
    })

</script>
</body>
</html>
