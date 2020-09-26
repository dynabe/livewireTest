<div>
    


<input wire:model="id_user" type="text">
<input wire:model="message" type="text">
<button wire:click="sentNotification" class="btn btn-primary mt-2">Wyślij</button>
<button wire:click="readNotification" class="btn btn-primary mt-2">Read</button>


<div style="height: 50px;"></div>
@foreach ($this->user_notifications as $notification)
    {{ $notification->notifiable_id }} || {{ $notification->data['message'] }} || {{ $notification->read_at }} <br>
@endforeach



{{-- <script>

document.addEventListener('DOMContentLoaded', function() {
    var channel = window.Echo.private('notification.2');
        channel.listen('.notificationAs', function(data) {
        console.log(JSON.stringify(data));
    });
});

</script> --}}




@push('scripts')
    <script>
        Livewire.on('notificationPopup', notiData => {
            toastr.success(notiData['message'], notiData['title'])  
        })
    </script>
@endpush









{{-- @push('scripts')
    <script>
        Livewire.on('postAdded', postId => {
            toastr.{{ $this->data['type'] }}("{{ $this->data['message'] }}", "{{ $this->data['title'] }}")  
        })
    </script>
@endpush --}}



























</div>
