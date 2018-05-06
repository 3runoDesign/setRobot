<div class="notification is-{{ (isset($class)) ? $class : 'primary' }}"
     data-bulma="notification"
     data-dismiss-interval="{{ (isset($time)) ? $time : '' }}">

    <button class="delete"></button>

    {{ $slot }}
</div>
