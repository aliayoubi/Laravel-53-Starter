@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="animated shake alert
                    alert-{{ session('flash_notification.level') }}
        {{ session()->has('flash_notification.important') ? 'alert-important' : '' }}"
        >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <strong><i class="glyphicon glyphicon-info-sign"></i> {!! session('flash_notification.message') !!}</strong>
        </div>
    @endif
@endif
