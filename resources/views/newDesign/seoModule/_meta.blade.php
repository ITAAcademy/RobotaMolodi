<meta
        name="{{ $name }}"
        content="{{substr(trim(preg_replace('/ +/', ' ',preg_replace('/[^A-Za-z0-9 ]/', ' ',urldecode(html_entity_decode(strip_tags($content)))))),0,150).'...' }}"
>