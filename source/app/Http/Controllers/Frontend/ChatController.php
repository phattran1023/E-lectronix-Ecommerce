<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessages()
    {
        $messages = Message::all();
        return response()->json(['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        // Lấy tin nhắn từ yêu cầu Ajax
        $messageText = $request->input('message');
    
        // Lưu tin nhắn vào cơ sở dữ liệu (ví dụ: sử dụng Eloquent)
        $message = new Message();
        $message->content = $messageText;
        $message->user_id = auth()->id(); // Gán user_id của người gửi
        $message->save();
    
        // Trả về phản hồi (có thể làm gì đó khác tùy ý)
        return response()->json(['success' => true]);
    }
}
