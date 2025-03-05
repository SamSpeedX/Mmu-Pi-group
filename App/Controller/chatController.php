<?php
use kibalanga\App\Model\chat;
use kibalanga\core\Redirect;

class ChatController 
{ 
    //  
    public function index() 
    { 
        //  
    } 

    public function readone($request) 
    { 
        $chat = new chat(); 

        $id = $request["id"];
        $result = $chat->read($id); 
        // user info 
        return $result; 
         
    } 

    public function readAll() 
    { 
        $user = new chat(); 
        $result = $user->readAll();
        // return $result['data'];
        // echo json_encode($result);
        // outgoing_msg_id

        if ($result["status"] == "success") {
            if ($result) {
                while ($row = $result['data']) {
                    echo json_encode($row);
                    // if($row['outgoing_msg_id'] === $_SESSION['token']){
                    //     $output .= '<div class="chat outgoing">
                    //         <div class="details">
                    //             <p>'. $row['msg'] .'</p>
                    //         </div>
                    //         </div>';
                    // }else{
                    //     $output .= '<div class="chat incoming">
                    //         <span>'.$row['username'].'</span>
                    //         <div class="details">
                    //             <p>'. $row['msg'] .'</p>
                    //         </div>
                    //         </div>';
                    // }
                }
            } else {
                $output = '<div class="text">No messages are available. Once you send message they will appear here.</div>';
            }
        echo $output;
        } else {
            // $output = $result['message'];
            $output = '<div class="text">No messages are available. Once you send message they will appear here.</div>';
            echo $output;
        }
    } 


    public function create($request) 
    { 
        $chat = new chat();

        $outgoing = $_SESSION['token'];  
        $message = $request["message"]; 
        $result = $chat->create($message, $outgoing); 
        echo json_encode($result);
        if ($result['status'] == 'success') {
            http_response_code(200);
        }
    }

    public function update($request) 
    {
        $chat = new chat();

        $name = $request["item1"];
        $email = $request["item2"];
        $password = $request["item3"];

        $result = $chat->update($name, $email, $password);

        if ($result["status"] == "success") {
           Redirect::to("home"); // path of your destine
        }
        return $result["message"];
    }
    
    public function delete($request)
    {
        $chat = new chat();

        $delete = $request["id"];

        $result = $chat->delete($delete);

        if ($result["status"] == "success") {
           return $request["message"];
        }
        return $result["message"];
    }

}
