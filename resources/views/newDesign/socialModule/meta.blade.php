@include('newDesign.socialModule._index',[
    'title'         => (isset($title)) ? $title : 'Robota molodi',
    'description'   => (isset($description))
                                            ? substr(preg_replace("/&#?[a-z0-9]+;/i"," ", filter_var( $description , FILTER_SANITIZE_STRING , FILTER_SANITIZE_URL)),0,127) .'...'
                                            : 'Project Robota Molodi created to simplify communication between young specialists and employers',
    'image'         => (isset($image) && $image!=NULL && $image != 'NULL' ) ? $image : '/image/logo.png',
    'url'           => URL::current(),
])