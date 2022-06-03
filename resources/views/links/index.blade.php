<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            background: url('https://fueler.io/images/fueler/discover__top_bg.jpg');
            background-position: top;
            background-size: 90%;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
            font-family: 'Poppins', sans-serif;
            
        }

        .container{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card{
            border: none;
            border-radius: 1rem;
            box-shadow: 0 7px 21px rgba(0,0,0,0.2);
        }

        h2{
            font-weight: 600;
        }

        label{
            font-size: 1rem;
            font-weight: 500;
            color: #0d0543;
        }

        .form-control{
            border-radius: 6px;
            background: rgba(0,0,0,0.1);
        }

        .btn-primary{
            background: linear-gradient(180deg,#00fbff,#10dce8 99.99%,#09c9e3);
            border-color: #00fbff;
            border-radius: 6px;
            color: #0d0543;
            font-weight: 600;
        }

        footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            /* background: linear-gradient(141.39deg, #E3FFFD 17.58%, #FFEDFB 73.17%); */
            background: linear-gradient(180deg,#00fbff,#10dce8 99.99%,#09c9e3);
            color: #0D0543;
            text-align: center;
            font-weight: 600;
            font-size: 1rem
        }
    </style>
</head>
<body>
    <div class="container">


        

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body" style="padding: 2rem">
                        <h2 class="mb-3">Short your URL</h2>
                        <form action="/shorten" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="original_link">Enter URL</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <input type="url" class="form-control form-control-lg" name="original_link" required placeholder="Paste URL">
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @if (session('success'))
                    <div class="card mt-4">
                        <div class="card-body d-flex justify-content-between align-items-center"role="alert">
                    
                           <div>
                               <p class="mb-0"> {{ session('success') }}</p>
                               <input type="text" hidden name="" id="shorten_link" value="{{ session('success') }}">
                           </div>
                           <div>
                               <a href="#" onclick="copyShortenLink()">Copy</a>
                           </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
            
      
    </div>
    @if ($shorten_links_count > 0)
    
        <footer class="p-3">
            <div class="text-center">

                Total Shotened Links: {{$shorten_links_count}}

            </div>
        </footer>

     @endif
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        function copyShortenLink() {
            /* Get the text field */
            var copyText = document.getElementById("shorten_link");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Link Copied");
        }
    </script>
</body>
</html>