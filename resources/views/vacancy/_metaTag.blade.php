<meta property="fb:admins" content={!! env('FB_CLIENT_ID') !!} />
<meta property="fb:app_id" content="your_app_id" />
<meta property="og:title" content={!! $vacancy->position !!} />
<meta property="og:url" content={!! env("APP_URL")."/vacancy/".$vacancy->id !!} />
<meta property="og:image" content={!! env("APP_URL")."/vacancy/".$vacancy->image !!} />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />