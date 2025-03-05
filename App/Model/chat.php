<?php
namespace kibalanga\App\Model;
    
use kibalanga\core\Model;

class chat 
{
    public function read($id) 
    {
        $sql = "SELECT * FROM `chats` WHERE id=:id";
        $parameter = [":uid" => $id];
        $result = Model::moja($sql, $parameter);

        if (isset($result["status"]) && $result["status"] == "success") {
            return $result["data"];
        }

        return $result["message"] ?? "An error occurred";
    }

    public function readAll()
    {
        $incoming_id = 'member';
        $outgoing_id = $_SESSION['token'];

        $sql = "SELECT messages.outgoing_msg_id, messages.incoming_msg_id, users.username, messages.msg FROM `messages` 
        LEFT JOIN users ON users.token = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id)
        OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id)
        ORDER BY msg_id";

        $parameter = [
            ':outgoing_id' => $outgoing_id,
            ':incoming_id' => $incoming_id
        ];
        
        $result = Model::somazote($sql, $parameter);


        if (isset($result["status"]) && $result["status"] == "success") {
            return ['status' => 'success', 'data' => $result["data"], "rows" => $result['rows']];
        }
        return ['status' => 'error', 'message' => $result["message"]];
    }

    public function create($message, $outgoing)
    {
        $sql = "SELECT * FROM `messages` WHERE message =:j AND outgoing=:out ";
        $parameter = [':j' => $message, ':out' => $outgoing];
        $result = Model::moja($sql, $parameter);

        if ($result['status'] !== 'success') {
            // $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) 
            // VALUES (?, ?, ?)";
            // $parameter = [];
            $sql = "INSERT INTO `messages` (incoming_msg_id, outgoing_msg_id, msg) VALUES (?, ?, ?)";
            $parameter = ['member', $_SESSION['token'], $message];
            
            $jibu = Model::weka($sql, $parameter);
            
            $jibu = Model::weka($sql, $parameter);            

            if ($jibu['status'] == 'success') {
                return ['status' => 'success'];
            }
            return $jibu['message'];
        }
    }

    public function update($id, $name, $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address";
        }
        
        $sql = "UPDATE `chats` SET username=:name, email=:email WHERE token=:id";
        $parameter = [":name" => $name, ":email" => $email, ":id" => $id];
        $result = Model::badili($sql, $parameter);

        return $result["status"] == "success" ? "Update successful!" : $result["message"];
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `chats` WHERE token=:id";
        $parameter = [":id" => $id];
        $result = Model::futa($sql, $parameter);

        return $result["status"] == "success" ? "User deleted successfully!" : $result["message"];
    }
}
    
