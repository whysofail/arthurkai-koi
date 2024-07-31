<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Form Error',
                body: '{{ $error }} \n Please check the form and try again.',
                autohide: true,
                delay: 5000,
            });
        @endforeach
    @endif
</script>
