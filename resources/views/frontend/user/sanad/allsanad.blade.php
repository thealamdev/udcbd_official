 @extends('frontend.layouts.app')

 @section('title', 'Sanad')

 @section('content')
     <div class="container">
         <div class="row" style="margin-top: 30px;">
             @foreach ($sanads as $blog)
                 <div class="blo col-md-2 col-lg-2">
                     <a href="{{ route('frontend.user.sanad.details', ['sanad' => $blog->description]) }}"
                         class="text-center">
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
     </div>
 @endsection
