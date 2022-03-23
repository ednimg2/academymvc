<html>
<?php include 'components/header.php'; ?>
<body>
    <div>
        <?php
            $url = (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
                ? explode('/', trim($_SERVER['REQUEST_URI'], '/'))
                : ['home'];

            $page = $url[0];

            switch ($page) {
                case 'home':
                    include 'page/home.php';
                    break;
                case 'post':
                    include 'page/post.php';
                    break;
                default:
                    include 'page/error.php';
            }
        ?>
    </div>
    <?php include 'components/footer.php'; ?>
</body>
</html>
