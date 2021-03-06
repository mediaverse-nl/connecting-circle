<?php
//    $mpdf->shrink_tables_to_fit = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>cv</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style type="text/css">
        body {
            margin: 0px;
            font-size: 10pt;
            font-family: 'Roboto', sans-serif;
            line-height: 1.3;
            padding-top: 0px;
            height: 100%;
        }
        @page {
            size: 21cm 29.7cm;
            margin: 0;
            background: rgb(52,58,64);
            background: linear-gradient(to left, rgba(52,58,64,1) 30%, rgba(238,238,238,1) 30%, rgba(238,238,238,1) 100%);
            /*background-image:*/
            /*    linear-gradient(*/
            /*        to right,*/
            /*        #eee,*/
            /*        #eee 30%,*/
            /*        #eee 70%,*/
            /*        #343a40 70%*/
            /*    );*/
        }

        b{
            font-weight: 700;
        }

        .w-30 {
            width: 28% !important;
        }
        .w-70 {
            width: 72% !important;
        }
        .break{
            height: 1px;
            color: #d6dade;
            /*background-color: red;*/
            border: none;
        }
        .break-white{
            height: 1px;
            color: #ffffff;
            /*background-color: red;*/
            border: none;
        }
        .profile_img {
            /*margin: 20px;*/
            width: 200px;
            height: 200px;
            border-radius: 300px;
            border-style: solid;
            border-color: white;
            border-width: medium;

            overflow: hidden;

            /*background-size: 400px 400px;*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: top center;
            background-size: cover;
        }

        /*#mainDiv::before {*/
        /*    left: 0;*/
        /*    background-color: green;*/
        /*}*/
    </style>
</head>
<body style="height: 100%;  ">

    <div id="mainDiv" style="height: 100%;  width:100%;">
        <div style="width: 25%; height: 100%; float: left;" class="bg-d ark text-white p-3">
            <div class="profile_img" style="background-image: url('{!! $data->profiel_foto !!}');"></div>
{{--            <div class="profile_img" style="background-image: url('http://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg');"></div>--}}
            <br>
            <h3 class="h5" style="margin-bottom: -5px;">Personalia</h3>
            <hr class="break-white">
            <b style="font-weight: bold; display: block;">Naam</b>
            <p class="pb-1">{!! $data->voornaam !!} {!! $data->voorvoegsel !!} {!! $data->achternaam !!}</p>
            <b style="font-weight: bold; display: block;">Adres</b>
            <p class="pb-1">{!! $data->adres!!}, <br>  {!! $data->postcode!!} {!! $data->plaats!!}</p>
            <b style="font-weight: bold; display: block;">Telefoonnummer</b>
            <p class="pb-1">{!! $data->telefoon_prive!!}</p>
            <b style="font-weight: bold; display: block;">E-mailadres</b>
            <p class="pb-1">{!! $data->email!!}</p>
            <b style="font-weight: bold; display: block;">Geboortedatum</b>
            <p class="pb-1">{!! \Carbon\Carbon::parse($data->geboortedatum)->format('d-m-Y')!!}</p>
            <b style="font-weight: bold; display: block;">Rijbewijs</b>
            <p class="pb-1">{!! $data->rijbewijs ?? '-'!!}</p>
{{--            <b style="font-weight: bold; display: block;">Social media</b>--}}
{{--            <p class="pb-1">{!! $data->sociaal_networkprofiel!!}</p>--}}


            @if(!$data->interests->isEmpty())
                <p class="h5" style="margin-bottom: -5px;">Interesses</p>
                <hr class="break-white">
                @foreach( $data->interests as $inter)
                    <table style="width: 100%;" class="text-white">
                        <tr>
                            <td style="text-align: left; font-weight: bold; display: block; width: 5px;">- </td>
                            <td style="text-align: left; font-weight: bold; display: block;">{{$inter->interesse}}</td>
                        </tr>
                    </table>
                @endforeach
                <br>
            @endif

            <p class="h5 pt-2" style="margin-bottom: -5px;">Talen</p>
            <hr class="break-white">
            <table style="width: 100%;" class="text-white">
                @foreach( $data->languages as $lang)
                    <tr>
                        <td style="text-align: left; font-weight: bold; display: block;">{{$lang->taal}}</td>
                        <td style="text-align: right">{{$lang->ervaring}}</td>
                    </tr>

                @endforeach
            </table>

        </div>
        <div style="width: 66%; float: right;" class="p-3">
            <img src="{{getSetting('logo')}}" alt="">
             <hr class="break">

            <h2 class="h5 mt-4">Inleiding</h2>
            <p class="py-3">{!! nl2br($data->inleiding) !!}</p>
            @if(!$data->educations->isEmpty())
                <h2 class="h5 mt-3">Opleidingen</h2>
                <hr class="break">
                <table class="w-100" style="">
                    @foreach($data->educations as $edu)
                        <tr>
                            <td class="text-black-50 " style="font-weight: bold; display: block; width: 70%">
                                <p style="font-weight: 900; font-size: 15px; display: inline-block">{!! $edu->schooling !!}</p>
                            </td>
                            <td class="text-black-50" style="display: block; text-align: right">
                                {!! $edu->van !!} - {!! $edu->tot !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-black-50" style="padding-bottom: 25px;">
                                <i>{!! $edu->school_en_plaats !!}</i>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            @if(!$data->experiences->isEmpty())
                <h2 class="h5 mt-3">Werkervaring</h2>
                <hr class="break">
                <table class="w-100" style="">
                    @foreach($data->experiences as $edu)
                        <tr>
                            <td class="text-black-50 font-weight-bold" style="font-weight: bold; display: block; width: 70%">
                                <p style="font-weight: 900; font-size: 15px; display: inline-block"> {!! $edu->functie !!}</p>
                            </td>
                            <td class="text-black-50" style="display: block; text-align: right">
                                {!! $edu->van !!} - {!! $edu->tot !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-black-50" style="padding-bottom: 25px;">
                                <i>{!! $edu->bedrijf !!}</i> <br>
                                {!! nl2br($edu->inleiding) !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            @if(!$data->skills->isEmpty())
                <h2 class="h5 mt-3">Vaardigheden</h2>
                <hr class="break">
                <table class="w-100" style="margin-bottom: 25px;">
                    @foreach($data->skills as $skill)
                        <tr style="">
                            <td class="text-black-50" style="font-weight: 500; display: block; width: 70%; padding:7px 0px;">
                                {!! nl2br($skill->vaardigheid) !!}
                            </td>
                            <td class="text-black-50" style="font-weight: bold;display: block; text-align: right">
                                {!! $skill->ervaring !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

            @if(!$data->references->isEmpty())
                <h2 class="h4">Referenties</h2>
                <table class="w-100">
                    @foreach($data->references as $ref)
                        <tr style="padding-bottom: 25px;">
                            <td class="text-black-50 font-weight-bold" style="font-weight: bold; display: block; width: 33%">
                                {!! $ref->contactpersoon !!}
                            </td>
                            <td class="text-black-50" style="display: block; text-align: right">
                                {!! $ref->bedrijf !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-black-50" style="padding-bottom: 25px;">
                                <i>{!! $ref->telefoonnummer !!}</i> <br>
                                <i>{!! $ref->email !!}</i>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif

        </div>
    </div>
</body>
</html>
