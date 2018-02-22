<meta
        name="{{ $name }}"
        content="{{ substr(preg_replace("/&#?[a-z0-9]+;/i"," ", filter_var( $description , FILTER_SANITIZE_STRING , FILTER_SANITIZE_URL)),0,127) .'...' }}"
>