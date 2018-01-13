<meta property="fb:admins" content={!! env('FB_CLIENT_ID') !!} />
<meta property="fb:app_id" content="your_app_id" />
<meta property="og:title" content={!! $company->company_name !!} />
<meta property="og:url" content={!! env("APP_URL")."/company/".$company->id !!} />
<meta property="og:image" content={!! env("APP_URL")."/company/".$company->image !!} />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="200" />
<meta property="og:image:height" content="200" />