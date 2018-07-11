<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Popular currencies</title>
</head>
<body>
<div class="content">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th> id</th>
            <th> name</th>
            <th> price</th>
            <th> image url</th>
            <th> daily change percent</th>
        </tr>
        </thead>
        <tbody>
        @foreach($popularCurrencies as $currency)
            <tr>
                <td> {{$currency->getId()}} </td>
                <td> {{$currency->getName()}} </td>
                <td> {{$currency->getPrice()}} </td>
                <td> {{$currency->getImageUrl()}} </td>
                <td> {{$currency->getDailyChangePercent()}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
