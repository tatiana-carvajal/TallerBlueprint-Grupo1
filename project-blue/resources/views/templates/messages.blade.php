@if (session('success') || session('error') || session('warning') || $errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        @if (session('success'))
            showSuccess('{{ session('success') }}');
        @endif

        @if (session('warning'))
            showWarning('{{ session('warning') }}');
        @endif

        @if (session('error'))
            showError('{{ session('error') }}');
        @endif
        
        @if ($errors->any())
            @php
                $errorList = '<ul>';
                foreach ($errors->all() as $error) {
                    $errorList .= '<li>' . $error . '</li>';
                }
                $errorList .= '</ul>';
            @endphp
            showError('{!! $errorList !!}', 'Por favor corrige los siguientes errores:');
        @endif
    });
</script>
@endif