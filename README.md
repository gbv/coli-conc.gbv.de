# New coli-conc Homepage
Currently under development.

### URLs
Run all absolute URLs through Eleventy's `url` filter so that they will point to the correct path:

```
[some link]({{ "/path/" | url }})
```

### Sections
All content should use sections. There is a custom paired shortcode `section` which can be used for this:

```
{% section "dark" %}

Content of this section.

{% endsection %}
```

The parameter can be `"dark"`, `"light"`, or empty.
