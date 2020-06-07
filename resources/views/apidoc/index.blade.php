<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css" />
    <script src="/docs/js/all.js"></script>


            <style>
    .tocify-wrapper img {
        max-width: 80%;
        padding: 10%;

    }
</style>
      <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>client/vouchers</h1>
<!-- START_dc72ce1c48a10112b189b0b4b1719ec7 -->
<h2>index</h2>
<p>Get all vouchers</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/client/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/client/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "voucher_status": 3,
            "voucher_receiver_kind": 1,
            "voucher_receiver_email": null,
            "voucher_receiver_name": null,
            "code": "J1X30ONVIUDU",
            "created_at": "2020-03-26 01:39:25",
            "user": {
                "first_name": "Deron",
                "last_name": "Kaycee",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg"
            },
            "service": {
                "id": 17,
                "image": "https:\/\/lorempixel.com\/640\/480\/?81832",
                "title": "Come on!' 'Everybody says \"come on!\".",
                "description": "Quibusdam aperiam rerum eius ea. Est excepturi et et dolores accusamus nulla. Non quaerat nostrum blanditiis sint.",
                "fee_int": 11600,
                "max_voucher_numbers": 200,
                "discount_int": 20,
                "created_at": "2020-04-04 22:33:35",
                "company": {
                    "first_name": "Mitchel",
                    "last_name": "Leilani",
                    "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/21.jpg",
                    "company_name": "Koepp, Jaskolski and Lowe",
                    "company_address": "75934 Reyes Village\nPort Eusebiomouth, DE 50414"
                }
            }
        },
        {
            "voucher_status": 3,
            "voucher_receiver_kind": 0,
            "voucher_receiver_email": "gilda96@hotmail.com",
            "voucher_receiver_name": "Emiliano Streich",
            "code": "TI07GWAETOZE",
            "created_at": "2020-03-26 01:39:25",
            "user": null,
            "service": {
                "id": 16,
                "image": "https:\/\/lorempixel.com\/640\/480\/?71018",
                "title": "I hadn't gone down that.",
                "description": "Asperiores ipsa eum ad voluptas. Delectus minima sint cum et. Sed sed aspernatur nulla molestias iure quo rerum.",
                "fee_int": 20000,
                "max_voucher_numbers": 1000,
                "discount_int": 5,
                "created_at": "2020-04-04 22:33:35",
                "company": {
                    "first_name": "Gilbert",
                    "last_name": "Rod",
                    "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/26.jpg",
                    "company_name": "Conroy PLC",
                    "company_address": "8963 Reinger Hollow Apt. 934\nSouth Chandler, MT 49069"
                }
            }
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/client/vouchers</code></p>
<!-- END_dc72ce1c48a10112b189b0b4b1719ec7 -->
<!-- START_c4e1cc2d3f082c4cb7b32449f9e52ba0 -->
<h2>store</h2>
<p>Store a new voucher</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/client/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"service_id":9}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/client/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "service_id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 0,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "bednar.jason@wilderman.com",
        "voucher_receiver_name": "Yasmeen Willms",
        "code": "8W3IUYHKLAUQ",
        "created_at": "2020-03-26 01:39:25",
        "user": null,
        "service": {
            "id": 7,
            "image": "https:\/\/lorempixel.com\/640\/480\/?71439",
            "title": "Alice replied thoughtfully. 'They have.",
            "description": "Ab vel ipsa iste. Architecto enim qui unde eaque. Dolores cupiditate et est quas. Ut quod voluptatum ut ut minus.",
            "fee_int": 14300,
            "max_voucher_numbers": 600,
            "discount_int": 15,
            "created_at": "2020-04-04 22:33:09",
            "company": {
                "first_name": "Eduardo",
                "last_name": "Cody",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/5.jpg",
                "company_name": "King, Conn and Glover",
                "company_address": "95481 Gusikowski Parkway Suite 210\nPort Joaniemouth, NM 26626-9396"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/client/vouchers</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>service_id</code></td>
<td>integer</td>
<td>optional</td>
<td>ID of a service.</td>
</tr>
</tbody>
</table>
<!-- END_c4e1cc2d3f082c4cb7b32449f9e52ba0 -->
<!-- START_9b906f62cd458038d89add97646a086c -->
<h2>get</h2>
<p>Get voucher by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/client/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/client/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 0,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "lauryn.swift@yahoo.com",
        "voucher_receiver_name": "Kurtis Kuhn IV",
        "code": "EZ7V139G8WBJ",
        "created_at": "2020-03-31 01:39:25",
        "user": null,
        "service": {
            "id": 5,
            "image": "https:\/\/lorempixel.com\/640\/480\/?22207",
            "title": "Dodo replied very gravely. 'What else.",
            "description": "Nihil reprehenderit aut laudantium reprehenderit quo. Libero laudantium unde molestiae nemo non illum.",
            "fee_int": 13800,
            "max_voucher_numbers": 400,
            "discount_int": 15,
            "created_at": "2020-04-04 22:33:08",
            "company": {
                "first_name": "Francisca",
                "last_name": "Abraham",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/60.jpg",
                "company_name": "Nolan, Wisoky and Bernhard",
                "company_address": "30325 Hirthe Avenue Apt. 490\nBeverlyshire, TN 56546"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/client/vouchers/{voucher_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>integer The ID of the voucher.</td>
</tr>
</tbody>
</table>
<!-- END_9b906f62cd458038d89add97646a086c -->
<!-- START_24c94e2de257e0a1ba5cb398d49ffe11 -->
<h2>delete</h2>
<p>Remove voucher by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/api/client/vouchers/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/client/vouchers/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 0,
        "voucher_receiver_kind": 1,
        "voucher_receiver_email": null,
        "voucher_receiver_name": null,
        "code": "2FPUHUKWDZQK",
        "created_at": "2020-03-31 01:39:25",
        "user": {
            "first_name": "Leila",
            "last_name": "Shany",
            "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/40.jpg"
        },
        "service": {
            "id": 3,
            "image": "https:\/\/lorempixel.com\/640\/480\/?97284",
            "title": "Pat, what's that in the last words out.",
            "description": "Quibusdam commodi ut error et ut. Modi aspernatur modi dolore. Eum maiores fugiat maiores eum reprehenderit eligendi.",
            "fee_int": 15700,
            "max_voucher_numbers": 800,
            "discount_int": 20,
            "created_at": "2020-04-04 22:33:08",
            "company": {
                "first_name": "Tevin",
                "last_name": "Maverick",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/57.jpg",
                "company_name": "Wehner, Tromp and Batz",
                "company_address": "535 Jaunita Rapids Suite 371\nBorerview, WI 00253"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/client/vouchers/{voucher_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>integer The ID of the voucher.</td>
</tr>
</tbody>
</table>
<!-- END_24c94e2de257e0a1ba5cb398d49ffe11 -->
<h1>company/finances</h1>
<!-- START_1b5dbf05fb2b9a2690f799580276f2e0 -->
<h2>vouchers</h2>
<p>Get statistics for vouchers</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/finances/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/finances/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_statistics_day": [
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 3
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-26",
                "total": 1
            },
            {
                "created_at": "2020-03-26",
                "total": 1
            },
            {
                "created_at": "2020-03-26",
                "total": 1
            },
            {
                "created_at": "2020-03-26",
                "total": 1
            },
            {
                "created_at": "2020-03-26",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 2
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 2
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 2
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 2
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 2
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-03-31",
                "total": 1
            },
            {
                "created_at": "2020-04-01",
                "total": 2
            },
            {
                "created_at": "2020-04-01",
                "total": 2
            },
            {
                "created_at": "2020-04-01",
                "total": 2
            },
            {
                "created_at": "2020-04-01",
                "total": 2
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 3
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 2
            },
            {
                "created_at": "2020-04-03",
                "total": 2
            }
        ],
        "voucher_statistics_kind": [
            {
                "voucher_status": 0,
                "total": 16
            },
            {
                "voucher_status": 1,
                "total": 17
            },
            {
                "voucher_status": 3,
                "total": 24
            },
            {
                "voucher_status": 2,
                "total": 21
            }
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/finances/vouchers</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>service_id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<!-- END_1b5dbf05fb2b9a2690f799580276f2e0 -->
<h1>company/services</h1>
<!-- START_e437fbd625f73dd12a98e6686800c4f3 -->
<h2>index</h2>
<p>Get all services</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/services" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "image": "https:\/\/lorempixel.com\/640\/480\/?17837",
            "title": "All on a little way forwards each time.",
            "description": "Minima asperiores cum libero qui et a. Dignissimos repellendus suscipit in totam. Itaque vitae id ad quia est est.",
            "fee_int": 7200,
            "max_voucher_numbers": 800,
            "discount_int": 5
        },
        {
            "image": "https:\/\/lorempixel.com\/640\/480\/?20921",
            "title": "Alice, that she began fancying the.",
            "description": "Tenetur veritatis nostrum voluptas qui ut et. Sit dicta minima accusamus enim omnis.",
            "fee_int": 12400,
            "max_voucher_numbers": 200,
            "discount_int": 20
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/services</code></p>
<!-- END_e437fbd625f73dd12a98e6686800c4f3 -->
<!-- START_e4ae41f7ae77c97d354e3e9cc0583f77 -->
<h2>store</h2>
<p>Store a new service</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/company/services" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"rerum","description":"nemo","image":"enim","fee_int":15,"max_voucher_numbers":4,"discount_int":7}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "rerum",
    "description": "nemo",
    "image": "enim",
    "fee_int": 15,
    "max_voucher_numbers": 4,
    "discount_int": 7
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "image": "https:\/\/lorempixel.com\/640\/480\/?95786",
        "title": "Bill! I wouldn't say anything about.",
        "description": "Repellat id eum et sapiente. Laudantium est recusandae aspernatur tempore est doloremque.",
        "fee_int": 19000,
        "max_voucher_numbers": 600,
        "discount_int": 15
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/company/services</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string(min:1,max:255)</td>
<td>optional</td>
<td>Payment Title</td>
</tr>
<tr>
<td><code>description</code></td>
<td>text(max:2000)</td>
<td>optional</td>
<td>Description/Message.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>string(min:1,max:255)</td>
<td>optional</td>
<td>Path to image</td>
</tr>
<tr>
<td><code>fee_int</code></td>
<td>integer</td>
<td>required</td>
<td>Fee.</td>
</tr>
<tr>
<td><code>max_voucher_numbers</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable Max numbers of available vouchers.</td>
</tr>
<tr>
<td><code>discount_int</code></td>
<td>integer</td>
<td>required</td>
<td>Fee.</td>
</tr>
</tbody>
</table>
<!-- END_e4ae41f7ae77c97d354e3e9cc0583f77 -->
<!-- START_8eff36dd85dea059f557f54041feb930 -->
<h2>get</h2>
<p>Get service by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/services/assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services/assumenda"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "image": "https:\/\/lorempixel.com\/640\/480\/?75843",
        "title": "White Rabbit: it was only the pepper.",
        "description": "Corrupti quos deserunt est quae. Inventore ducimus et enim sequi eum. Distinctio suscipit non optio.",
        "fee_int": 9700,
        "max_voucher_numbers": 200,
        "discount_int": 15
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/services/{service_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>service_id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<!-- END_8eff36dd85dea059f557f54041feb930 -->
<!-- START_bed86c341baa36d64055f7df89b2967f -->
<h2>voucher_statistics</h2>
<p>Get statistics for vouchers</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/services/aut/voucher-statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services/aut/voucher-statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "service": {
            "id": 9,
            "image": "https:\/\/lorempixel.com\/640\/480\/?94932",
            "title": "Hatter trembled so, that Alice had no.",
            "description": "Nobis sunt aspernatur ab. Explicabo modi omnis earum eius.",
            "fee_int": 12100,
            "max_voucher_numbers": 400,
            "discount_int": 5,
            "created_at": "2020-04-04 22:33:09"
        },
        "voucher_statistics_day": [
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-25",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-27",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 2
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-28",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-29",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 2
            },
            {
                "created_at": "2020-03-30",
                "total": 1
            },
            {
                "created_at": "2020-03-30",
                "total": 2
            },
            {
                "created_at": "2020-04-01",
                "total": 2
            },
            {
                "created_at": "2020-04-01",
                "total": 1
            },
            {
                "created_at": "2020-04-01",
                "total": 1
            },
            {
                "created_at": "2020-04-01",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-02",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 2
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            },
            {
                "created_at": "2020-04-03",
                "total": 1
            }
        ],
        "voucher_statistics_kind": [
            {
                "voucher_status": 0,
                "total": 6
            },
            {
                "voucher_status": 1,
                "total": 9
            },
            {
                "voucher_status": 3,
                "total": 6
            },
            {
                "voucher_status": 2,
                "total": 10
            }
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/services/{service_id}/voucher-statistics</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>service_id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<!-- END_bed86c341baa36d64055f7df89b2967f -->
<!-- START_0ce70b09566882d57231e75a50dba7a1 -->
<h2>update</h2>
<p>Update category by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/api/company/services/reiciendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"nobis","description":"voluptate","image":"iusto","fee_int":18,"max_voucher_numbers":18,"discount_int":13}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services/reiciendis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "nobis",
    "description": "voluptate",
    "image": "iusto",
    "fee_int": 18,
    "max_voucher_numbers": 18,
    "discount_int": 13
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "image": "https:\/\/lorempixel.com\/640\/480\/?40905",
        "title": "Rabbit whispered in a hurry: a large.",
        "description": "Blanditiis voluptas nesciunt illo omnis numquam. Vitae animi molestiae tempore omnis maiores.",
        "fee_int": 6500,
        "max_voucher_numbers": 200,
        "discount_int": 15
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/company/services/{service_id}</code></p>
<p><code>PATCH api/company/services/{service_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>service_id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string(min:1,max:255)</td>
<td>optional</td>
<td>Payment Title</td>
</tr>
<tr>
<td><code>description</code></td>
<td>text(max:2000)</td>
<td>optional</td>
<td>Description/Message.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>string(min:1,max:255)</td>
<td>optional</td>
<td>Path to image</td>
</tr>
<tr>
<td><code>fee_int</code></td>
<td>integer</td>
<td>required</td>
<td>Fee.</td>
</tr>
<tr>
<td><code>max_voucher_numbers</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable Max numbers of available vouchers.</td>
</tr>
<tr>
<td><code>discount_int</code></td>
<td>integer</td>
<td>required</td>
<td>Fee.</td>
</tr>
</tbody>
</table>
<!-- END_0ce70b09566882d57231e75a50dba7a1 -->
<!-- START_860493488f4a125b70afbedde0da8f95 -->
<h2>delete</h2>
<p>Remove service by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/api/company/services/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/services/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "image": "https:\/\/lorempixel.com\/640\/480\/?60465",
        "title": "Queen. 'I never said I didn't!'.",
        "description": "Ratione modi impedit non. Expedita error corporis debitis harum. Perspiciatis ut animi temporibus quos sit ut vero.",
        "fee_int": 14100,
        "max_voucher_numbers": 200,
        "discount_int": 10
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/company/services/{service_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>$service_id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<!-- END_860493488f4a125b70afbedde0da8f95 -->
<h1>company/vouchers</h1>
<!-- START_56e5c4c9d3e2e1cd3d9f8d3eb258035e -->
<h2>index</h2>
<p>Get all vouchers</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "voucher_status": 1,
            "voucher_receiver_kind": 1,
            "voucher_receiver_email": null,
            "voucher_receiver_name": null,
            "code": "RVOLOWGUCMIR",
            "created_at": "2020-03-27 01:39:24",
            "user": {
                "first_name": "Sister",
                "last_name": "Kody",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/18.jpg"
            },
            "service": {
                "id": 3,
                "image": "https:\/\/lorempixel.com\/640\/480\/?97284",
                "title": "Pat, what's that in the last words out.",
                "description": "Quibusdam commodi ut error et ut. Modi aspernatur modi dolore. Eum maiores fugiat maiores eum reprehenderit eligendi.",
                "fee_int": 15700,
                "max_voucher_numbers": 800,
                "discount_int": 20,
                "created_at": "2020-04-04 22:33:08",
                "company": {
                    "first_name": "Tevin",
                    "last_name": "Maverick",
                    "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/57.jpg",
                    "company_name": "Wehner, Tromp and Batz",
                    "company_address": "535 Jaunita Rapids Suite 371\nBorerview, WI 00253"
                }
            }
        },
        {
            "voucher_status": 1,
            "voucher_receiver_kind": 1,
            "voucher_receiver_email": null,
            "voucher_receiver_name": null,
            "code": "WNVP9BTO8IG7",
            "created_at": "2020-03-31 01:39:24",
            "user": {
                "first_name": "Deron",
                "last_name": "Kaycee",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg"
            },
            "service": {
                "id": 13,
                "image": "https:\/\/lorempixel.com\/640\/480\/?87902",
                "title": "YOUR shoes done with?' said the Cat.",
                "description": "Ipsa eos eius doloremque aut ratione quia. Molestiae sequi architecto odit perspiciatis vitae.",
                "fee_int": 11600,
                "max_voucher_numbers": 1000,
                "discount_int": 5,
                "created_at": "2020-04-04 22:33:35",
                "company": {
                    "first_name": "Konrad",
                    "last_name": "Seweryn",
                    "avatar": "364ef364-9fd9-4580-9f7e-49caf343ca97.png",
                    "company_name": null,
                    "company_address": null
                }
            }
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/vouchers</code></p>
<!-- END_56e5c4c9d3e2e1cd3d9f8d3eb258035e -->
<!-- START_6d007bbbacc3b95be45b0e2fcf57e2ce -->
<h2>get</h2>
<p>Get voucher by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/company/vouchers/porro" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/vouchers/porro"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 1,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "laurianne.shields@hotmail.com",
        "voucher_receiver_name": "Dr. Antonina Sauer",
        "code": "MVKVELJAOVMM",
        "created_at": "2020-03-30 01:39:24",
        "user": null,
        "service": {
            "id": 19,
            "image": "https:\/\/lorempixel.com\/640\/480\/?76679",
            "title": "Queen. First came ten soldiers.",
            "description": "Quam aut in id. Id quis omnis culpa et accusantium eveniet vero. Eum totam est assumenda unde est consequuntur.",
            "fee_int": 15600,
            "max_voucher_numbers": 800,
            "discount_int": 5,
            "created_at": "2020-04-04 22:33:35",
            "company": {
                "first_name": "Marge",
                "last_name": "Anderson",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg",
                "company_name": "Johnson and Sons",
                "company_address": "7639 Waters Radial Apt. 871\nNew Dillanstad, NV 94662"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/company/vouchers/{voucher_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>voucher_id</code></td>
<td>required</td>
<td>integer The ID of the voucher.</td>
</tr>
</tbody>
</table>
<!-- END_6d007bbbacc3b95be45b0e2fcf57e2ce -->
<!-- START_18241d83a3435f17691cb68c7b0b15eb -->
<h2>update</h2>
<p>Update voucher by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/api/company/vouchers/ratione" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"voucher_status":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/vouchers/ratione"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "voucher_status": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 0,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "otis59@hotmail.com",
        "voucher_receiver_name": "Leta Quitzon",
        "code": "PT9L7LIRXNU4",
        "created_at": "2020-04-04 01:39:24",
        "user": null,
        "service": {
            "id": 19,
            "image": "https:\/\/lorempixel.com\/640\/480\/?76679",
            "title": "Queen. First came ten soldiers.",
            "description": "Quam aut in id. Id quis omnis culpa et accusantium eveniet vero. Eum totam est assumenda unde est consequuntur.",
            "fee_int": 15600,
            "max_voucher_numbers": 800,
            "discount_int": 5,
            "created_at": "2020-04-04 22:33:35",
            "company": {
                "first_name": "Marge",
                "last_name": "Anderson",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg",
                "company_name": "Johnson and Sons",
                "company_address": "7639 Waters Radial Apt. 871\nNew Dillanstad, NV 94662"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/company/vouchers/{voucher_id}</code></p>
<p><code>PATCH api/company/vouchers/{voucher_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>voucher_id</code></td>
<td>required</td>
<td>integer The ID of the voucher.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>voucher_status</code></td>
<td>integer</td>
<td>required</td>
<td><a target="_blank" href="/documentation/voucher-status">Status</a></td>
</tr>
</tbody>
</table>
<!-- END_18241d83a3435f17691cb68c7b0b15eb -->
<!-- START_9001959c6c9ada1d9775ed5ac0782c34 -->
<h2>delete</h2>
<p>Remove voucher by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/api/company/vouchers/amet" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/company/vouchers/amet"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 2,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "jedediah.stiedemann@gmail.com",
        "voucher_receiver_name": "Dr. Bennie Bailey",
        "code": "GVVNJ1DLVRPV",
        "created_at": "2020-04-03 01:39:24",
        "user": null,
        "service": {
            "id": 20,
            "image": "https:\/\/lorempixel.com\/640\/480\/?54877",
            "title": "But said I didn't!' interrupted Alice.",
            "description": "Et corrupti vel libero at. Sit architecto quis aut sit suscipit aut.",
            "fee_int": 5000,
            "max_voucher_numbers": 800,
            "discount_int": 15,
            "created_at": "2020-04-04 22:33:35",
            "company": {
                "first_name": "Deron",
                "last_name": "Kaycee",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg",
                "company_name": "Bergstrom PLC",
                "company_address": "1802 Clementine Square\nSouth Jessetown, DE 02035-7528"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/company/vouchers/{voucher_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>voucher_id</code></td>
<td>required</td>
<td>integer The ID of the voucher.</td>
</tr>
</tbody>
</table>
<!-- END_9001959c6c9ada1d9775ed5ac0782c34 -->
<h1>general</h1>
<!-- START_41d2f7697c6118f36f8b676e5bd19ea0 -->
<h2>Login using the given user ID / email.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/_dusk/login/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/_dusk/login/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _dusk/login/{userId}/{guard?}</code></p>
<!-- END_41d2f7697c6118f36f8b676e5bd19ea0 -->
<!-- START_6375e7300024aae0f6af283b4a72cb1b -->
<h2>Log the user out of the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/_dusk/logout/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/_dusk/logout/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _dusk/logout/{guard?}</code></p>
<!-- END_6375e7300024aae0f6af283b4a72cb1b -->
<!-- START_09dcf3e9a9b6585fa40e4ead6c3c858a -->
<h2>Retrieve the authenticated user identifier and class name.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/_dusk/user/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/_dusk/user/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _dusk/user/{guard?}</code></p>
<!-- END_09dcf3e9a9b6585fa40e4ead6c3c858a -->
<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
<h2>Authorize a client to access the user&#039;s account.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET oauth/authorize</code></p>
<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->
<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
<h2>Approve the authorization request.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST oauth/authorize</code></p>
<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->
<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
<h2>Deny the authorization request.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE oauth/authorize</code></p>
<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->
<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
<h2>Authorize a client to access the user&#039;s account.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST oauth/token</code></p>
<!-- END_a09d20357336aa979ecd8e3972ac9168 -->
<!-- START_d6a56149547e03307199e39e03e12d1c -->
<h2>Get all of the authorized tokens for the authenticated user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET oauth/tokens</code></p>
<!-- END_d6a56149547e03307199e39e03e12d1c -->
<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
<h2>Delete the given token.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE oauth/tokens/{token_id}</code></p>
<!-- END_a9a802c25737cca5324125e5f60b72a5 -->
<!-- START_abe905e69f5d002aa7d26f433676d623 -->
<h2>Get a fresh transient token cookie for the authenticated user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST oauth/token/refresh</code></p>
<!-- END_abe905e69f5d002aa7d26f433676d623 -->
<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
<h2>Get all of the clients for the authenticated user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET oauth/clients</code></p>
<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->
<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
<h2>Store a new client.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST oauth/clients</code></p>
<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->
<!-- START_784aec390a455073fc7464335c1defa1 -->
<h2>Update the given client.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT oauth/clients/{client_id}</code></p>
<!-- END_784aec390a455073fc7464335c1defa1 -->
<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
<h2>Delete the given client.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE oauth/clients/{client_id}</code></p>
<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->
<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
<h2>Get all of the available scopes for the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET oauth/scopes</code></p>
<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->
<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
<h2>Get all of the personal access tokens for the authenticated user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET oauth/personal-access-tokens</code></p>
<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->
<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
<h2>Create a new personal access token for the user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST oauth/personal-access-tokens</code></p>
<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->
<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
<h2>Delete the given token.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE oauth/personal-access-tokens/{token_id}</code></p>
<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->
<!-- START_8d1e53fcf4d2d02a6144ed392de856bf -->
<h2>api/users/me</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/users/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/users/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/users/me</code></p>
<!-- END_8d1e53fcf4d2d02a6144ed392de856bf -->
<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
<h2>api/logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/logout</code></p>
<!-- END_00e7e21641f05de650dbe13f242c6f2c -->
<!-- START_48a3115be98493a3c866eb0e23347262 -->
<h2>api/users/{user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/users/{user}</code></p>
<p><code>PATCH api/users/{user}</code></p>
<!-- END_48a3115be98493a3c866eb0e23347262 -->
<!-- START_7c00134990b4ab60e24b7988e8e2c2b8 -->
<h2>api/users/{slug}/update-password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/api/users/1/update-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/users/1/update-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/users/{slug}/update-password</code></p>
<!-- END_7c00134990b4ab60e24b7988e8e2c2b8 -->
<!-- START_453a7892869321b55cc88718efc993ca -->
<h2>api/avatars</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/avatars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/avatars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "error": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/avatars</code></p>
<!-- END_453a7892869321b55cc88718efc993ca -->
<!-- START_d57b77bad2fd465e127074f61d983901 -->
<h2>api/avatars</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/avatars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/avatars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/avatars</code></p>
<!-- END_d57b77bad2fd465e127074f61d983901 -->
<!-- START_a451be0c84a02ab60cec0201486382cd -->
<h2>api/avatars</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "/api/avatars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/avatars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/avatars</code></p>
<!-- END_a451be0c84a02ab60cec0201486382cd -->
<!-- START_fbacd40481999692261444657cfef65c -->
<h2>api/avatars</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "/api/avatars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/avatars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/avatars</code></p>
<!-- END_fbacd40481999692261444657cfef65c -->
<!-- START_78c4b7d6388c81c68bc37ec872d44f65 -->
<h2>api/forgot-password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/forgot-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/forgot-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/forgot-password</code></p>
<!-- END_78c4b7d6388c81c68bc37ec872d44f65 -->
<!-- START_6d3061d375666b8cf6babe163b36f250 -->
<h2>api/reset-password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/reset-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/reset-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/reset-password</code></p>
<!-- END_6d3061d375666b8cf6babe163b36f250 -->
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>api/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_90f45d502fd52fdc0b289e55ba3c2ec6 -->
<h2>api/signup</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/signup</code></p>
<!-- END_90f45d502fd52fdc0b289e55ba3c2ec6 -->
<!-- START_794d6ae5f4c29ac56ecbb7ad7d556208 -->
<h2>apidoc/.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/apidoc/.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/apidoc/.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "ea581e3a-b9fd-49ee-a003-de53087f3155",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "client\/vouchers",
            "description": "",
            "item": [
                {
                    "name": "index",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/client\/vouchers",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all vouchers",
                        "response": []
                    }
                },
                {
                    "name": "store",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/client\/vouchers",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"service_id\": 17\n}"
                        },
                        "description": "Store a new voucher",
                        "response": []
                    }
                },
                {
                    "name": "get",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/client\/vouchers\/:voucher_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get voucher by ID",
                        "response": []
                    }
                },
                {
                    "name": "delete",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/client\/vouchers\/:voucher_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Remove voucher by ID",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "company\/services",
            "description": "",
            "item": [
                {
                    "name": "index",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all services",
                        "response": []
                    }
                },
                {
                    "name": "store",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"consectetur\",\n    \"description\": \"et\",\n    \"image\": \"harum\",\n    \"fee_int\": 10,\n    \"max_voucher_numbers\": 3,\n    \"discount_int\": 9\n}"
                        },
                        "description": "Store a new service",
                        "response": []
                    }
                },
                {
                    "name": "get",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services\/:service_id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "service_id",
                                    "key": "service_id",
                                    "value": "incidunt",
                                    "description": "integer The ID of the service."
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get service by ID",
                        "response": []
                    }
                },
                {
                    "name": "voucher_statistics",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services\/:service_id\/voucher-statistics",
                            "query": [],
                            "variable": [
                                {
                                    "id": "service_id",
                                    "key": "service_id",
                                    "value": "nulla",
                                    "description": "integer The ID of the service."
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get statistics for vouchers",
                        "response": []
                    }
                },
                {
                    "name": "update",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services\/:service_id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "service_id",
                                    "key": "service_id",
                                    "value": "repellendus",
                                    "description": "integer The ID of the service."
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"qui\",\n    \"description\": \"vel\",\n    \"image\": \"eligendi\",\n    \"fee_int\": 20,\n    \"max_voucher_numbers\": 17,\n    \"discount_int\": 2\n}"
                        },
                        "description": "Update category by ID",
                        "response": []
                    }
                },
                {
                    "name": "delete",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/services\/:service_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Remove service by ID",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "company\/vouchers",
            "description": "",
            "item": [
                {
                    "name": "index",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/vouchers",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get all vouchers",
                        "response": []
                    }
                },
                {
                    "name": "get",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/vouchers\/:voucher_id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "voucher_id",
                                    "key": "voucher_id",
                                    "value": "facere",
                                    "description": "integer The ID of the voucher."
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get voucher by ID",
                        "response": []
                    }
                },
                {
                    "name": "update",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/vouchers\/:voucher_id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "voucher_id",
                                    "key": "voucher_id",
                                    "value": "quia",
                                    "description": "integer The ID of the voucher."
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"voucher_status\": 4\n}"
                        },
                        "description": "Update voucher by ID",
                        "response": []
                    }
                },
                {
                    "name": "delete",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/company\/vouchers\/:voucher_id",
                            "query": [],
                            "variable": [
                                {
                                    "id": "voucher_id",
                                    "key": "voucher_id",
                                    "value": "consequuntur",
                                    "description": "integer The ID of the voucher."
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Remove voucher by ID",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "general",
            "description": "",
            "item": [
                {
                    "name": "Login using the given user ID \/ email.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "_dusk\/login\/:userId\/:guard",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Log the user out of the application.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "_dusk\/logout\/:guard",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Retrieve the authenticated user identifier and class name.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "_dusk\/user\/:guard",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Authorize a client to access the user's account.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/authorize",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Approve the authorization request.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/authorize",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Deny the authorization request.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/authorize",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Authorize a client to access the user's account.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/token",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get all of the authorized tokens for the authenticated user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/tokens",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete the given token.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/tokens\/:token_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get a fresh transient token cookie for the authenticated user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/token\/refresh",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get all of the clients for the authenticated user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/clients",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a new client.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/clients",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the given client.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/clients\/:client_id",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete the given client.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/clients\/:client_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get all of the available scopes for the application.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/scopes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Get all of the personal access tokens for the authenticated user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/personal-access-tokens",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Create a new personal access token for the user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/personal-access-tokens",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Delete the given token.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "oauth\/personal-access-tokens\/:token_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/users\/me",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/users\/me",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/logout",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/logout",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/users\/{user}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/users\/:user",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/users\/{slug}\/update-password",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/users\/:slug\/update-password",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/avatars",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/avatars",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/avatars",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/avatars",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/avatars",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/avatars",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/avatars",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/avatars",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/forgot-password",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/forgot-password",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/reset-password",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/reset-password",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/login",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/signup",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/signup",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "apidoc\/.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "apidoc\/.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "documentation\/user-roles",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "documentation\/user-roles",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "documentation\/voucher-status",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "documentation\/voucher-status",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "guest\/user-companies",
            "description": "",
            "item": [
                {
                    "name": "get",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/guest\/user-companies\/:company_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Get service by ID",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "guest\/vouchers",
            "description": "",
            "item": [
                {
                    "name": "store",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "",
                            "path": "api\/guest\/vouchers",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"voucher_receiver_name\": \"asperiores\",\n    \"voucher_receiver_email\": \"velit\",\n    \"service_id\": 13\n}"
                        },
                        "description": "Store a new voucher",
                        "response": []
                    }
                }
            ]
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET apidoc/.json</code></p>
<!-- END_794d6ae5f4c29ac56ecbb7ad7d556208 -->
<!-- START_438087372a3881815300e0e426d0488a -->
<h2>documentation/user-roles</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/documentation/user-roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/documentation/user-roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET documentation/user-roles</code></p>
<!-- END_438087372a3881815300e0e426d0488a -->
<!-- START_2e246071d443e601aa67bbd19aa7e24b -->
<h2>documentation/voucher-status</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/documentation/voucher-status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/documentation/voucher-status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET documentation/voucher-status</code></p>
<!-- END_2e246071d443e601aa67bbd19aa7e24b -->
<h1>guest/user-companies</h1>
<!-- START_223ea5ad828db73c53784d0f9336ab3b -->
<h2>get</h2>
<p>Get service by ID</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "/api/guest/user-companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/guest/user-companies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "first_name": "Willa",
        "last_name": "Lolita",
        "email": "jovan16@hansen.com",
        "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/50.jpg",
        "company_address": "732 Alexanne Summit Apt. 119\nWymanfurt, AZ 95573-3529",
        "company_name": "Turner PLC",
        "services": []
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/guest/user-companies/{company_id}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>integer The ID of the service.</td>
</tr>
</tbody>
</table>
<!-- END_223ea5ad828db73c53784d0f9336ab3b -->
<h1>guest/vouchers</h1>
<!-- START_cdccec843e1604151445473bc7e889d9 -->
<h2>store</h2>
<p>Store a new voucher</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "/api/guest/vouchers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"voucher_receiver_name":"earum","voucher_receiver_email":"non","service_id":20}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "/api/guest/vouchers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "voucher_receiver_name": "earum",
    "voucher_receiver_email": "non",
    "service_id": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "voucher_status": 2,
        "voucher_receiver_kind": 0,
        "voucher_receiver_email": "einar06@johnston.com",
        "voucher_receiver_name": "Eva McLaughlin",
        "code": "WXU2FIRAWVMF",
        "created_at": "2020-04-04 01:39:25",
        "service": {
            "id": 19,
            "image": "https:\/\/lorempixel.com\/640\/480\/?76679",
            "title": "Queen. First came ten soldiers.",
            "description": "Quam aut in id. Id quis omnis culpa et accusantium eveniet vero. Eum totam est assumenda unde est consequuntur.",
            "fee_int": 15600,
            "max_voucher_numbers": 800,
            "discount_int": 5,
            "created_at": "2020-04-04 22:33:35",
            "company": {
                "first_name": "Marge",
                "last_name": "Anderson",
                "avatar": "https:\/\/randomuser.me\/api\/portraits\/women\/13.jpg",
                "company_name": "Johnson and Sons",
                "company_address": "7639 Waters Radial Apt. 871\nNew Dillanstad, NV 94662"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/guest/vouchers</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>voucher_receiver_name</code></td>
<td>string</td>
<td>optional</td>
<td>Name (optional)</td>
</tr>
<tr>
<td><code>voucher_receiver_email</code></td>
<td>string</td>
<td>required</td>
<td>Email</td>
</tr>
<tr>
<td><code>service_id</code></td>
<td>integer</td>
<td>optional</td>
<td>ID of a service.</td>
</tr>
</tbody>
</table>
<!-- END_cdccec843e1604151445473bc7e889d9 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>