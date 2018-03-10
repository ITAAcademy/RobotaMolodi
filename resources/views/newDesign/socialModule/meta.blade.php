@include('newDesign.socialModule._index',[
    'app_name'      => (($name = env('APP_NAME'))) ? $name : 'Robota Molodi',
    'title'         => (isset($title)) ? $title : 'Robota molodi',
    'description'   => (isset($description))
                                            ? substr(preg_replace("/&#?[a-z0-9]+;/i"," ", filter_var( $description , FILTER_SANITIZE_STRING , FILTER_SANITIZE_URL)),0,127) .'...'
                                            : 'Project Robota Molodi created to simplify communication between young specialists and employers',
    'image'         => (isset($image) && $image!=NULL && $image != 'NULL' ) ? $image : asset('/image/logo.png'),
    'url'           => URL::current(),
])