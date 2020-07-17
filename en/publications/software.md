---
layout: layouts/page
title: "Publications: Software"
---

{% section %}

<table>
  <thead>
    <tr>
      <th>name and description</th>
      <th class="tiny-hide">type</th>
      <th>status</th>
      <th class="medium-hide"></th>
      <th class="small-hide">language</th>
      <th>release</th>
    </tr>
  </thead>
  <tbody>
    {% for item in software %}
    <tr>
      <td>
        <a href="{{ item.repository }}" target="_blank">{{ item.name }}</a>
        {{ item.description }}
      </td>
      <td class="tiny-hide">{{ item.type }}</td>
      <td>{{ item.status }}</td>
      <td class="medium-hide">
        {%- if item.travis -%}
        {%- set url = item.repository | replace("github.com", "travis-ci." + item.travis) -%}
        <a href="{{ url }}"><img src="{{ url }}.svg"></a>
        {%- endif -%}
      </td>
      <td class="small-hide">{{ item.language }}</td>
      <td>
        {%- if item.release -%}
          {%- set shield = "" -%}
          {%- set regExp = r/^https?:/ -%}
          {%- if regExp.test(item.release) -%}
            {%- set url = item.release -%}
          {%- elif item.language == "PHP" -%}
            {%- set url = "https://packagist.org/packages/" -%}
            {%- set shield = "packagist" -%}
          {%- elif item.language == "JavaScript" -%}
            {%- set url = "https://www.npmjs.com/package/" -%}
            {%- set shield = "npm" -%}
          {%- elif item.language == "Python" -%}
            {%- set url = "https://pypi.python.org/pypi/" -%}
            {%- set shield = "pypi" -%}
          {%- elif item.language == "Perl" -%}
            {%- set url = "https://metacpan.org/release/" -%}
            {%- set shield = "cpan" -%}
          {%- endif -%}
          {%- if shield -%}
            [![](https://img.shields.io/{{ shield }}/v/{{ item.release }}.svg?style=flat)]({{ url + item.release }})
          {%- else -%}
            [link]({{ url }})
          {%- endif -%}
        {%- endif -%}
      </td>
    </tr>
    {% endfor %}
  <tbody>
</table>

{% endsection %}

{% section "dark" %}

[All Publications]({{ "/publications/" | url }})

{% endsection %}
