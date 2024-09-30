<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="BFD">
        <div class="display">
            <div class="status">
                <div><a> Life: 12/23. </a></div>
                <div><a> Armor: 6. </a></div>
                <div><a> Equipment: </a></div>
                <div><a> Inventory[ </a></div>
                <div><a> Potion. </a></div>
                <div><a> ] </a></div>
            </div>
            <div class="centering">
                <a>roberto</a>
                <img class="enemy"
                    src="https://preview.redd.it/the-pixel-token-for-ur-enemies-35-gold-and-it-turns-your-v0-sta1sq6s8bfd1.png?width=3000&format=png&auto=webp&s=fb8b7e9d2f2cb865cb40f6fbc81b3f5449c6c01a">
            </div>
            <div class="actions">
                <div id="action1"> <a>An wild .... roberto appears? ... i guess? anyway kill him</a></div>
                <div id="action2">
                    <div class="action-class"><a>fight</a></div>
                    <div class="action-class"><a>block</a></div>
                    <div class="action-class"><a>Item</a></div>
                    <div class="action-class"><a>Pass</a></div>
                </div>
            </div>

        </div>


    </div>


    <script src="index,js"></script>
    <?php
    require 'vendor/autoload.php';
    use MongoDB\Driver\ServerApi;
    $uri = 'mongodb+srv://tanaka:<db_password>@mainquest.jpgkf.mongodb.net/?retryWrites=true&w=majority&appName=MainQuest';
    // Set the version of the Stable API on the client
    $apiVersion = new ServerApi(ServerApi::V1);
    // Create a new client and connect to the server
    $client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);
    try {
        // Send a ping to confirm a successful connection
        $client->selectDatabase('admin')->command(['ping' => 1]);
        echo "Pinged your deployment. You successfully connected to MongoDB!\n";
    } catch (Exception $e) {
        printf($e->getMessage());
    }


    class enemy{
        public $life;
        public $armor;
        public $damage;
    }
    


    ?>
</body>

</html>
