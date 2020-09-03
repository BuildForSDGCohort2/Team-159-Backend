<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md">
                    GOTO
                </div>
                <p>
                    Welcome to GOTO backend API Documentation page.
                    On this page you will learn how to communicate with the GOTO api to integrate a full working logistics app.
                </p>
            </div>
        </div>
        <div class="container">
            <h2 class="text-center">Goto Documentation</h2>
            <div>
                <h2>Client Registration</h2>
                <p><span>GET</span> <span class="url">https://goto2.herokuapp.com/register</span></p>
                <p>Expected Parameters</p>
                <code>
                    <pre>
                        -H "Content-Type: application/json"
                        -H "Accept: application/json"

                        -d {
                            "name": "your name"
                            "email": "uniqueEmail@example.com"
                            "password": "123456"
                            "password_confirm": "123456"
                            }
                    </pre>
                </code>
            </div>
            <div>
                <h2>Client Login</h2>
                <p><span>POST</span> <span class="url">https://goto2.herokuapp.com/login</span></p>
                <p>Expected Parameters</p>
                <pre>
                    <code>
                        -H "Content-Type" : "application/json"
                        -H "Accept" : "application/json"

                        -d {
                            "email": "uniqueEmail@example.com"
                            "password": "123456"
                            }
                    </code>
                </pre>
            </div>
            <div>
                <h2>Client Registration</h2>
                <p><span>GET</span> <span class="url">https://goto2.herokuapp.com/profile</span></p>
                <p>Expected Parameters</p>
                <pre>
                    <code>
                        -H "Content-Type: application/json"
                        -H "Accept: application/json"
                        -H "Authorization": "Bearer {key}"
                    </code>
                    </pre>
            </div>
            <div>
                <h2>Client </h2>
                <p><span>GET</span> <span class="url">https://goto2.herokuapp.com/logout</span></p>
                <p>Expected Parameters</p>
                <code>
                    <pre>
                        -H "Content-Type: application/json"
                        -H "Accept: application/json"

                        -d {
                            "name": "your name"
                            "email": "uniqueEmail@example.com"
                            "password": "123456"
                            "password_confirm": "123456"
                            }
                    </pre>
                </code>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
        });

        console.log(window.hljs);
    </script>
</body>

</html>