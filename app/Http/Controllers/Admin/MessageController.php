<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;

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
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, MessageRepository $messageRepository)
    {
        $message = $messageRepository->getById($id);
        if (empty($message))
        {
            abort(404);
        }
        return view('admin.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, $id, MessageRepository $messageRepository)
    {
        $data = $request->input();
        $message = $messageRepository->getById($id)->update($data);
        if ($message)
        {
            return redirect()->action([MessageController::class, 'index']);
        } else
        {
            return back()->withErrors(['msg' => 'Updating error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, MessageRepository $messageRepository)
    {
        $message = $messageRepository->getById($id)->forceDelete();
        if ($message)
        {
            return redirect()->action([MessageController::class, 'index']);
        } else
        {
            return back()->withErrors(['msg' => 'Deleting error']);
        }
    }
}
