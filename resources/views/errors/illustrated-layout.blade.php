<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700');
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,800');

        html,
        body {
            margin: 0;
        }

        body {
            height: 100vh;
            width: 100%;
            overflow: hidden;
            display: grid;
            place-items: center
        }

        .error-container {
            text-align: center;
            font-size: 180px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            margin: 20px 15px;
        }

        .error-container>span {
            display: inline-block;
            line-height: 0.7;
            position: relative;
            color: #FFB485;
        }

        .error-container>span {
            display: inline-block;
            position: relative;
            vertical-align: middle;
        }

        .error-container>span:nth-of-type(1) {
            color: #D1F2A5;
            animation: colordancing 4s infinite;
        }

        .error-container>span:nth-of-type(3) {
            color: #F56991;
            animation: colordancing2 4s infinite;
        }

        .error-container>span:nth-of-type(2) {
            width: 120px;
            height: 120px;
            border-radius: 999px;
        }

        .error-container>span:nth-of-type(2):before,
        .error-container>span:nth-of-type(2):after {
            border-radius: 0%;
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: inherit;
            height: inherit;
            border-radius: 999px;
            box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4),
                inset 0 30px 0 rgba(239, 250, 180, 0.4),
                inset -30px 0 0 rgba(255, 196, 140, 0.4),
                inset 0 -30px 0 rgba(245, 105, 145, 0.4);
            animation: shadowsdancing 4s infinite;
        }

        .error-container>span:nth-of-type(2):before {
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .screen-reader-text {
            position: absolute;
            top: -9999em;
            left: -9999em;
        }

        @keyframes shadowsdancing {
            0% {
                box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4),
                    inset 0 30px 0 rgba(239, 250, 180, 0.4),
                    inset -30px 0 0 rgba(255, 196, 140, 0.4),
                    inset 0 -30px 0 rgba(245, 105, 145, 0.4);
            }

            25% {
                box-shadow: inset 30px 0 0 rgba(245, 105, 145, 0.4),
                    inset 0 30px 0 rgba(209, 242, 165, 0.4),
                    inset -30px 0 0 rgba(239, 250, 180, 0.4),
                    inset 0 -30px 0 rgba(255, 196, 140, 0.4);
            }

            50% {
                box-shadow: inset 30px 0 0 rgba(255, 196, 140, 0.4),
                    inset 0 30px 0 rgba(245, 105, 145, 0.4),
                    inset -30px 0 0 rgba(209, 242, 165, 0.4),
                    inset 0 -30px 0 rgba(239, 250, 180, 0.4);
            }

            75% {
                box-shadow: inset 30px 0 0 rgba(239, 250, 180, 0.4),
                    inset 0 30px 0 rgba(255, 196, 140, 0.4),
                    inset -30px 0 0 rgba(245, 105, 145, 0.4),
                    inset 0 -30px 0 rgba(209, 242, 165, 0.4);
            }

            100% {
                box-shadow: inset 30px 0 0 rgba(209, 242, 165, 0.4),
                    inset 0 30px 0 rgba(239, 250, 180, 0.4),
                    inset -30px 0 0 rgba(255, 196, 140, 0.4),
                    inset 0 -30px 0 rgba(245, 105, 145, 0.4);
            }
        }

        @keyframes colordancing {
            0% {
                color: #D1F2A5;
            }

            25% {
                color: #F56991;
            }

            50% {
                color: #FFC48C;
            }

            75% {
                color: #EFFAB4;
            }

            100% {
                color: #D1F2A5;
            }
        }

        @keyframes colordancing2 {
            0% {
                color: #FFC48C;
            }

            25% {
                color: #EFFAB4;
            }

            50% {
                color: #D1F2A5;
            }

            75% {
                color: #F56991;
            }

            100% {
                color: #FFC48C;
            }
        }

        /* demo stuff */
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background-color: #142b36;
            margin-bottom: 50px;
        }

        html,
        button,
        input,
        select,
        textarea {
            font-family: 'Montserrat', Helvetica, sans-serif;
            color: #92a4ad;
        }

        h1 {
            text-align: center;
            margin: 30px 15px;
        }

        .zoom-area {
            max-width: 490px;
            margin: 30px auto 30px;
            font-size: 19px;
            text-align: center;
        }

        .link-container {
            text-align: center;
        }

        a.more-link {
            text-transform: uppercase;
            font-size: 13px;
            background-color: #92a4ad;
            padding: 10px 15px;
            border-radius: 0;
            color: #416475;
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
            line-height: 1.5;
            text-decoration: none;
            margin-top: 50px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <main>
        <section class="error-container">
            @yield('code')
        </section>
        <p class="zoom-area">@yield('message')</p>
        <div class="link-container">
            <a href="javascript:;" class="more-link" onclick="window.history.back()">Bring me back</a>
        </div>
    </main>

    <script type="text/javascript">
        const code = document.querySelector('.error-container');

        const replace = async (el) => {

            const push = async () => {
                const template = (text) => {
                    return {
                        normal : `<span>${text}</span>`,
                        middle : `<span><span class="screen-reader-text">${text}</span></span>`
                    }
                }

                let content = []
                for (var i = 0; i < el.innerText.length; i++) {
                    content.push(
                        i != 1 ? template(el.innerText.charAt(i)).normal :template(el.innerText.charAt(i)).middle
                    )
                }
                console.log(content)
            }

            return push();
        }

        code.innerText = ''
        replace(code)
            .then((d) => {
                // code.append(.join(''))
                console.log(d)
            })


    </script>
</body>

</html>
