<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pinkvilla</title>
        <base href="/pinkvilla/">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="pink">
        <link rel="manifest" href="assets/manifest.json">
        <link rel="stylesheet" href="./assets/style.css">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="pinterest type image gallery">
        <script>
            (function () {
                if ('serviceWorker' in navigator) {
                    navigator.serviceWorker
                            .register('/pinkvilla/sw.js')
                            .then(function () {
                                console.log('Service Worker Registered');
                            });
                }
            })();
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="masonry">
                <?php foreach ($response as $post) { ?>
                    <div class="grid">
                        <img src="<?php echo str_replace("http:", "", $post['image']['url']) ?>" alt="<?php echo $post['title'] ?>">
                        <div class="post_body">
                            <div class="relative">
                                <a class="post_link" target="_blank" href="https://www.pinkvilla.com<?php echo $post['path'] ?>"></a>
                                
                                <p class="post_type">
                                    <?php echo $post["type"] ?>
                                </p>
                            </div>
                            <div class="mt-auto">
                                <span class="post_tag"> 
                                    <?php echo $post["viewCount"] ?></span>
                            </div>
                        </div>
                        <h5 class="post_title"> 
                            <?php echo substr($post["title"], 0, 24) . "..." ?>
                        </h5>
                    </div>
                <?php } ?>
            </div>
        </div>        
    </body>
</html>
