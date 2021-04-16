@push('scripts')
    <script>
        $(() => {
            Inputmask({
                mask: '999.999.999-99'
            }).mask(document.getElementById('cpf'));

            Inputmask({
                mask: [
                    '(99)9999-9999',
                    '(99)99999-9999',
                ],
                keepStatic: true
            }).mask(document.getElementById('phone_number'));
        });
    </script>
@endpush