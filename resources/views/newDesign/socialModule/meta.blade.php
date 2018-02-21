@include('newDesign.socialModule._index',[
    'title'         => (isset($title))          ? $title        : 'Robota molodi',
    'description'   => (isset($description))    ? $description  : 'Project Robota Molodi created to simplify communication between young specialists and employers',
    'image'         => (isset($image))          ? $image        : '/image/logo.png',
    'url'           => URL::current(),
])§