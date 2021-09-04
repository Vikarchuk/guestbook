<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Repositories\MessageRepository;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    private $messageRepository;

    public function __construct()
    {
        $this->messageRepository = app(MessageRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = $this->messageRepository->getAllWithPaginate(20);
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->input();
        $message= (new Message())->create($data);
        if ($message){
            return redirect()->action([MessageController::class, 'index']);
        } else{
            return back()->withErrors(['msg' => 'Saving error'])->withInput();
        }
    }

}
