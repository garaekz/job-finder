<script>
  window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      'apiToken' => $token ?? null,
  ]) !!};
</script>
