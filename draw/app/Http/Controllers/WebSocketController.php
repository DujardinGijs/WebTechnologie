<?php

namespace App\Http\Controllers;

use App\Drawings;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Psy\Util\Json;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use Ratchet\Server\IoServer;

class WebSocketController extends Controller implements MessageComponentInterface
{

    protected $clients;
    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }


    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        foreach (Drawings::all() as $drawing){
            $str = '{"mouse":{"current":{"x":"'.
                $drawing -> curx.'","y":"'.
                $drawing -> cury.'"},"previous":{"x":"'.
                $drawing -> prevx.'","y":"'.
                $drawing -> prevy.'"}},"style":{"color":"'.
                $drawing -> collor.'","size":'.
                $drawing -> size.',"stroke":"'.
                $drawing -> stroke.'"}}';
            $conn ->send($str);
        }

    }
    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

    }
    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "err" . $e ->getMessage();
    }
    function onMessage(ConnectionInterface $from, $msg)
    {

        $msgdec = json_decode($msg, true);print_r($msgdec);
        if ($msgdec["mouse"] !== null){
            $drawing = new Drawings();
            $drawing -> prevx = $msgdec["mouse"]["previous"]["x"];
            $drawing -> prevy = $msgdec["mouse"]["previous"]["y"];
            $drawing -> curx = $msgdec["mouse"]["current"]["x"];
            $drawing -> cury = $msgdec["mouse"]["current"]["y"];
            $drawing -> collor = $msgdec["style"]["color"];
            $drawing -> size =$msgdec["style"]["size"];
            $drawing -> stroke =$msgdec["style"]["stroke"];
            $drawing -> save();

            foreach($this->clients as $client){
                if ($client !==$from){
                    $client->send($msg);
                }

            }
        }
    }
}
