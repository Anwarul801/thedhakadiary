<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('frontend/assets') }}/css/tailwind_css/tailwind_output.css" rel="stylesheet"> --}}
    <title>Generate Photo Cut</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @font-face {
            font-family: "kalpurush";
            src: url("{{ asset('frontend/assets/kalpurush/kalpurush.ttf') }}") format('truetype');
        }


        .post_generate_wrapp {
            width: 720px;
            margin: 25px auto;
            position: relative;
        }

        .post_generate_wrapp .frame_img {
            width: 100%;
        }

        .post_generate_wrapp .date {
            color: #ffffff;
            display: inline-block;
            position: absolute;
            top: 5px;
            right: 15px;
            font-size: 20px;
            font-weight: 600;
        }

        .post_generate_wrapp .post_thumbnail {
            width: 670px;
            height: 353px;
            background: red;
            position: absolute;
            top: 53px;
            left: 25px;
        }

        .post_generate_wrapp .post_thumbnail .post_thumbnail_img {
            width: 100%;
            height: 100%;
        }

        .post_generate_wrapp .title_wrapp {
            width: 95.7%;
            height: 235px;
            position: absolute;
            bottom: 67px;
            left: 0;
            margin: 0 16px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .post_generate_wrapp .title {
            font-size: 35px;
            color: #ffffff;
            text-transform: uppercase;
            text-align: center;
            font-weight: 800;
            padding: 20px;
        }

        .post_generate_wrapp .check_in_comment {
            color: #ffffff;
            font-size: 18px;
            position: absolute;
            right: 15px;
            bottom: 70px;
        }

        .post_generate_wrapp .button_group button {
            padding: 8px 16px;
            margin: 0 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
        }

        .post_generate_wrapp .button_group button:hover {
            background-color: #0056b3;
        }

        .post_generate_wrapp_2 .title {
            color: #151a58;
            font-family: "kalpurush";
            line-height: 1.2;
        }

        .post_generate_wrapp_2 .date {
            left: 15px;
            top: 94%;
            color: #000000;
            font-family: "kalpurush";
        }

        .post_generate_wrapp_2 .post_thumbnail {
            width: 720px;
            height: 408px;
            position: absolute;
            top: 0px;
            left: 0px;
        }

        .post_generate_wrapp_2 .brand_title {
            background: #ede7e7;
            width: 95px;
            height: 105px;
            border-radius: 0 0 100px 100px;
            position: absolute;
            top: 0;
            right: 15px;
            padding-top: 10px;
        }

        .post_generate_wrapp_2 .brand_title h3 {
            color: #151a58;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 800;
            line-height: 1.2;
            text-align: center;
            font-family: "Poppins", sans-serif;
            margin: 0;
        }

        .button_group {
            margin-top: 10px;
            text-align: center;
        }

        .button_group button {
            background-color: #4CAF50;
            /* Green */
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button_group button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .button_group button:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>

    <div class="post_generate_wrapp post_generate_wrapp_2">
        <img src="{{ asset('frontend/assets/image/photo-frame-2.png') }}" class="frame_img" alt="frame image">
        <span class="date">{{ bangla_date_from_iso($post->publishing_date ?? null) }}</span>
        <div class="post_thumbnail">
            <img src="{{ asset('storage') }}/{{ $post->media->image ?? null }}" class="post_thumbnail_img"
                alt="thumbnail">
        </div>
        <div class="title_wrapp">
            <h3 class="title">{{ $post->title ?? null }}</h3>
        </div>
        <div class="brand_title">
            <h3>The dhaka diary</h3>
        </div>
    </div>
    <div class="button_group" style="margin-top: 10px; text-align:center;">
        <button id="downloadBtn">Download Photo</button>
        <button id="copyBtn">Copy Photo</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script>
        const postWrapper = document.querySelector('.post_generate_wrapp');

        function captureHighRes(callback) {
            // Calculate scale: current wrapper size (720) to target size (1080)
            const scale = 1080 / postWrapper.offsetWidth;

            html2canvas(postWrapper, {
                scale: scale, // Scale to match 1080 width
                useCORS: true,
                backgroundColor: null
            }).then(canvas => callback(canvas));
        }

        document.getElementById('downloadBtn').addEventListener('click', () => {
            captureHighRes(canvas => {
                const link = document.createElement('a');
                link.download = 'post_image.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        });

        document.getElementById('copyBtn').addEventListener('click', () => {
            captureHighRes(canvas => {
                canvas.toBlob(blob => {
                    const item = new ClipboardItem({
                        'image/png': blob
                    });
                    navigator.clipboard.write([item])
                        .then(() => alert('Image copied to clipboard!'))
                        .catch(err => alert('Failed to copy image: ' + err));
                });
            });
        });
    </script>

</body>

</html>
