@include('newDesign.socialModule.facebook.set',[
    'app_name'      => env('APP_NAME'),
    'title'         => $title,
    'description'   => $description,
    'url'           => $url,
    'image'         => $image
])
@include('newDesign.socialModule.twitter.set',[
    'app_name'      => env('APP_NAME'),
    'title'         => $title,
    'description'   => $description,
    'url'           => $url,
    'image'         => $image
])