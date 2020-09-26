<div>

    <div class="mx-auto col-lg-8">
        <div class="msgBox">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->chatMessages as $message)
                        @if ($message['user_id'] == Auth::user()->id)
                            <tr>
                                <td style="color: red;">{{ $message->user()->first()->name }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $message->user()->first()->name }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="msgInput">
            <input wire:model.defer="message" type="text" placeholder="Tekst..." class="form-control">
            <button wire:click="sentMsg" class="btn btn-primary mt-2">Wyślij</button>
        </div>
    </div>








</div>
