<?php
include "connection.php";

    if (empty($_GET['nav']))
    {
        header("Location: /?nav=chckpt");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $handle = $_POST['handle'];
        $content = $_POST['content'];

        if (!empty($handle) && !empty($content))
        {
            $strippled_handle = strip_tags($handle);
            $strippled_content = strip_tags($content);
    
            $escaped_handle = addslashes($strippled_handle);
            $escaped_content = addslashes($strippled_content);

            $pid = random_int(100, PHP_INT_MAX);

            $sql = "INSERT INTO people (handle, content, pid) VALUES ('$escaped_handle', '$escaped_content', '$pid')";

            mysqli_query($conn, $sql);

            header("Location: /?nav=disc");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bluesky Checkpoint</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
</head>
<body>
    <div class="panes">
        <div class="nav">
            <?php 
                if ($_GET['nav'] === "chckpt")
                {
                    echo "
                        <button class=nav-option-selected>Checkpoint Form</button>
                        <a href=/?nav=disc><button class=nav-option>Discover</button></a>
                        <a target=_blank href=https://github.com/Sinkcat113/Bluesky-Checkpoint /><img class=github src=./github.png /></a>
                    ";
                } else if ($_GET['nav'] === "disc")
                {
                    echo "
                        <a href=/?nav=chckpt /><button class=nav-option>Checkpoint Form</button></a>
                        <button class=nav-option-selected>Discover</button>
                        <a target=_blank href=https://github.com/Sinkcat113/Bluesky-Checkpoint /><img class=github src=./github.png /></a>
                    ";
                }
            ?>
        </div>
        <div class="view">
            <?php
                switch($_GET['nav'])
                {
                    case "chckpt":
                        echo "
                            <div class=intro>
                                <div class=head>
                                    <img class=logo src=./img/Bluesky_Logo.svg.png alt=>
                                    <h2 class=head-p>Bluesky Checkpoint</h2>
                                </div>
                                <div class=content>
                                    <p class=content-p>Welcome to what I call a Bluesky Checkpoint! Post your BSky handle and what you do for people who stumble across this domain!</p>
                                    <b><p>Checkpoint started by <a target=_blank href=https://bsky.app/profile/sink.cat>@sink.cat</a></p></b>
                                    <a href=/?nav=disc>Other people's checkpoint posts!</a>
                                </div>
                            </div>
                            <div class=form-wrapper>
                                <form method=post>
                                    <input type=text name=handle placeholder='Your Handle (name.bsky.social)' required>
                                    <textarea name=content placeholder='What do you do?' required></textarea>
                                    <div class=submit>
                                        <button>Send</button>
                                    </div>
                                </form>
                                <br>
                                <p class=content-p><b>NOTE: </b>Bluesky Checkpoints is in no way officially related to Bluesky itself.</p>
                            </div>
                        ";
                        break;
                    case "disc":
                        $query = "SELECT * FROM people ORDER BY id DESC";

                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0)
                        {
                            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            foreach ($row as $post) {
                                $handl = $post['handle'];
                                $cont = $post['content'];
                                $date = $post['date'];

                                echo "
                                    <div class=post-wrapper>
                                        <a target=_blank href=https://bsky.app/profile/$handl><b><h3>@$handl</h3></b></a><span> • $date</span>
                                        <p>$cont</p>
                                    </div>
                                ";
                            }
                        }
                        break;
                }
            ?>

        </div>
    </div>
    <div class="bottom-nav">
        <?php
            if ($_GET['nav'] === "chckpt")
            {
                echo "
                    <button class=nav-option-selected>Checkpoint Form</button>
                    <a href=/?nav=disc><button class=nav-option>Discover</button></a>
                    <a target=_blank href=https://github.com/Sinkcat113/Bluesky-Checkpoint /><img class=github src=./github.png /></a>
                ";
            } else if ($_GET['nav'] === "disc")
            {
                echo "
                    <a href=/?nav=chckpt /><button class=nav-option>Checkpoint Form</button></a>
                    <button class=nav-option-selected>Discover</button>
                    <a target=_blank href=https://github.com/Sinkcat113/Bluesky-Checkpoint /><img class=github src=./github.png /></a>
                ";
            }
        ?>
    </div>
</body>
</html>