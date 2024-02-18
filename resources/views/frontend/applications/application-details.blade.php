@extends('frontend.layouts.qr')

@section('title', 'Application')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    @php
        // for english to bangla
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
        
        $union = App\Models\Union::find($application->union_id);
    @endphp


        @if ($sanad->description == 'বাৎসরিক আয়ের সনদপত্র')
            @include('frontend.applications.sanad-certificate.c_batshorik')
        @elseif ($sanad->description == 'মাসিক আয়ের সনদ')
            @include('frontend.applications.sanad-certificate.c_monthly')
            @elseif ($sanad->description == 'পারিবারিক সনদ')
            @include('frontend.applications.sanad-certificate.c_paribarik')
        @elseif ($sanad->description == 'মৃত্যু সনদ')
            @include('frontend.applications.sanad-certificate.c_dead')
        @elseif ($sanad->description == 'ভূমিহীন সনদ')
            @include('frontend.applications.sanad-certificate.c_bhumihin')
        @elseif ($sanad->description == 'জাতীয়তা সনদ')
            @include('frontend.applications.sanad-certificate.c_nationality')
        @elseif ($sanad->description == 'নাগরিক সনদ')
            @include('frontend.applications.sanad-certificate.c_nagorik')
        @elseif ($sanad->description == 'পুনঃবিবাহ না হওয়ার প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_punobibaho')
        @elseif ($sanad->description == 'অভিভাবকের অনুমতিপত্র')
            @include('frontend.applications.sanad-certificate.c_obivabok')
        @elseif ($sanad->description == 'মুক্তিযোদ্ধা প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_freedomfighter')
        @elseif ($sanad->description == 'বিবিধ সনদ')
            @include('frontend.applications.sanad-certificate.c_bidoba')
        @elseif ($sanad->description == 'অবিবাহিত সনদ')
            @include('frontend.applications.sanad-certificate.c_obibahito')
        @elseif ($sanad->description == 'স্থায়ী বাসিন্দা সনদ')
            @include('frontend.applications.sanad-certificate.c_permanentResident')
        @elseif ($sanad->description == 'প্রত্যায়ন পত্র নাম')
            @include('frontend.applications.sanad-certificate.c_samename')
        @elseif ($sanad->description == 'চারিত্রিক সনদ')
            @include('frontend.applications.sanad-certificate.c_charitrik')
        @elseif ($sanad->description == 'উত্তরাধিকার সনদ')
            @include('frontend.applications.sanad-certificate.c_uttoradhikar')
        @elseif ($sanad->description == 'ওয়ারিশ সনদ')
            @include('frontend.applications.sanad-certificate.c_oarish')
        @elseif ($sanad->description == 'পুনঃবিবাহ না হওয়া সনদ')
            @include('frontend.applications.sanad-certificate.c_porno_biya')
        @elseif ($sanad->description == 'নতুন ভোটার প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_newVoter')
         @elseif ($sanad->description == 'বিধবা প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_bidoba')
         @elseif ($sanad->description == 'সম্প্রদায় সনদ')
            @include('frontend.applications.sanad-certificate.c_sampro')
         @elseif ($sanad->description == 'কৃষি প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_kri')
             @elseif ($sanad->description == 'এতিম সনদ')
            @include('frontend.applications.sanad-certificate.c_etim')
         @elseif ($sanad->description == 'বিবাহিত সনদ')
            @include('frontend.applications.sanad-certificate.c_biya')
        @elseif ($sanad->description == 'উপজাতি সনদ')
            @include('frontend.applications.sanad-certificate.c_opoj')
        @elseif ($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন')
            @include('frontend.applications.sanad-certificate.c_song')
        @elseif ($sanad->description == 'নিঃসন্তান প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_son')
        @elseif ($sanad->description == 'আর্থিক অস্বচ্ছলতার সনদ')
            @include('frontend.applications.sanad-certificate.c_arthik')
        @elseif ($sanad->description == 'অনাপত্তি সনদ')
            @include('frontend.applications.sanad-certificate.c_onap')
        @elseif ($sanad->description == 'অবকাঠামো নির্মাণের অনুমতি সনদ')
            @include('frontend.applications.sanad-certificate.c_obok')
        @elseif ($sanad->description == 'অটো রিক্সা ট্রেডলাইসেন্স')
            @include('frontend.applications.sanad-certificate.c_auto')
        @elseif ($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন')
            @include('frontend.applications.sanad-certificate.c_nid_solve')
         @elseif ($sanad->description == 'প্রতিবন্ধী সনদ')
            @include('frontend.applications.sanad-certificate.c_protibondi')
        @elseif ($sanad->description == 'বেকারত্ব সনদ')
            @include('frontend.applications.sanad-certificate.c_bekar')
             @elseif ($sanad->description == 'ট্রেড লাইসেন্স')
            @include('frontend.applications.sanad-certificate.c_trade')
            
            
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>



    @endif
@endsection
