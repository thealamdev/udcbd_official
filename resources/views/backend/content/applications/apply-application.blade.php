 @extends('backend.layouts.app')

 @section('title', 'Application')

 @section('content')
     <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
     {{-- <div class="col-lg-9 col-md-9 col-sm-12"> --}}
     {{-- blog start --}}
     <div class="row" style="margin-top: 30px;">
         @foreach ($blogs as $blog)
             <div class="blo col-md-2 col-lg-2">
                 <a href="{{ route('admin.sanad.details', ['sanad' => $blog->description]) }}" class="text-center">
                     <div class="xs-single-causes">
                         <img src="{{ asset('/setting/banner/' . $blog->image) }}" alt=""
                             style="max-width: 80%;margin-top:10px; height:100px;">
                         <div class="xs-causes-footer">
                             <h5 class="color-light-red">{{ $blog->description }}</h5>
                         </div>
                     </div>
                 </a>
             </div>
         @endforeach
     </div>

     {{-- </div> --}}
 @endsection
